<?php
/**
* Funzione di conversione b, kb, mg, gb, tb
*/
function unit_converter($val) {
	// conversione da byte a kb
	if ($val > 1024) {
		$val = round($val / 1024, 2);
		// conversione da kb a mb
		if ($val > 1024) {
			$val = round($val / 1024, 2);
			// conversione da gb a mb
			if ($val > 1024) {
				$val = round($val / 1024, 2);
				// conversione da gb a tb
				if ($val > 1024) {
					$val = round($val / 1024, 2);
					$final_val = $val . " tb";
				} else {
					$final_val = $val . " gb";	
				}
			} else {
				$final_val = $val . " mb";
			}
		} else {
			$final_val = $val . " kb";
		}
	} else {
		$final_val = $val . " byte";
	}
	
	return $final_val;
}

?>