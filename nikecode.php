



<?php
//include_once("adb1.php");

include_once("product.php");
$obj = new product();


	if(isset($_GET['pageno'])){
	$pageno = $_GET['pageno'];
	} else {
    $pageno = 1;
}
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWORD,DB_NAME);
$rows_per_page = 9;
$sql_query=mysqli_query($conn,"SELECT * from product");
$num_rows=mysqli_num_rows($sql_query);


$last_page=ceil($num_rows/$rows_per_page);
$prev_page=$pageno-1;
$next_page=$pageno+1;
$pageno = (int)$pageno;

if ($pageno > $last_page) {
    $pageno = $last_page;
}

if ($pageno < 1) {
    $pageno = 1;
}
$limit = "LIMIT " . ($pageno - 1) * $rows_per_page . "," . $rows_per_page;
$query= "SELECT products.product_id, products.product_name, products.price, 
products.servic_charges,
category.brand from products left join icategory on 
products.cat_id=category.cat_id order by product.cat_id $limit";

// print_r($query);

$stmt = mysqli_prepare($conn, $query);
if ($stmt === FALSE) {
    echo
    'Wrong SQL :: ' . $query . 'Error:' . $conn->error;
}
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $name, $price, $quantity, $image, $charges);
$data = array();
while (mysqli_stmt_fetch($stmt)) {
    $data[] = array('product_id' => $id, 'product_name' => $name, 
    	'price' => $price, 'quantity' => $quantity, 'image' => $image, 
    	'service_charges' => $charges);
}

$stmt->close();
mysqli_close($conn);

$search="";

if(isset($_GET['search'])){
	 if (empty($_GET['search'])) {
       echo "put in a value";
    }
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWORD,DB_NAME);
	$newobj=new product();


	$search=$_GET['search'];
	print_r($search);


	 $search=mysqli_real_escape_string($conn,$search);
	$search=stripslashes($search);
	$search=htmlentities($search);
	$search=strip_tags($search);  
	
	$newquery="SELECT 
	products.product_id =?, 
	products.products_name =?, 
	products.price =?,
	 products.image =?, 
	 products.service_charges =?, 
	 products.quantity =?";

	 $stmt = mysqli_prepare($conn, $newquery);
if ($stmt === FALSE) {
    echo
    'Wrong SQL :: ' . $newquery . 'Error:' . $conn->error;
}
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $name, $price, $quantity, $image, $charges);
$data = array();
while (mysqli_stmt_fetch($stmt)) {
    $data[] = array('product_id' => $id, 'product_name' => $name, 
    	'price' => $price, 'quantity' => $quantity, 'image' => $image, 
    	'service_charges' => $charges);
}

$stmt->close();
mysqli_close($conn);
	
	
}

if(isset($_GET['name'])){
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWORD,DB_NAME);
	$newobj=new product();
	$brand=$_GET['name'];
	

	$newquery="SELECT products.product_id, products.products_name, products.price,
	 products.image, products.service_charges, products.quantity
			 	 from product where product.prduct_name = '$name'";
	 $stmt = mysqli_prepare($conn, $newquery);
if ($stmt === FALSE) {
    echo
    'Wrong SQL :: ' . $query . 'Error:' . $conn->error;
}
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $name, $price, $image, $color, $brand);
$data = array();
while (mysqli_stmt_fetch($stmt)) {
    $data[] = array('product_id' => $id, 'product_name' => $name, 
    	'price' => $price, 'quantity' => $quantity, 'image' => $image, 
    	'service_charges' => $charges);
}

$stmt->close();
mysqli_close($conn);
	
	
}
$con1 = mysqli_connect(DB_HOST,DB_USER,DB_PWORD,DB_NAME);
$newobj1=new nike1();
$brandquery="SELECT distinct product.product_name from product";
 $stmt = mysqli_prepare($con1, $brandquery);
if ($stmt === FALSE) {
    echo
    'Wrong SQL :: ' . $query . 'Error:' . $con1->error;
}
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$name);
$newdata = array();
while (mysqli_stmt_fetch($stmt)) {
    $newdata[] = array('product_id' => $id,'product_name' => $name);
}

$stmt->close();
mysqli_close($con1);


require_once './Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./web');
$twig = new Twig_Environment($loader);
$template=$twig->loadTemplate('products.tpl'); 
// $template=$twig->loadTemplate('checkout.tpl'); 
$params=array('values'=>$data,
	'newvalues'=>$newdata,
	'pageno'=>$pageno,
	'lastpage'=>$last_page,
	'ME'=>$search);
$template->display($params);
?>