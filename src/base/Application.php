<?php 
/**
* 
*/


namespace frame\base;

class Application
{	
	public $config = '';
	public $request = '';

	function __construct($config)
	{
		$this->config = $config;
	}

	public function run()
	{
		$rregister = \frame\register\RequestRegistry::instance();
		
		$rregister->set('config',$this->config);
	    //取得vender目录
	    $ref = new \ReflectionClass('Composer\Autoload\ClassLoader');	
	    $vendorPath = realpath(dirname($ref->getFileName()).'/../../vendor');  
	    $rregister->set('vendorPath',$vendorPath);
	    //定义项目根目录的自动加载
	    $loader = require $vendorPath.'/autoload.php';	    
	    $loader->addPsr4('app\\', $this->config['appPath'].'/');
 	    //存储request对象  
		$this->request = \frame\base\Request::perseUrl();
		$rregister::set('request',$this->request);	

		$this->	runController();		
	}

	public function runController()
	{
		$cname = $this->request->controller?$this->request->controller:'index';
		$mname = $this->request->method?$this->request->method:'index';

		$rregister = \frame\register\RequestRegistry::instance();
		$rregister->set('controller',$cname);
		$rregister->set('method',$mname);

		$cname = '\app\controller\\'.$cname.'Controller';

		(new $cname)->$mname();
		
	}
}


 ?>