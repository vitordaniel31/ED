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

	function quickSort($v, $s, $e, $piv) //piv é a posição do pivô
	{
		if($s<$e){
			$p = partition($v, $s, $e, $piv);
			$v = quickSort($v, $s, $p-1, $piv);
			$v = quickSort($v, $p+1, $e, $piv);	
		}

		return $v;
	}

	function partition(&$v, $s, $e, $piv)
	{
		$k = $v[$piv]; //pivô na posição piv
		$i = $s-1;
		for ($j=$s; $j<=$e-1; $j++) { 
			if($v[$j]<=$k){
				$i+=1;
				$aux = $v[$i];
				$v[$i] = $v[$j];
				$v[$j] = $aux;
			}
		}
		$aux = $v[$i+1];
		$v[$i+1] = $v[$e];
		$v[$e] = $aux;

		return $i+1;
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
				$v = quickSort($v, 0, $n-1, intdiv($n, 2)); //pivô é o elemento do meio, pois está ordenado crescente
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
				$v = quickSort($v, 0, $n-1, 0); //pivô pode ser qualquer elemento, pois é aleatório. Nesse caso é o primeiro
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
				$v = quickSort($v, 0, $n-1, 0); ///pivô pode ser o primeiro ou o último elemento, pois está ordenado descrescente e no pior caso o pivô é o maior ou o menor elemento. Nesse caso é o primeiro
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
	//medioCaso();
	piorCaso();

?>