<?php 
/**
* 
*/
namespace frame\base;
class Request{
	private static $instance;
	public $param ;
	public $controller;
	public $method;

	private function __construct(){}

	public function perseUrl()
	{
		if(empty(self::$instance)){
			self::$instance = new self();
			self::$instance->init();
		}
		return self::$instance;
	}

	public function init()
	{
		if(isset($_GET['url'])){
			$url = $_GET['url'];

			$url = explode('/', $url);

			if(isset($url[0])) {
				$this->controller = $url[0];
				unset($url[0]);
			}
			if(isset($url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}

			
			$url = array_values($url);
			$num = count($url);
			if($num > 0){
				if($num == 1){
					if(is_numeric($url[0])){
						$this->param['id'] = $url[0];
						return;
					}
					throw new \Exception("id必须是数组", 1);
				}

				if($num % 2 == 0){
					for ($i=0; $i < $num-1 ; $i+=2) { 
						$this->param[$url[$i]] = $url[$i+1];
					}
					return;
				}

				throw new \Exception("参数错误", 1);
				
			}
		}
	}

}


 ?>