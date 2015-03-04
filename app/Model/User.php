<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Group $Group
 * @property Workstation $Workstation
 */
class User extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'firstname';
    public $actsAs = array(
        'Acl' => array('type' => 'requester'),
        'User',
        'Uploader.Attachment' => array(
            'avatarFile' => array(
                'name' => 'formatFileName', // Name of the function to use to format filenames
                //'baseDir'	=> '',			// See UploaderComponent::$baseDir
                'uploadDir' => '', // See UploaderComponent::$uploadDir
                'dbColumn' => 'avatar', // The database column name to save the path to
                //'importFrom'	=> '',			// Path or URL to import file
                //'defaultPath'	=> '',			// Default file path if no upload present
                'maxNameLength' => 100, // Max file name length
                'overwrite' => true, // Overwrite file with same name if it exists
                'stopSave' => true, // Stop the model save() if upload fails
                'allowEmpty' => true, // Allow an empty file upload to continue
                'transforms' => array()  // What transformations to do on images: scale, resize, etc
            ),
            'coverimgFile' => array(
                'name' => 'formatFileName', // Name of the function to use to format filenames
                //'baseDir'	=> '',			// See UploaderComponent::$baseDir
                'uploadDir' => '', // See UploaderComponent::$uploadDir
                'dbColumn' => 'coverimg', // The database column name to save the path to
                //'importFrom'	=> '',			// Path or URL to import file
                //'defaultPath'	=> '',			// Default file path if no upload present
                'maxNameLength' => 100, // Max file name length
                'overwrite' => true, // Overwrite file with same name if it exists
                'stopSave' => true, // Stop the model save() if upload fails
                'allowEmpty' => true, // Allow an empty file upload to continue
                'transforms' => array()  // What transformations to do on images: scale, resize, etc
            )
        ),
        'Uploader.FileValidation' => array(
            'avatarFile' => array(
                'extension' => array('gif', 'jpg', 'png', 'jpeg', 'pdf'),
                'filesize' => 5242880,
                'required' => false
            ),
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Workstation' => array(
            'className' => 'Workstation',
            'foreignKey' => 'workstation_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function parentNode()
    {
        if (!$this->id && empty($this->data))
        {
            return null;
        }
        if (isset($this->data['User']['group_id']))
        {
            $groupId = $this->data['User']['group_id'];
        } else
        {
            $groupId = $this->field('group_id');
        }
        if (!$groupId)
        {
            return null;
        } else
        {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function bindNode($user)
    {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

}
