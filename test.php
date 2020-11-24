<?php 
	
	$packs = array(250,500,1000,2000,5000);
	$order=12001;
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
	
	echo json_encode($cart);

?>