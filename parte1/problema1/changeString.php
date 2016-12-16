<?php

class chageString {

	private $_letter;
	const EJECUCION_CONSOLA='cli';

	function __construct() {
		$this->_letter = range('a', 'z'); /* rango del abecedario */
		$indiceENE = array_search('n', $this->_letter); /* buscamos el indice */
		$str = 'ñ';
		if(php_sapi_name()==self::EJECUCION_CONSOLA){ /*solo si se ejecuta en consola*/
			$str = $this->getStringForConsole($str);
		}
		array_splice($this->_letter, $indiceENE + 1, 0, $str); /* agregamos la ñ despues de la n */
	}

	function build($string) {
		$cont = count($this->_letter); /*contamos la cantidad de elementos que hay en el array*/
		$length = strlen($string); /*contamos la cantidad de caracteres que ingresan*/
		$result = '';
		for ($i=0; $i<$length; $i++) {/*iteramos cada letra del string*/
			$indice = array_search($string[$i], $this->_letter); /*buscamos si cada letra corresponde a un indice del array $this->_letter*/
			if($indice!==FALSE){/*si no encuentra entonces significa de que el resultado es identico a false*/
				if($cont==($indice+1)){/*en caso de que encuentre el indice verficamos que no sea el ultimo indice, y en cas de que sea el ultimo devolvemos el primer elemento del array $thi->_letter*/
					$result .= $this->_letter[0];
				}else{
					$result .= $this->_letter[1+$indice];
				}
			}else{
				$result .= $string[$i];
			}
		}
		return $result;
	}

	function getLetter() {
		return $this->_letter;
	}

	function getStringForConsole($string) {
		$consoleEncoding = explode(":", exec("chcp"));
		return iconv("UTF-8", "CP" . trim($consoleEncoding[1]), $string);
	}
}
