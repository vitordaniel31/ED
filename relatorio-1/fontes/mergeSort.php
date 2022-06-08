<?php
	function sortArrayRandom($v, $n){
		for($i=0; $i<$n; $i++) $v[$i] = rand(1, 1000);

		return $v;
	}

	function mergeSort($v, $s, $e)
	{
		if($s < $e){
			$m = intdiv($s+$e, 2); //parte inteira da divisao
			$v = mergeSort($v, $s, $m);
			$v = mergeSort($v, $m+1, $e);
			$v = merge($v, $s, $m, $e);
		}

		return $v;
	}

	function merge($v, $s, $m, $e)
	{
		$i = $s;
		$j = $m+1;
		$w = [];
		for ($k=0; $k<($e-$s+1); $k++) { 
		 	if($j>$e or ($i<=$m and $v[$i]<$v[$j]) ){
		 		$w[$k] = $v[$i];
		 		$i = $i+1;
		 	}else{
		 		$w[$k] = $v[$j];
		 		$j += 1;
		 	}
		}
		for ($k=0; $k<($e-$s+1); $k++) { 
		 	$v[$s+$k] = $w[$k];
		}  

		return $v;
	}


	function medioCaso()
	{
		$v = [];
		$n=100;
		$media = 0; 
		while($n<=1000){
			for($i=0; $i<1000; $i++){
				$v = sortArrayRandom($v, $n);
				$inicio = microtime(true);
				$v = mergeSort($v, 0, $n-1);
				$fim = microtime(true);
				$media+= $fim-$inicio;
			}
			echo $n . ' ' . $media/1000 . "\n";
			$media = 0;
			$n+=100;
		}
	}

	medioCaso();

?>