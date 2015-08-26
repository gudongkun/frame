<?php 
namespace frame\register;
/**
* 
*/
class RequestRegistry
{
	private static $instance;
	private $values = array();
	
	private function __construct(){}
	/*单例模式取得单例对象*/
	public static function instance() {
		if(!isset(self::$instance)) {self::$instance = new self();}
		return self::$instance;
	}

	public function get($key){
		if(isset($this->values[$key])){
			return $this->values[$key];
		}

		return null;
	}

	public function set($key,$val){
		$this->values[$key] = $val;
	}
}

