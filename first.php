<?php
//session_start();
if(isset($_GET['status'])){
		session_unset();
	}

if(isset($_GET['lightid'])){
  
}
 $conn= mysqli_connect("localhost","root","","store");
 $str_query="select products.product_id, products.product_name, 
	category.brand,products.price,image from products INNER JOIN category ON 
	category.cat_id=products.cat_id";
 $result= mysqli_query($conn,$str_query);
 
 $wine=array();
$row = mysqli_fetch_assoc($result);
while($row){
$wine[]=$row;
$row = mysqli_fetch_assoc($result);


}
	
require_once './Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('web');
$twig = new Twig_Environment($loader);
    
echo $twig->render('index.tpl',[
	//'companyName'=> 'CLOTHING HUB',
	'lights'=> $wine
	]);
	//$template->display($params);

?>