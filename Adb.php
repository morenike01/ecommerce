<?php



include_once 'db_config.php';
class Adb extends mysqli
{
    /**
     * Adb constructor.
     */
    public function __construct(){
        parent::__construct(DB_HOST, DB_USER, DB_PWORD, DB_NAME, DB_PORT);
        if (mysqli_connect_error()){
            header('Location: dberror.php');
//            die('Connection Error (' . mysqli_connect_errno() . ') ' .mysqli_connect_error() );
        }
    }
}

?>