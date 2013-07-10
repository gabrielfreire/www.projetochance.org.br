<?php

class GerarNumero{
	
	static function RA($quant=1, $min=10000, $max=90000){

                FuncAux::retDefaultTimeZone();
            
		$numero = range($min,$max);
	
		shuffle($numero);
		$arr = array_slice($numero, 0, $quant);
		$ra = date("Y").$arr[0];
		
		return $ra;
	}
}

?>