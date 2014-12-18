<?php
/**
 *
 * @author   Nicolas Rod <nico@alaxos.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.alaxos.ch
 */
class AclController extends AclAppController {

	var $name = 'Acl';
	var $uses = null;
	
	function index()
	{
		$this->params['ACTIVE_MENU'] = "#catalogs-nav";
		$this->params['CURRENT_PAGE'] = "catalog";
	    $this->redirect('/admin/acl/aros');
	}
	
	function admin_index()
	{
		$this->params['ACTIVE_MENU'] = "#catalogs-nav";
		$this->params['CURRENT_PAGE'] = "catalog";
	    $this->redirect('/admin/acl/acos');
	}
	
}
?>