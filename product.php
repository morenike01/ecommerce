<?php
include_once('Adb.php');
	
class product extends Adb
{
	/**
     * @param $sf
     * @param $np
     * @return bool|mysqli_result
     */

	 public function allproduct($sf, $np)
    {
        $query = "SELECT * FROM products p INNER JOIN category c WHERE p.cat_id = c.cat_id LIMIT $sf,$np";
        return $this->query($query);
    }
     public function get_all_products()
    {
        $query = "SELECT * FROM products p INNER JOIN category c WHERE p.cat_id = c.cat_id LIMIT $sf,$np";
        return $this->query($query);
    }

 public function getBrand($brand, $sf, $np)
    {
        $query = "SELECT * FROM products p INNER JOIN category c WHERE p.cat_id = c.cat_id AND c.brand=? LIMIT $sf,$np";
        $g = $this->prepare($query);
        $g->bind_param('p', $brand);
        $g->execute();
        return $g->get_result();
    }

    /**
     * @return int
     */
   

    public function count_product()
    {
        $query = "SELECT * FROM products";
      $r = $this->query($query);
        $no = mysqli_num_rows($r);
        return $no;
    }

public function count_Brand($brand)
    {
        $query = "SELECT count(*) FROM products p INNER JOIN category c WHERE p.cat_id = c.cat_id AND brand='$brand'";
        return $this->query($query);
    }

    public function getproductdetails($id)
    {
        $query = "SELECT * FROM products p INNER JOIN category c WHERE p.cat_id = c.cat_id AND p.product_id = ?";
        $g = $this->prepare($query);
        $g->bind_param('i', $id);
        $g->execute();
        return $g->get_result();
    }

    public function update_product($id, $qty, $nb)
    {
        $query = "UPDATE products SET quantity=?,num_bought=? WHERE product_id=?";
        $g = $this->prepare($query);
        $g->bind_param('iii', $qty, $nb, $id);
        $g->execute();
    }

public function getBrands()
    {
        $query = "SELECT * FROM category";
        return $this->query($query);
    }

    public function search($text)
    {
        $str_query = "SELECT * from products where product_name like'%$text%'";
                
                 if(!$this->query($str_query)){
            return false;
        }
         return $this->query($str_query);
    }
	

	function user($username, $password){
		$str_query = "INSERT into user SET username='$username',password='$password'";
		return $this->query($str_query);
	}

	function get_user($username){
		$str_query="select * from user where username='$username'";
		if(!$this->query($str_query)){
			return false;
		}
		return $this->fetch();
	}

	function register($firstname,$lastname,$country,$phone,$email){
    	$str_query="insert into customer set firstname='$firstname',lastname='$lastname',country='$country',phone='$phone',email='$email'";
    	return $this->query($str_query);
    }


    function shipping($country,$city,$address,$email){
    	$str_query="insert into shipping set country='$country',city='$city',address='$address',email='$email'";
    	return $this->query($str_query);
    }

    function order($id,$name,$brand,$price,$year,$quantity,$cost){
    	$str_query="insert into order set user_id='$id',name='$name',brand='$brand',price='$price',year='$year',quantity='$quantity',cost='$cost'";
    	return $this->query($str_query);
    }

    function get_order(){
		$str_query="select * from orders";
		if(!$this->query($str_query)){
			return false;
		}
		return $this->fetch();
	}

    function updatepassword($username,$password){
		$str_query = "UPDATE user SET username='$username',password='$password' WHERE username='$username'";
		return $this->query($str_query);
	}

}

?>