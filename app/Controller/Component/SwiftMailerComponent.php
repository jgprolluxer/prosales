<?php

App::import('Component', 'Email');
App::import('Vendor', 'Swift', array('file' => 'swiftmailer' . DS . 'swift_required.php'));

class SwiftMailerComponent extends EmailComponent {

    public $sendmailCommand = '/usr/sbin/exim -bs';
    private $transport;
    private $message;
    private $title;
    private $mailer;
    var $__controller = null;

    function initialize(&$controller) {
        $this->__controller = $controller;
    }

    public function _attachFiles() {
        if (is_array($this->attachments)) {
            foreach ($this->attachments as $attach) {
                $this->message->attach(Swift_Attachment::fromPath($this->_findFiles($attach)));
            }
        } else {
            $this->message->attach(Swift_Attachment::fromPath($this->_findFiles($this->attachments)));
        }
    }

    public function _render($content, $title) {

        $this->initMessage();
        $viewClass = $this->_controller->view;

        if ($viewClass != 'View') {
            list($plugin, $viewClass) = pluginSplit($viewClass);
            $viewClass = 'View';
            App::import('View', $this->_controller->view);
        }


        $View = new $viewClass($this->Controller);
        $View->layout = $this->layout;

        if ($this->sendAs === 'both') {
            $htmlContent = $content;


            $content = $View->element('email' . DS . 'text' . DS . $this->template, array('content' => $content), true);
            $View->layoutPath = 'email' . DS . 'text';
            $content = explode("\n", $this->textMessage = str_replace(array("\r\n", "\r"), "\n", $View->renderLayout($content)));
            $htmlContent = $View->element('email' . DS . 'html' . DS . $this->template, array('content' => $htmlContent), true);
            $View->layoutPath = 'email' . DS . 'html';
            $htmlContent = explode("\n", $this->htmlMessage = str_replace(array("\r\n", "\r"), "\n", $View->renderLayout($htmlContent)));
            // Set message body (both html and plain text)
            // $this->message->setBody(implode("\n", $htmlContent), 'text/html')
            // ->addPart(implode("\n", $content), 'text/plain');
            ClassRegistry::removeObject('view');

            return $htmlContent;
        }
        
      //  $content = $View->element('email' . DS . $this->sendAs . DS . $this->template, array('content' => $content), true);
        $View->layoutPath = 'email' . DS . $this->sendAs;
        $content = explode("\n", $rendered = str_replace(array("\r\n", "\r"), "\n", $View->renderLayout($content)));
    
        if ($this->sendAs === 'html') {
            $this->htmlMessage = $rendered;
        } else {
            $this->textMessage = $rendered;
        }
        // Set message body
        // $this->message->setBody($rendered, $this->getContentType($this->sendAs));

        ClassRegistry::removeObject('view');
        return $content;
    }

    /**
     * Reset all EmailComponent internal variables to be able to send out a new email.
     *
     * @access public
     * @link http://book.cakephp.org/view/1285/Sending-Multiple-Emails-in-a-loop
     */
    public function reset() {
        $this->transport = null;
        $this->message = null;
        $this->mailer = null;
        return parent::reset();
    }

    /**
     * Send an email using the specified content, template and layout
     *
     * @param mixed $content Either an array of text lines, or a string with contents
     *  If you are rendering a template this variable will be sent to the templates as `$content`
     * @param string $template Template to use when sending email
     * @param string $layout Layout to use to enclose email body
     * @return boolean Success
     * @access public
     */
    public function send($content = null, $template = null, $layout = null, $subject = null) {


        if ($template) {
            $this->template = $template;
        }

        if ($layout) {
            $this->layout = $layout;
        }

        if (is_array($content)) {
            $content = implode("\n", $content) . "\n";
        }
        $this->htmlMessage = $this->textMessage = null;
        if ($content) {
            if ($this->sendAs === 'html') {
                $this->htmlMessage = $content;
            } elseif ($this->sendAs === 'text') {
                $this->textMessage = $content;
            } else {
                $this->htmlMessage = $this->textMessage = $content;
            }
        }

        $message = $content;
//        if ($this->template === null) {
//            $message = $this->_formatMessage($message);
//        } else {
            $message = $this->_render($message, $subject);
       // }


        // $message = array();
        $message[] = '';
        $this->__message = $message;

        $_method = '_' . $this->delivery;
        $init = $this->$_method();

        if (!$init)
            return false;

        $this->initMessage();

        
        
        if (!empty($this->attachments)) {
            $this->_attachFiles();
        }

        $sent = $this->swiftMailerSend();
        $this->__header = $subject;
        $this->__message = array();

        return $sent;
    }

    // Transports
    /**
     * Wrapper for PHP mail function used for sending out emails
     *
     * @return bool Success
     * @access private
     */
    public function _mail() {
        if (empty($this->transport)) {
            try {
                $this->transport = Swift_MailTransport::newInstance();
            } catch (Swift_TransportException $e) {
                $this->log('Error authenticating smtp e-mail account', 'email_failure');
                $this->log($e->getMessage(), 'email_failure');
                return false;
            }
        }
        return $this->createMailerInstance();
    }

