<?php

	function create_uniqid(){
		$id = md5(uniqid(rand()));
		return $id;
	}
?>