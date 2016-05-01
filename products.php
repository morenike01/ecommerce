<?php
session_start();
require_once './Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./web');
$twig = new Twig_Environment($loader);

$conn= mysqli_connect("localhost","root","","store");
if(isset($_GET['status'])){
		session_unset();
}

if(isset($_GET['empty']) && $_GET['empty']==1){
	session_destroy();
	header('location: products.php');
}

//setting the cart if not set
if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=array();
}

//increasing the quantity of a product if already exist in the cart.
if(isset($_GET['lid'])){
	$lit=0;
	foreach($_SESSION['cart'] as $light){
		if($light==$_GET['lid']){
			$lit++;
			break;
		}
	}
	if($lit==0){  //if the product does not exist then push it to the cart.
		array_push($_SESSION['cart'],$_GET['lid']);
	}
}

//removing product from the cart with a given id.
if(isset($_GET['remove'])){
	$count=0;
	foreach($_SESSION['cart'] as $light){
		if($light==$_GET['remove']){
			unset($_SESSION['cart'][$count]);
		}
		$count++;
	}
}

if(isset($_SESSION['cart']) && !isset($_SESSION['input']))
$_SESSION['input']=array();
$total=0;
$items=0;
$charges=0;
$amount=0;
if(isset($_SESSION['cart'])){
	$cartArray=array();
	$point=0;
	foreach($_SESSION['cart'] as $light){
		$qty=0;
		if(isset($_GET['lid']) && isset($_SESSION['input']) && $_GET['lid']==$light){
			array_push($_SESSION['input'],$_GET['lid']);
		}
		else if(isset($_GET['add']) && $_GET['lid']==$light){
			array($_SESSION['input'],$light);
		}
		else if(isset($_GET['reduce']) && $_GET['reduce']==$light){
			$con=0;
			foreach($_SESSION['input'] as $lig){
				unset($_SESSION['input'][$con]);
				$_SESSION['input']=array_merge($_SESSION['input']);
				break;
			}
			$con++;
		}
		foreach($_SESSION['input'] as $lidput){
			if($lidput==$light){
				$qty++;
			}
		}
		if($qty==0){
			unset($_SESSION['cart'][$point]);
		}
		$sql="Select * from products p,category c where c.cat_id=p.cat_id and product_id=$light";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			$cartArray[]=array('pid'=>$row['product_id'],'proname'=>$row['product_name'],'charges'
				=>$row['service_charges'],
			'price'=>$row['price'],'image'=>$row['image'],'brand'=>$row['brand'],
			'cost'=>$row['price']*$qty,'qty'=>$qty);
			$total+=$row['price']*$qty;
			$items+=$qty;
		}
		$point++;
	}
	
	$_SESSION['values']=$cartArray;
	$_SESSION['total']=$total;
	
}
		
			
		



 if(isset($_GET['search'])){
	$bb=$_GET['search'];
	
	$bb=mysqli_real_escape_string($conn,$bb);
	$bb=stripslashes($bb);
	$bb=htmlentities($bb);
	$bb=strip_tags($bb);
	$str_query="select products.product_id, products.product_name
	,products.price,from products INNER JOIN category ON 
	category.cat_id=products.cat_id where products.cat_id like '%$bb%' or products.product_name like '%$bb%'";
		
} 


if(isset($_GET['cat'])){
$gg=$_GET['cat'];
	$str_query="select products.product_id, products.product_name, 
	category.brand,products.price,images from products INNER JOIN category ON 
	category.cat__id=products.cat_id where products.cat_id='$gg'";
}

else
	
 $str_query="select products.product_id, products.product_name, 
	category.brand,products.price,images from products INNER JOIN category ON 
	category.cat__id=products.cat_id";
	 $result= mysqli_query($conn,$str_query);
 if(isset($prod)){
 	exit();
 }
 $prod=array();

	$row = mysqli_fetch_assoc($result);
	while($row=mysqli_fetch_assoc($result)){
		$prod[]=array('pid'=>$row['product_id'],'proname'=>$row['product_name'],'charges'
				=>$row['service_charges'],
			'price'=>$row['price'],'image'=>$row['image'],'brand'=>$row['brand'],
			'cost'=>$row['price']*$qty,'qty'=>$qty);
			$total+=$row['price']*$qty;
			$items+=$qty;
	}

	

	
	// $result=mysqli_query($conn,$sql);
	// 	while($row=mysqli_fetch_assoc($result)){
	// 		$cartArray[]=array('pid'=>$row['product_id'],'proname'=>$row['product_name'],'charges'
	// 			=>$row['service_charges'],
	// 		'price'=>$row['price'],'image'=>$row['image'],'brand'=>$row['brand'],
	// 		'cost'=>$row['price']*$qty,'qty'=>$qty);
	// 		$total+=$row['price']*$qty;
	// 		$items+=$qty;
	// 	}

	
	

	
if(isset($_REQUEST['shopCart'])){
$template=$twig->loadTemplate('checkout.tpl');
}
else
  	$template=$twig->loadTemplate('products.tpl');
	
$params=array('product'=>$prod,'cart'=>$cartArray,'total'=>$total,'items'=>$items);
$template->display($params);

?>