<?php

function moments($seconds)
{
    if($seconds < 60 * 60 * 24 * 30)
    {
        return "within the month";
    }

    return "a while ago";
}



	//$row = 4 for sorting by priority
	function bubbleSort($row, $dataArray){
		$sortedArray = $dataArray;

		for($i = 0; $i < count($sortedArray); $i++){
			for($j = 0; $j < count($sortedArray) - 1 - $i; $j++){
				if ((int)$sortedArray[$j][$row] > (int)$sortedArray[$j+1][$row]){
					$tmp = $sortedArray[$j];
					$sortedArray[$j] =  $sortedArray[$j+1];
					$sortedArray[$j+1] = $tmp;
				}
			}
		}

		return $sortedArray;
	}

	function readFileAndSplitData($fileName){
		$dataArray = array();
		$fileName = './' . $fileName;
		$file = fopen($fileName, 'r');
		do {
			if ($line = fgets($file) ){
			array_push($dataArray, explode(',' , $line));
		}
		else{
			break;
		}
		} while (true);
		
		fclose($fileName);

		return $dataArray;
	}

?>