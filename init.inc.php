<?php
define("DB_HOST", 'localhost');
define("DB_NAME", 'ashesics_margaret_ayodele');
define("DB_PORT", 3306);
define("DB_USER", "ashesics_amm4002");
define("DB_PWORD", "89lgfy3a9glf");

mysqli_connect(DB_HOST, DB_USER, DB_PWORD, DB_NAME);




// if (!$link) {
//     echo "Error: Unable to connect to MySQL." . PHP_EOL;
//     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//     exit;
// }

// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);


include("error_logging.inc.php");
set_error_handler("log_error",E_ALL);


?>