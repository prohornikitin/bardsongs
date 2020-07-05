<?php
	class Registry implements ArrayAccess
	{
		private static $instance;
		private $vars = array();

		private function __construct() {}

		public static function getInstance() : Registry{
				if(!isset($instance)) {
					Registry::$instance = new Registry();
				}
				return Registry::$instance;
			}

		public function offsetExists($offset) : bool{
			return isset($this->vars[$offset]);
		}
		
		public function offsetSet($offset, $value) : void{
			if (is_null($offset)) {
				$this->vars[] = $value;
			} else {
				$this->vars[$offset] = $value;
			}
		}

		public function offsetGet($offset){
			if(isset($this->vars[$offset])) {
				return $this->vars[$offset];
			} else {
				return null;
			}
		}

		public function offsetUnset($offset) : void {
			unset($this->vars[$offset]);
		}
	}