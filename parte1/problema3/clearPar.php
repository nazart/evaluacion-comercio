<?php

class clearPar {

	function build($string) {
		if(!is_string($string)){
			echo 'el valor no es un string';
			return FALSE;
		}
		$length = strlen($string); /*contamos la cantidad de caracteres que ingresan*/
		$result = '';
		for ($i=0; $i<$length; $i++) {
			if(substr($string, $i, 2)=='()'){
				$result.='()';
			}
		}
		return $result;
	}
}
