<?php

	session_start();


	require_once'/Twig/Autoloader.php';
	Twig_Autoloader::register();

	$loader=new Twig_Loader_Filesystem('web');
	$twig=new Twig_Environment($loader);

	define("DB_HOST", 'localhost');
	define("DB_NAME", 'ashesics_margaret_ayodele');
	define("DB_PORT", 3306);
	define("DB_USER", "ashesics_amm4002");
	define("DB_PWORD", "89lgfy3a9glf");

	$mySQLi=mysqli_connect(DB_HOST, DB_USER, DB_PWORD, DB_NAME);

	if(mysqli_connect_errno()){

		printf("Connection has Failed: %s\n", mysqli_connect_error());
		exit();
	}

	if(!isset($_SESSION['array']))
		$_SESSION['array']=array();

	if(isset($_GET['empty_cart'])){
		session_destroy();
		header('location: newpage.php');
	}

	if(!isset($_SESSION['qty_count'])){
		$_SESSION['qty_count']=array();
	}

	/**
	 * Checks whether the wine already exist in the Shopping Cart
	 * If the wine exists, the code prevents a new row from being inserted in the new 
	 */
	if(isset($_GET['wineID'])){
		$ii=0;
		foreach ($_SESSION['array'] as $key) {
			if($key==$_GET['wineID'])
				$ii++;
		}
		if($ii==0)
		array_push($_SESSION['array'], $_GET['wineID']);
	}
	
	
	/**
	 * Gets the ID of the wine you want to delete
	 * Use the ID of the wine to delete the wine from the Cart
	 * Merge the array in order to fill the empty index of the deleted item
	 */	
	if(isset($_GET['delete'])){
		$count = 0;
		foreach ($_SESSION['array'] as $main){
			if($main==$_GET['delete']){
				unset($_SESSION['array'][$count]);
				$_SESSION['array']=array_merge($_SESSION['array']);
			}

			$count++;
		}
	}
	
	/**
	 * The below code uses mySQLi to connect to the wine database
	 * Also the code checks whether the session variable is set and if a wine has be selected 
	 */
	$total=0;
	if(isset($_SESSION['array'])){
		$shoppingCart = array();
		foreach ($_SESSION['array'] as $main){
			$qty_variable = 0;
			/**
			 *Restricts a wine from be inserted into the cart through a new row 
			 *Prevents a new row being inserted in the card once the wine already exist
			 */
			if(isset($_SESSION['qty_count']) && isset($_SESSION['wineID']) && $_GET['wineID']==$main)
				array_push($_SESSION['qty_count'], $_GET['wineID']);

			else if(isset($_GET['add_qty']) && $_GET['add_qty'] == $main){
				
				array_push($_SESSION['qty_count'], $main);
			}
			else if(isset($_SESSION['qty_count']) && isset($_GET['wineID']) && $_GET['wineID'] == $main)

				array_push($_SESSION['qty_count'], $_GET['wineID']);
			else if(isset($_GET['reduce_qty']) && $_GET['reduce_qty']==$main){

				//Reduce the quantity of wine in the cart
				$ll=0;
				foreach ($_SESSION['qty_count'] as $key) {
					if($key==$_GET['reduce_qty']){
						unset($_SESSION['qty_count'][$ll]);
						$_SESSION['qty_count']= array_merge($_SESSION['qty_count']);
						break;
					}
					$ll++;
				}
				
			}
				// print_r($_SESSION['qty_count']);

				foreach ($_SESSION['qty_count'] as $counter){
					if($counter == $main){
						$qty_variable++;
					}
				}
			
			
		
	

	$str_query = "SELECT * FROM products, category where products.cat_id=category.cat_id and products.product_id='$main' ORDER BY products.product_id";

	$myResult= mysqli_query($mySQLi, $str_query);

	// if($myResult){
		while($myRow=mysqli_fetch_assoc($myResult)){
			$shoppingCart[]=array('wineID'=>$myRow['product_id'], 
				'name'=>$myRow['product_name'], 
				'charges'=>$myRow['service_charges'], 'price'=>$myRow['price'],
				 'quantity'=>$myRow['quantity'], 'quantity'=>$qty_variable,
				 'cost'=>$qty_variable*$myRow['cost']);
			$total+=$qty_variable*$myRow['cost'];
		}
	// }

}

if(isset($_REQUEST['add_qty'])){
	header("location: reload.php??add=1");

}

elseif(isset($_REQUEST['addD'])){
	header("location: reload.php??addD=1");

}
}



	if (isset($_GET['pageno'])) {
   		$pageno = $_GET['pageno'];
	} 

	else {
   		$pageno = 1;
	} 


	$query = "SELECT count(*) FROM products";
	$result = mysqli_query($mySQLi, $query) or die("error");//trigger_error("SQL", E_USER_ERROR);
	$query_data = mysqli_fetch_row($result);
	$numrows = $query_data[0];

	//3
	$rows_per_page = 9;
	$lastpage      = ceil($numrows/$rows_per_page);


	//4
	$pageno = (int)$pageno;

	if ($pageno > $lastpage) {
   		$pageno = $lastpage;
	} // if

	if ($pageno < 1) {
  		 $pageno = 1;
	} // if


	//5
	$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

	$myQuery = "SELECT * FROM products, category where 
	products.cat_id=categeory.cat_id $limit";
	$myResult=mysqli_query($mySQLi, $myQuery);

	if($myResult){

		$myArray=array();
		while($myRow=mysqli_fetch_assoc($myResult)){
			$myArray[]=array('wineID'=>$myRow['product_id'], 
				'name'=>$myRow['product_name'], 
				'charges'=>$myRow['service_charges'], 'price'=>$myRow['price'],
				 'quantity'=>$myRow['quantity'], 'quantity'=>$qty_variable,
				 'cost'=>$qty_variable*$myRow['cost']);
			$total+=$qty_variable*$myRow['cost'];
		}
	}

	

	mysqli_free_result($myResult);

	$myTemplate=$twig->loadTemplate('furniture.tpl');
		$prev=0;
	

	if ($pageno == 1){
   		$first= " FIRST PREV ";
	} 
	else{
   		$first=1;
   		$prevpage = $pageno-1;
   		$prev=$prevpage;
	} // if

	$pp= " ( Page $pageno of $lastpage ) ";

	if ($pageno == $lastpage){
   	echo " NEXT LAST ";
	} 
	else{
   		$nextpage = $pageno+1;
   		$next=$nextpage;
   		$last=$lastpage;
	 } 
	$myParams=array('myWine'=>$myArray, 
		            // 'tableCaption'=>'ALLURE SKIN CLINIQUES AND SPA',
		           
				    // 'aTitle'=>'Nike Template',
				    // 'websiteName'=>'GOLDY Ltd. Website',
				    // 'secondName'=>'Reach Us',
				    'first'=>$first,
				    'prev'=>$prev,
				    'next'=>$next,
				    'last'=>$last,
				    'paging'=>$pp,
				    'pno'=>$pageno,
				    'cartWine'=>$shoppingCart,
				    'total'=>'Total',
				    'theCart'=>'Skin Products in Cart',
				    'total'=>$total);
	$myTemplate->display($myParams);

	

	//unset($_SESSION['empty_cart']);
?>