    /**
     * Sends out email via SMTP
     *
     * @return bool Success
     * @access private
     */
    public function _smtp() {
        if (empty($this->transport)) {
            try {
                // Check for ssl/tls on the host
                $schema = $this->extractSchema($this->smtpOptions['host']);
                if ($schema) {
                    $this->smtpOptions['encryption'] = $schema;
                }

                $this->transport = Swift_SmtpTransport::newInstance(
                                $this->smtpOptions['host'], $this->smtpOptions['port'], !empty($this->smtpOptions['encryption']) ? $this->smtpOptions['encryption'] : null
                        )
                        ->setUsername($this->smtpOptions['username'])
                        ->setPassword($this->smtpOptions['password']);
            } catch (Swift_TransportException $e) {
                $this->log('Error authenticating smtp e-mail account', 'email_failure');
                $this->log($e->getMessage(), 'email_failure');
                return false;
            }
        }
        return $this->createMailerInstance();
    }

    // METHODS CREATED SPECIALLY FOR SWIFTMAILER USAGE

    /**
     * Extracts the encryption type from the host url (ie. tls://smtp.gmail.com)
     * 
     * @param  string $host The host string.
     * @return mixed        False if no schema matched. Otherwise, an string with the encryption extracted will be returned.
     */
    private function extractSchema(&$host) {
        $regexp = '^(ssl|tls):\/\/(.+)';
        if (!preg_match("/$regexp/", $host, $matches)) {
            return false;
        }

        $host = array_pop($matches);

        return array_pop($matches);
    }

    /**
     * Sends out email via SMTP using ssl encryption
     *
     * @return bool Success
     * @access private
     */
    private function _sslsmtp() {
        $this->smtpOptions['encryption'] = 'ssl';
        return $this->_smtp();
    }

    /**
     * Sends out email via SMTP using tls encryption
     *
     * @return bool Success
     * @access private
     */
    private function _tlssmtp() {
        $this->smtpOptions['encryption'] = 'tls';
        return $this->_smtp();
    }

    /**
     * Sends out email using sendmail
     *
     * @return bool Success
     * @access private
     */
    private function _sendmail() {
        if (empty($this->transport)) {
            try {
                $this->transport = Swift_SendmailTransport::newInstance($this->sendmailCommand);
            } catch (Swift_TransportException $e) {
                $this->log('Error authenticating smtp e-mail account', 'email_failure');
                $this->log($e->getMessage(), 'email_failure');
                return false;
            }
        }
        return $this->createMailerInstance();
    }

    /*
     * Creates the swiftmailer instance
     */

    private function createMailerInstance() {
        if (empty($this->mailer)) {
            $this->mailer = Swift_Mailer::newInstance($this->transport);
        }
        return true;
    }

    /**
     * Sends the e-mail using swiftmailer
     */
    private function swiftMailerSend() {
        try {
            $this->mailer->send($this->message);
            return true;
        } catch (Swift_ConnectionException $e) {
            $this->log('Error sending mail...', 'email_failure');
            $this->log($e->getMessage(), 'email_failure');
        } catch (Swift_Message_MimeException $e) {
            $this->log('Error building mail...', 'email_failure');
            $this->log($e->getMessage(), 'email_failure');
        }
        return false;
    }

    private function getContentType($type) {
        switch ($type) {
            case 'text':
                return 'text/plain';
                break;
            case 'html':
            case 'both':
            default:
                return 'text/html';
        }
    }

    /**
     * Inits the swiftmailer message instance
     */
    private function initMessage() {
        if (empty($this->message)) {
            $this->message = Swift_Message::newInstance($this->subject);
        }

        $this->message->setSubject($this->subject)
                ->setFrom($this->parseMail($this->from))
                ->setTo($this->to);

        if (!empty($this->replyTo)) {
            $this->message->setReplyTo($this->parseMail($this->replyTo));
        }

        if (!empty($this->cc)) {
            $this->message->setCc($this->parseMail($this->cc));
        }

        if (!empty($this->bcc)) {
            $this->message->setBcc($this->parseMail($this->bcc));
        }

        // Body
        if ($this->sendAs == 'text') {
            $this->message->setBody($this->textMessage, $this->getContentType($this->sendAs));
        } else {
            // If both or html..
            $mess = '';
            if (!empty($this->__message)) {
                foreach ($this->__message as $val) {
                    $mess .= $val;
                    $mess .= "\n";
                }
            }
            $this->message->setBody($mess, $this->getContentType($this->sendAs));
            //$this->message->setBody(implode("\n", $this->__message), $this->getContentType($this->sendAs));
        }
        if ($this->sendAs == 'both') {
            $this->message->addPart($this->textMessage, 'text/plain');
        }
    }

    public function addCc($email, $name = null) {
        return $this->message->addCc($email, $name);
    }

    public function addBcc($email, $name = null) {
        return $this->message->addBcc($email, $name);
    }

    public function addTo($email, $name = null) {
        return $this->message->addTo($email, $name);
    }

    /**
     * Converts e-mail strings ala cakephp to swiftmailer style
     * @param mixed $email array or string of e-mails to parse
     * @return array
     */
    private function parseMail($email, $inside_loop = false) {

       
        if (!is_array($email) && strpos($email, ',')) {
            $email = explode(',', $email);
        }
       

        if (is_array($email)) {
            $emails = array();
            foreach ($email as $e) {
                $emails[] = $this->parseMail($e, true);
            }
            return $emails;
        }

        $matches = array();
        preg_match('/([^<]+)\s*<?([^>]+)?>?/', $email, $matches);

       
        // Only e-mail was found
        if (count($matches) == 2) {
            return $inside_loop ? trim($matches[1]) : array(trim($matches[1]));
            // Name and e-mail found
        } else {
            return array(trim($matches[2]) => trim($matches[1]));
        }
    }

}

?>
