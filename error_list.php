<?php

include('init.inc.php');

?>



<html>
<head>
<meta http-equi="Content-type" content="text/html; charset=utf-8"/>

<style type="text/css"
body {font-family: sans-serif; font-size: 14px;}
span.type { color: #900; font-weight: bold;}
span.string, span.file, span.line{color: #600;}
</style>
<title></title>
</head>
<body>
	<div>
		<?php

		foreach [fetch_errors() as error]{
			?>

			<p>
    <span class="type"> <?php echo error_constant_to_name
    ($error['error_type']);
    ?></span>
    <span class="string"><?php echo $error['error_spring'];?></span>
    <span class="file"><?php echo $error['error_file'];?></span>
    <span class="line"><?php echo $error['error_line'];?></span>
   
			</p>
			<?php
}


		?>
	</div>
</body>
</html> 