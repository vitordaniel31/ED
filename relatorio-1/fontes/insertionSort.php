<?php
	function sortArrayRandom($v, $n){
		for($i=0; $i<$n; $i++) $v[$i] = rand(1, 1000);

		return $v;
	}

	function sortArrayOrdenado($v, $n){
		for($i=0; $i<$n; $i++) $v[$i] = $i;

		return $v;
	}

	function sortArrayOrdenadoDecrescente($v, $n){
		$j=0;
		for($i=$n-1; $i>=0; $i--){
			$v[$j] = $i;
			$j++;
		} 

		return $v;
	}

	function insertionSort($v, $n)
	{
		for($i=1; $i<$n; $i++){
			$k = $v[$i];
			$j = $i-1;
			while($j>=0 and $v[$j]>$k){
				$v[$j+1] = $v[$j];
				$j = $j-1;
			}
			$v[$j+1] = $k;
		}

		return $v;
	}

	function melhorCaso()
	{
		$v = [];
		$n=100;
		$media = 0; 
		while($n<=1000){
			for($i=0; $i<1000; $i++){
				$v = sortArrayOrdenado($v, $n);
				$inicio = microtime(true);
				$v = insertionSort($v, $n);
				$fim = microtime(true);
				$media+= $fim-$inicio;
			}
			echo $n . ' ' . $media/1000 . "\n";
			$media = 0;
			$n+=100;
		}
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
				$v = insertionSort($v, $n);
				$fim = microtime(true);
				$media+= $fim-$inicio;
			}
			echo $n . ' ' . $media/1000 . "\n";
			$media = 0;
			$n+=100;
		}
	}

	function piorCaso()
	{
		$v = [];
		$n=100;
		$media = 0; 
		while($n<=1000){
			for($i=0; $i<1000; $i++){
				$v = sortArrayOrdenadoDecrescente($v, $n);
				$inicio = microtime(true);
				$v = insertionSort($v, $n);
				$fim = microtime(true);
				$media+= $fim-$inicio;
			}
			echo $n . ' ' . $media/1000 . "\n";
			$media = 0;
			$n+=100;
		}
	}

	//descomente a linha do caso que deseja utilizar

	//melhorCaso();
	medioCaso();
	//piorCaso();

?>