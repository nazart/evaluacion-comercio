<?php

class completeRange {

	function build($input) {
		if(!is_array($input)){
			echo 'el elemento no es un array';
			return false;
		}
		if(!isset($input[0])){
			echo 'error en el arreglo';
			return false;
		}
		$inicio = $input[0];
		$final = end($input);
		return range($inicio, $final);
	}
}
