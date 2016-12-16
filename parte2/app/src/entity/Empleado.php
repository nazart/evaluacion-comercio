<?php

namespace App\Entity;

class EntityEmpleado {
	
	function identify($id) {
		$list = $this->getList();
		$result = '';
		foreach ($list as $index) {
			if ($index->id == $id) {
				$result = $index;
				break;
			}
		}
		return $result;
	}
	function getListXml($min='', $max=''){
		$lista = json_decode(file_get_contents((__dir__) . '/employees.json'),true);
		$listaSearch =[];
		if($min!='' && $max!=''){
			foreach ($lista as $index){
				$salary=(int)str_replace(',','',substr($index['salary'], 1));
				if($salary>=$min && $salary<=$max){
					$listaSearch[] = $index;
				}
			}
			$lista=$listaSearch;
		}
		$xml = new \SimpleXMLElement('<empleados/>');
		$this->to_xml($xml, $lista);
		return $xml->asXML();
	}
	
	function to_xml(\SimpleXMLElement $object, array $data)
	{   
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$new_object = $object->addChild($key);
				$this->to_xml($new_object, $value);
			} else {   
				$object->addChild($key, $value);
			}   
		}   
	} 

	function getList() {
		$result = json_decode(file_get_contents((__dir__) . '/employees.json'));
		if ($email != '') {
			$resultSearch = [];
			foreach ($result as $index) {
				if ($index->email == $email) {
					$resultSearch[] = $index;
					break;
				}
			}
			$result = $resultSearch;
		}
		return $result;
	}

}
