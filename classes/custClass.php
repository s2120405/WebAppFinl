<?php
//makes a connection the the database - Customer Class
class Customers{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test3';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}

	//function that creates a new customer
	public function new_Customer($cfname,$clname,$caddress,$ctype,$cnumb){
		
		$data = [
			[$cfname,$clname,$caddress,$ctype,$cnumb],
		];
		$stmt = $this->conn->prepare("INSERT INTO customers (cust_fname,cust_lname,cust_add,cust_type,cust_num) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
		}

		//function that updates an event type
		public function update_Customer($cfname,$clname,$caddress,$ctype,$cnumb, $id){
		

			$sql = "UPDATE customers SET cust_fname=:cust_fname,cust_lname=:cust_lname,cust_add=:cust_add,cust_type=:cust_type,cust_num=:cust_num WHERE cust_id=:cust_id";
	
			$q = $this->conn->prepare($sql);
			$q->execute(array(':cust_fname'=>$cfname, ':cust_lname'=>$clname,':cust_add'=>$caddress, ':cust_type'=>$ctype,':cust_num'=>$cnumb, ':cust_id'=>$id));
			return true;
		}
	
	


	// function that lists the events in the Events page
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


	// function that gets the event id
    function get_Cust_id($id){
		$sql="SELECT cust_id FROM customers WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_id = $q->fetchColumn();
		return $cust_id;
	}

	// function that gets the venue
    function get_Fname($id){
		$sql="SELECT cust_fname FROM customers WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cfname = $q->fetchColumn();
		return $cfname;
	}

	// function that gets the venue
    function get_Lname($id){
		$sql="SELECT cust_lname FROM customers WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$clname = $q->fetchColumn();
		return $clname;
	}

	// function that gets the venue
    function get_address($id){
		$sql="SELECT cust_add FROM customers WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$caddress = $q->fetchColumn();
		return $caddress;
	}
	// function that gets the venue
    function get_type($id){
		$sql="SELECT cust_type FROM customers WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$ctype = $q->fetchColumn();
		return $ctype;
	}
	// function that gets the venue
    function get_Num($id){
		$sql="SELECT cust_num FROM customers WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cnumb = $q->fetchColumn();
		return $cnumb;
	}
	
}