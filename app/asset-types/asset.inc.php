<?php

Class Asset {
	
	var $data;
	var $link_path;
	var $file_name;
	
	function __construct($file_path) {
		# create and store data required for this asset
		$this->set_default_data($file_path);
	}
	
	function construct_link_path($file_path) {
		return preg_replace('/^\.\//u', Helpers::relative_root_path(), $file_path);
	}
	
	function set_default_data($file_path) {
		# store link path
		$this->link_path = $this->construct_link_path($file_path);
		
		# extract filename from path
			$split_path = explode('/', $file_path);
		$this->file_name = array_pop($split_path);
		
		# set @url & @name variables
		$this->data['@url'] = $this->link_path;
		$this->data['@name'] = ucfirst(preg_replace(array('/[-_]/u', '/\.[\w\d]+?$/u', '/\d+?\./u'), array(' ', '', ''), $this->file_name));
	}
	
}

?>