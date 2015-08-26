<?php 
namespace app\controller;

/**
* 
*/
class indexController extends \frame\base\controller
{
	
	function index()
	{
		
		$this->display('index',array('name'=>'好人'));
	}
}

 ?>