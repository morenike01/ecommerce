<?php
include_once("adb.php");
include_once ("cerror.php");
include_once("product.php");

// if(isset($text)){
// 	exit();
// // }

if(isset($_REQUEST['text'])){
	$text = $_GET['text'];
	//echo $name;

	$obj = new product();
	$result =$obj-> search($text);

echo "<table><center>";
	echo "<table>";
	echo "<table width=20%  height=70% cellspacing=5 cellpadding=5>";
	

	while($row=$obj->fetch()){
		echo   "<tr>
			<td>{$row['product_name']}</td>
			<td>"?><img src="<?php echo $row['image'];?>" style="height:200px;width:150px"><?php echo "</td>
			<td>{$row['price']}</td>
									
		</tr>";
		$row = $obj->fetch();
	}
	echo "</table></centre>";
}
else{
	echo "no set";
}

?>
