<?php 
	
	$packs = array(250,500,1000,2000,5000);
	$order=12001;
	echo "Packs: ". json_encode($packs) . "<br><br>";
	
	getPacks($packs, $order);
	
	$order=501;
	getPacks($packs, $order);
	
	$order=501;
	getPacks($packs, $order);

	$order=251;
	getPacks($packs, $order);
	
	$order=250;
	getPacks($packs, $order);
	
	$order=1;
	getPacks($packs, $order);
	
	function getPacks($packs, $order){
		echo "Order: " . ($order) . "<br>";
		$cart=array();
		for ($i = count($packs)-1; $i >= 0; $i--) {
			$pack=$packs[$i];
			while(true){
				$sum = $order - $pack;
				if($sum > 0){
					$order = $order - $pack;
					if($order < 1){
						break;
					}
					array_push($cart,$pack); 
				}else{
					break;
				}
			}
		}
		if($order >= 1){
			array_push($cart,$packs[0]); 
		}
		
		echo json_encode($cart) . "<br> <br>";
	}

?>