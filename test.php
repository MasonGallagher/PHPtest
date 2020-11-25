<?php 
	
	$packs = array(250,300,500,1999,2000,5000);
	echo "Packs: ". json_encode($packs) . "<br><br>";
	
	$order=1;
	getPacks($packs, $order);
	
	$order=250;
	getPacks($packs, $order);
	
	$order=251;
	getPacks($packs, $order);
	
	$order=501;
	getPacks($packs, $order);
	
	$order=251;
	getPacks($packs, $order);
	
	$order=2001;
	getPacks($packs, $order);
	
	$order=12001;
	getPacks($packs, $order);
	
	
	
	function getPacks($packs, $order){
		echo "Order: " . ($order) . "<br>";
		$cart=array();
		echo json_encode(sortPacks($cart, $packs, $order)) . "<br> <br>";
	}
	
	function sortPacks($cart, $packs, $order){
	    $newCart = array();
		$div = 10000000;
		$oldItem = 0;
		$closeness = -10000;
		for($i =0; $i < count($packs); $i++){
			$item = $packs[$i];
            $newDiv = floor($order/$item);
            if($newDiv <= $div && $newDiv != 0){
				$div = $newDiv;
				$oldItem = $item;
				$closeness = -$item;
			}else if($newDiv == 0){
				if($closeness < ($order - $item)){
					$div = 1;
					$oldItem = $item;
					$closeness = $order - $item;
				}
				
            }else{
				break;
			}
        }
	
		if($oldItem!=0){
			for($j =0; $j < $div; $j++){
				array_push($newCart,$oldItem); 
			}
		}
		$newTotal = array_sum($newCart);
		$newTotal = $order - $newTotal;

        if($newTotal>0){
			if($newTotal<$packs[0]){
				$cart = array_merge($cart,$newCart); 
				array_push($cart,$packs[0]); 
			}else{
				$cart = array_merge($cart,sortPacks($newCart, $packs, $newTotal)); 
			}
		}else{
			$cart = array_merge($cart,$newCart); 
		}
		return $cart;	
	}
	
	

?>