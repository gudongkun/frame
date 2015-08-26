<?php 
namespace frame\base;
/**
* 
*/
class controller
{	
	protected $data=[];
	function display($path='',$data=[]){
		$rregister = \frame\register\RequestRegistry::instance();

		$data += $this->data;
		extract($data);

		$pathArr = array_reverse(explode('/', $path));
		$pathArr2 = array($rregister->get('method'),$rregister->get('controller'));	
		$pathArr += $pathArr2;
		$pathArr = array_reverse($pathArr);
		$config = $rregister->get('config');
		$viewPath =$config['appPath'].'/views/'.implode('/', $pathArr).'.php';


		require $viewPath;
	}
}

 ?>