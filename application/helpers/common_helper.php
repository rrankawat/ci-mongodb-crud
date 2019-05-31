<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('pr')) {
	function pr($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

if(!function_exists('getId')) {
	function getId($item) {
		foreach($item as $id) {
			echo $id;
		}
	}
}