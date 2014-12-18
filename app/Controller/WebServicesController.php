<?php

App::uses('CakeTime', 'Utility');
App::import('Vendor', 'Nusoap', array('file' => 'nusoap' . DS . 'lib' . DS . 'nusoap.php'));

class WebServicesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'WebServices';
    public $uses = array();
    
    function index() {


        if (ob_get_length() > 0)
            ob_end_clean();

        $this->autoRender = false;
        $this->RequestHandler->respondAs('xml');
        

        $server = new soap_server();
        $server->soap_defencoding = 'UTF-8';
        $server->configureWSDL("obelitCRM", Router::url('/WebServices', true), Router::url('/WebServices', true));

        //Start: Create WS Methods Here....
        function gethelloworld($name) {
            $myname = "My Name Is:" . $name;
            return $myname;
        }

        //**return Account array in getAllAcounts**//
        $server->wsdl->addComplexType(
                'Account', 'complexType', 'struct', 'all', '', array(
            'id' => array('name' => 'id', 'type' => 'xsd:int'),
            'created' => array('name' => 'created', 'type' => 'xsd:date'),
            'updated' => array('name' => 'updated', 'type' => 'xsd:date'),
            'created_by' => array('name' => 'created_by', 'type' => 'xsd:int'),
            'updated_by' => array('name' => 'updated_by', 'type' => 'xsd:int'),
            'country' => array('name' => 'country', 'type' => 'xsd:string'),
            'street' => array('name' => 'street', 'type' => 'xsd:string'),
            'suburb' => array('name' => 'suburb', 'type' => 'xsd:string'),
            'city' => array('name' => 'city', 'type' => 'xsd:string'),
            'state' => array('name' => 'state', 'type' => 'xsd:string'),
            'zip' => array('name' => 'state', 'type' => 'xsd:string'),
            'phone' => array('name' => 'phone', 'type' => 'xsd:string'),
            'firstname' => array('name' => 'firstname', 'type' => 'xsd:string'),
            'lastname' => array('name' => 'lastname', 'type' => 'xsd:string'),
            'sex' => array('name' => 'sex', 'type' => 'xsd:string'),
            'birthdate' => array('name' => 'birthdate', 'type' => 'xsd:date'),
            'team_id' => array('name' => 'team_id', 'type' => 'xsd:int'),
            'email' => array('name' => 'email', 'type' => 'xsd:string'),
            'mobilephone' => array('name' => 'mobilephone', 'type' => 'xsd:string'),
            'alias' => array('name' => 'alias', 'type' => 'xsd:string'),
            'name' => array('name' => 'name', 'type' => 'xsd:string'),
            'tax_number' => array('name' => 'tax_number', 'type' => 'xsd:string'),
            'mode' => array('name' => 'mode', 'type' => 'xsd:string'),
            'type' => array('name' => 'type', 'type' => 'xsd:string'),
            'delivery_address' => array('name' => 'delivery_address', 'type' => 'xsd:int'),
            'billing_address' => array('name' => 'billing_address', 'type' => 'xsd:int'),
                )
        );
        $server->wsdl->addComplexType(
                'Accounts', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(
            array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:Account[]')
                ), 'tns:Account'
        );

        //**return Product array in getAllProducts**//
        $server->wsdl->addComplexType(
                'Product', 'complexType', 'struct', 'all', '', array(
            'id' => array('name' => 'id', 'type' => 'xsd:int'),
            'created' => array('name' => 'created', 'type' => 'xsd:date'),
            'updated' => array('name' => 'updated', 'type' => 'xsd:date'),
            'created_by' => array('name' => 'created_by', 'type' => 'xsd:int'),
            'updated_by' => array('name' => 'updated_by', 'type' => 'xsd:int'),
            'integration_num' => array('name' => 'integration_num', 'type' => 'xsd:string'),
            'name' => array('name' => 'name', 'type' => 'xsd:string'),
            'active_flg' => array('name' => 'active_flg', 'type' => 'xsd:int'),
            'uom' => array('name' => 'uom', 'type' => 'xsd:string'),
            'status' => array('name' => 'status', 'type' => 'xsd:string'),
            'unit_price' => array('name' => 'unit_price', 'type' => 'xsd:double'),
            'stock' => array('name' => 'stock', 'type' => 'xsd:double'),
            'track_stock_flg' => array('name' => 'track_stock_flg', 'type' => 'xsd:int'),
            'short_desc' => array('name' => 'short_desc', 'type' => 'xsd:string'),
            'long_desc' => array('name' => 'long_desc', 'type' => 'xsd:string'),
            'part_number' => array('name' => 'part_number', 'type' => 'xsd:string'),
            'family_id' => array('name' => 'family_id', 'type' => 'xsd:int'),
            'product_type' => array('name' => 'product_type', 'type' => 'xsd:string'),
            'picture' => array('name' => 'picture', 'type' => 'xsd:string'),
            'color' => array('name' => 'color', 'type' => 'xsd:string'),
            'bundle_flg' => array('name' => 'bundle_flg', 'type' => 'xsd:int'),
            'track_refund_flg' => array('name' => 'tax_number', 'type' => 'xsd:int'),
            'supply_type' => array('name' => 'mode', 'type' => 'xsd:string'),
                )
        );

        $server->wsdl->addComplexType(
                'Products', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(
            array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:Product[]')
                ), 'tns:Product'
        );

        //**return Pricelist array in getAllPriceLists**//
        $server->wsdl->addComplexType(
                'Pricelist', 'complexType', 'struct', 'all', '', array(
            'id' => array('name' => 'id', 'type' => 'xsd:int'),
            'name' => array('name' => 'name', 'type' => 'xsd:string'),
            'created' => array('name' => 'created', 'type' => 'xsd:date'),
            'updated' => array('name' => 'updated', 'type' => 'xsd:date'),
            'currency' => array('name' => 'currency', 'type' => 'xsd:string'),
            'currency_symbol' => array('name' => 'currency_symbol', 'type' => 'xsd:string'),
            'updated_by' => array('name' => 'updated_by', 'type' => 'xsd:int'),
            'created_by' => array('name' => 'created_by', 'type' => 'xsd:int'),
            'active_flg' => array('name' => 'integration_num', 'type' => 'xsd:int'),
            'tax' => array('name' => 'active_flg', 'type' => 'xsd:int'),
                )
        );

        $server->wsdl->addComplexType(
                'Pricelists', 'complexType', 'array', '', 'SOAP-ENC:Array', array(), array(
            array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:Pricelist[]')
                ), 'tns:Pricelist'
        );

        $server->register("gethelloworld", array("name" => "xsd:string"), array("return" => "xsd:string"), "urn:helloworld", "urn:helloworld#gethelloworld");
        $server->register("WebServicesController.getAllAcounts", array(), array("return" => "tns:Accounts"), "urn:obelitCRM", "urn:obelitCRM#WebServicesController.getAllAcounts");
        $server->register("WebServicesController.getAllProducts", array(), array("return" => "tns:Products"), "urn:obelitCRM", "urn:obelitCRM#WebServicesController.getAllProducts");
        $server->register("WebServicesController.getAllPriceLists", array(), array("return" => "tns:Pricelists"), "urn:obelitCRM", "urn:obelitCRM#WebServicesController.getAllPriceLists");

        //End: Create WS Methods Here.
        global $HTTP_RAW_POST_DATA;
        $data = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
        $server->service($data);
        exit();
    }

    function getAllAcounts() {
        
        $client_ip = $_SERVER["REMOTE_ADDR"];
        CakeLog::write('info', 'Iniciando llamado al metodo getAllAcounts desde la ip - ' . $client_ip);
        $array_Accounts;
        $qry = " SELECT id, created, updated, created_by, updated_by, country, street, suburb, city ,state, zip, ";
        $qry .= " phone, firstname, lastname, sex, birthdate, team_id, email, mobilephone, alias, name, tax_number,  ";
        $qry .= " mode, type, delivery_address, billing_address";
        $qry .= " FROM accounts ";


        $this->loadModel('Account');
        $accounts = $this->Account->query($qry);

        $i = 0;
        foreach ($accounts as $account) {
            $data['id'] = intval($account['accounts']['id']);
            $data['created'] = $account['accounts']['created'];
            $data['updated'] = $account['accounts']['updated'];
            $data['created_by'] = intval($account['accounts']['created_by']);
            $data['updated_by'] = intval($account['accounts']['updated_by']);
            $data['country'] = $account['accounts']['country'] == null ? '' : $account['accounts']['country'];
            $data['street'] = $account['accounts']['street'] == null ? '' : $account['accounts']['street'];
            $data['suburb'] = $account['accounts']['suburb'] == null ? '' : $account['accounts']['suburb'];
            $data['city'] = $account['accounts']['city'] == null ? '' : $account['accounts']['city'];
            $data['state'] = $account['accounts']['state'] == null ? '' : $account['accounts']['state'];
            $data['zip'] = $account['accounts']['zip'] == null ? '' : $account['accounts']['zip'];
            $data['phone'] = $account['accounts']['phone'] == null ? '' : $account['accounts']['phone'];
            $data['firstname'] = $account['accounts']['firstname'];
            $data['lastname'] = $account['accounts']['lastname'];
            $data['birthdate'] = $account['accounts']['birthdate'] == null ? '' : $account['accounts']['birthdate'];
            $data['team_id'] = intval($account['accounts']['team_id']);
            $data['email'] = $account['accounts']['email'] == null ? '' : $account['accounts']['email'];
            $data['mobilephone'] = $account['accounts']['mobilephone'] == null ? '' : $account['accounts']['mobilephone'];
            $data['alias'] = $account['accounts']['alias'];
            $data['name'] = $account['accounts']['name'];
            $data['tax_number'] = intval($account['accounts']['tax_number']);
            $data['mode'] = $account['accounts']['mode'] == null ? '' : $account['accounts']['mode'];
            $data['type'] = $account['accounts']['type'] == null ? '' : $account['accounts']['type'];
            $data['delivery_address'] = intval($account['accounts']['delivery_address']);
            $data['billing_address'] = intval($account['accounts']['billing_address']);
            $array_Accounts[$i] = $data;
            $i++;
        }
        CakeLog::write('info', 'Retorno exitoso de Cuentas!!');
        return $array_Accounts;
    }

    function getAllProducts() {

       
         $client_ip = $_SERVER["REMOTE_ADDR"];
        CakeLog::write('info', 'Iniciando llamado al metodo getAllProducts desde la ip - ' . $client_ip );

        $array_Products;

        $qry = " SELECT id ,  integration_num , name ,  created , updated , created_by , updated_by , ";
        $qry .= "  active_flg , uom , status , unit_price , stock , track_stock_flg , short_desc , ";
        $qry .= "  long_desc , part_number , family_id , product_type , picture , color , bundle_flg , ";
        $qry .= "  track_refund_flg , supply_type ";
        $qry .= " FROM products";

        $this->loadModel('Product');
        $products = $this->Product->query($qry);

        $i = 0;
        foreach ($products as $product) {
            $data['id'] = intval($product['products']['id']);
            $data['integration_num'] = $product['products']['integration_num'] == null ? '' : $product['products']['integration_num'];
            $data['name'] = $product['products']['name'] == null ? '' : $product['products']['name'];
            $data['created'] = $product['products']['created'];
            $data['updated'] = $product['products']['updated'];
            $data['created_by'] = intval($product['products']['created_by']);
            $data['updated_by'] = intval($product['products']['updated_by']);
            $data['active_flg'] = intval($product['products']['active_flg']);
            $data['uom'] = $product['products']['uom'] == null ? '' : $product['products']['uom'];
            $data['status'] = $product['products']['status'] == null ? '' : $product['products']['status'];
            $data['unit_price'] = floatval($product['products']['unit_price']);
            $data['stock'] = floatval($product['products']['stock']);
            $data['track_stock_flg'] = intval($product['products']['track_stock_flg']);
            $data['short_desc'] = $product['products']['short_desc'] == null ? '' : $product['products']['short_desc'];
            $data['long_desc'] = $product['products']['long_desc'] == null ? '' : $product['products']['long_desc'];
            $data['part_number'] = $product['products']['part_number'] == null ? '' : $product['products']['part_number'];
            $data['family_id'] = intval($product['products']['family_id']);
            $data['product_type'] = $product['products']['product_type'] == null ? '' : $product['products']['product_type'];
            $data['picture'] = $product['products']['picture'] == null ? '' : $product['products']['picture'];
            $data['color'] = $product['products']['color'] == null ? '' : $product['products']['color'];
            $data['bundle_flg'] = intval($product['products']['bundle_flg']);
            $data['track_refund_flg'] = intval($product['products']['track_refund_flg']);
            $data['supply_type'] = $product['products']['supply_type'] == null ? '' : $product['products']['supply_type'];

            $array_Products[$i] = $data;
            $i++;
        }
        CakeLog::write('info', 'Retorno exitoso de Productos!!');
        return $array_Products;
    }

    function getAllPriceLists() {
        
         $client_ip = $_SERVER["REMOTE_ADDR"];
          CakeLog::write('info', 'Iniciando llamado al metodo getAllPriceLists!! desde la ip - ' . $client_ip);

        $array_PriceLists;

        $qry = " SELECT id ,  name, created ,  updated , currency , currency_symbol ,   updated_by , created_by ,";
        $qry .= "  active_flg , tax  ";
        $qry .= " FROM pricelists";

        $this->loadModel('Pricelist');
        $pricelists = $this->Pricelist->query($qry);

        $i = 0;
        foreach ($pricelists as $pricelist) {
            $data['id'] = intval($pricelist['pricelists']['id']);
            $data['name'] = $pricelist['pricelists']['name'] == null ? '' : $pricelist['pricelists']['name'];
            $data['created'] = $pricelist['pricelists']['created'];
            $data['updated'] = $pricelist['pricelists']['updated'];
            $data['currency'] = $pricelist['pricelists']['currency'] == null ? '' : $pricelist['pricelists']['currency'];
            $data['currency_symbol'] = $pricelist['pricelists']['currency_symbol'] == null ? '' : $pricelist['pricelists']['currency_symbol'];
            $data['updated_by'] = intval($pricelist['pricelists']['updated_by']);
            $data['created_by'] = intval($pricelist['pricelists']['created_by']);
            $data['active_flg'] = intval($pricelist['pricelists']['active_flg']);
            $data['tax'] = intval($pricelist['pricelists']['tax']);

            $array_PriceLists[$i] = $data;
            $i++;
        }
        CakeLog::write('info', 'Retorno exitoso de Lista de precios!!');
        return $array_PriceLists;
    }

    function beforeFilter() {
        parent::beforeFilter();
        //    $this->Auth->allow('index', 'gethelloworld');
        $this->Auth->allow('index', 'getAllPriceLists');
        $this->Auth->allow('index', 'getAllProducts');
        $this->Auth->allow('index', 'getAllAcounts');
    }

}

?>