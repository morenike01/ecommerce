<?php
// require_once './Twig/Autoloader.php';

session_start();
include_once 'product.php';


$item = new product();

$num_per_page_prod = 9;

if (isset($_REQUEST['prod'])) {
    $prod = $_REQUEST['prod'];
} else {
    $prod = 1;
}

$sf_prod = ($prod - 1) * $num_per_page_prod;

$products = $item->allproduct($sf_prod, $num_per_page_prod);

$total_num_rows_prod = $item->count_product();
// echo $total_num_rows_products['product_id'];
$total_products = $total_num_rows_prod['product_id'];

$total_pages_prod = ceil($total_num_rows_prod / $num_per_page_prod);

$po = $products->fetch_all(MYSQLI_ASSOC);

$allProducts['products'] = $po;


//get all products from db
$str_query="select * from products";


// after query add all products to this array
// $prods = new array();
// // 
    
// echo $twig->render('index.tpl',[
// 	//'companyName'=> 'CLOTHING HUB',
// 	'lights'=> $wine
// 	]);
// Twig_Autoloader::register();

// $loader = new Twig_Loader_Filesystem('web');
// $twig = new Twig_Environment($loader);

// echo $twig->render('products.tpl', [

//     'products' => $po,
//     'prod' => $prod,
//     'total_pages_prod' => $total_pages_prod,
// ]);


require_once './Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./web');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('products.tpl');
$data = array();

$params = array('random' => $data, 'products' => $po,
    'prod' => $prod,
    'total_pages_prod' => $total_pages_prod, 'prods' => $prod);
$template->display($params);
?>
