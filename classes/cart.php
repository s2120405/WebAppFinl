<?php
//makes a connection the the database - Transac Class
class Cart{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test3';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	//function that creates a new transaction
	public function new_cart($cust_id, $date_rt){
		

		$data = [
			[ $cust_id, $date_rt],
		];
		$stmt = $this->conn->prepare("INSERT INTO cart (cust_id, date_rt) VALUES (?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function list_cart(){
		$sql="SELECT * FROM cart";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

   
	function get_Customer_cart($id){
		$sql="SELECT cust_id FROM cart WHERE cart_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_id = $q->fetchColumn();
		return $cust_id;
	}

	function get_Customer_date($id){
		$sql="SELECT date_rt FROM cart WHERE cart_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$date_rt = $q->fetchColumn();
		return $date_rt;
	}

	function get_Customer_save($id){
		$sql="SELECT cart_saved FROM cart WHERE cart_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cart_saved = $q->fetchColumn();
		return $cart_saved;
	}

	public function list_Customer_inventory($id){
		$sql="SELECT * FROM cart_inv WHERE cart_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	function get_Lname($id){
		$sql="SELECT cust_lname FROM customers WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$clname = $q->fetchColumn();
		return $clname;
	}


	public function new_cart_item($cart_id,$rental_id,$cust_qty){
		
		$data = [
			[$cart_id,$rental_id,$cust_qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO cart_inv(cart_id, rental_id, cust_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	public function save_cart_items($id){
		
		$status = 1;
		$sql = "UPDATE cart SET cart_saved=:cart_saved WHERE cart_id=$id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':cart_saved'=>$status));
		return true;
	}

	public function save_to_inventory($id){
		$sql="SELECT * FROM cart_inv WHERE cart_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO cart_rental_inv(cart_id, rental_id, cust_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($cart_id,$rental_id,$cust_qty));
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}


	//function that lists the transactions
	public function list_transac(){
		$sql="SELECT * FROM rental_transac";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}

	//function that lists the rental items
	public function list_rental(){
		$sql="SELECT * FROM rentals";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}

public function list_Customers(){
	$sql="SELECT * FROM customers";
	$q = $this->conn->query($sql) or die("failed!");
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$data[]=$r;
	}
	if(empty($data)){
	   return false;
	}else{
		return $data;	
	}
}


	//function that gets the transaction ID
	function get_Transac_id($id){
	$sql="SELECT trans_id FROM rental_transac WHERE trans_id = :id";	
	$q = $this->conn->prepare($sql);
	$q->execute(['id' => $id]);
	$trans_id = $q->fetchColumn();
	return $trans_id;
}

	//function that gets the transactions customer name
    function get_Transac_cust($id){
		$sql="SELECT cust_name FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_name = $q->fetchColumn();
		return $cust_name;
	}

	//function that gets the transactions customer contact no.
    function get_custno($id){
		$sql="SELECT cust_no FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_no = $q->fetchColumn();
		return $cust_no;
	}
/*
	function get_Transac_depo($id){
		$sql="SELECT cash_depo FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cash_depo = $q->fetchColumn();
		return $cash_depo;
	} */

	//function that gets the rental item's ID
	function get_rental_items($id){
		$sql="SELECT rental_id FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rental_id = $q->fetchColumn();
		return $rental_id;
	}


	//function that gets the rental item's name
	function get_item_name($id){
		$sql="SELECT item_name FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$item_name = $q->fetchColumn();
		return $item_name;
	}

	//function that gets the quantity of the customer's ordered items
	function get_cust_qty($id){
		$sql="SELECT cust_qty FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_qty = $q->fetchColumn();
		return $cust_qty;
	}

	//function that gets the rental item's price
	function get_price($id){
		$sql="SELECT rent_price  FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_price = $q->fetchColumn();
		return $rent_price;
	}

	function get_Cust_id($id){
		$sql="SELECT cust_id FROM customers WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_id = $q->fetchColumn();
		return $cust_id;
	}

	function get_cart_inv_id($id){
		$sql="SELECT cart_inv_id FROM cart_inv WHERE cart_inv_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cart_inv_id = $q->fetchColumn();
		return $cart_inv_id;
	}


	



//function for multiplying the price and the quantity from the rentals table and rental_transac table
function get_multiply($id){
    // Join the rentals and transactions tables on their respective ID fields
    $sql = "SELECT r.rent_price, t.cust_qty
            FROM rentals r
            INNER JOIN cart_inv t ON r.rental_id = t.rental_id
            WHERE t.cart_inv_id = :id";
    $query = $this->conn->prepare($sql);
    $query->execute(['id' => $id]);
    $result = $query->fetch();

 if (!$result) {
        return false; 
    }

    // Multiply the rental price with the value from the transactions table
    $transaction_price = $result['rent_price'] * $result['cust_qty'];

    return $transaction_price;
}

}
