<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}


//Display All
	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}



	public function displayAllWithOr($user_id)
	{
		$query = "SELECT * FROM chat where sender='$user_id' or reciever='$user_id ' order by id desc";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}



		public function displayAllWithOr2($user_id,$doc_id)
	{
		$query = "SELECT * FROM chat where (sender='$user_id' AND reciever='$doc_id ') OR (sender='$doc_id' AND reciever='$user_id ') order by id desc";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}


	//Display with Order


	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}


	public function displayAllWithOrder2($table,$user,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE user_id='$user' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}



		public function displayAllWithOrder3($table,$user,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE user_id='$user' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}



	public function displayUser2($v1,$v2)
	{
		
		$query = "SELECT * FROM user where id='$v1' or id='$v2' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}





	//Display with Limit
	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}


	//Display Specific
	public function displayOne($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM $table where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


	public function displayUser($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM user where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


	public function displayUser3($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}




	public function displayLoginUser($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}

	public function displayIdByEMail($table,$email)
	{
		$query = "SELECT id FROM {$table} where email='$email' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['id'];
		}else{
			return 0;
		}
	}



public function displayEmailById($table,$id)
	{
		$query = "SELECT email FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['email'];
		}else{
			return 0;
		}
	}


		public function displayChargeById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['charge'];
		}else{
			return 0;
		}
	}


	public function displayNameById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return 0;
		}
	}



	
//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM $table");
		return $q->num_rows;
	}


	public function countAllById($table,$id)
	{
		$q=$this->con->query("SELECT id FROM $table where sender='$id' or reciever='$id' ");
		return $q->num_rows;
	}

	public function countAllById2($table,$id)
	{
		$q=$this->con->query("SELECT id FROM $table where (sender='$id' or reciever='$id') AND status='0' ");
		return $q->num_rows;
	}

	public function countAllById22($table,$id)
	{
		$q=$this->con->query("SELECT id FROM $table where (sender='$id' or reciever='$id') AND status2='0' ");
		return $q->num_rows;
	}

	public function countAllById3($table,$item,$value)
	{
		$q=$this->con->query("SELECT id FROM $table where $item='$value'");
		return $q->num_rows;
	}


	public function countAllById4($table,$item,$value,$item2,$value2)
	{
		$q=$this->con->query("SELECT id FROM $table where $item='$value' AND $item2='$value2'");
		return $q->num_rows;
	}

	public function countAllById5($user_id,$doc_id)
	{
		$q = $this->con->query("SELECT id FROM chat where (sender='$user_id' AND reciever='$doc_id ' AND status='0') OR (sender='$doc_id' AND reciever='$user_id' AND status='0')");
		return $q->num_rows;
	}


	public function countAllById6($user_id,$doc_id)
	{
		$q = $this->con->query("SELECT id FROM chat where (sender='$user_id' AND reciever='$doc_id ' AND status2='0') OR (sender='$doc_id' AND reciever='$user_id' AND status2='0')");
		return $q->num_rows;
	}

	public function countAllById66($user_id,$doc_id)
	{
		$q = $this->con->query("SELECT id FROM chat where (sender='$user_id' AND reciever='$doc_id ') OR (sender='$doc_id' AND reciever='$user_id')");
		return $q->num_rows;
	}



	public function countAllComplain($table,$id)
	{
		$q=$this->con->query("SELECT sender FROM $table where sender='$id' ");
		return $q->num_rows;
	}



//Counting Specific
	
	
// Inserting

	public function insertChat($post)
	{
		$msg = $this->cleanse($post['message']);
		$id= $this->cleanse($post['id']);
		$doctor_id= $this->cleanse($post['doctor_id']);
		$id2= $this->cleanse($post['id2']);

		$query="INSERT INTO chat(user_type,sender,reciever,message) VALUES('doctor','$doctor_id','$id','$msg')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:reply.php?id=$id2&msg=Data was successfully inserted&type=success");
		}else{
			header("Location:reply.php?id=$id2&msg=Error adding data try again!&type=error");
		}
	}



		public function insertChat2($post)
	{
		$msg = $this->cleanse($post['message']);
		$id= $this->cleanse($post['id']);
		$user_id= $this->cleanse($post['user_id']);
		$id2= $this->cleanse($post['id2']);

		$query="INSERT INTO chat(user_type,sender,reciever,message) VALUES('user','$user_id','$id','$msg')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:reply.php?id=$id2&msg=Data was successfully inserted&type=success");
		}else{
			header("Location:reply.php?id=$id2&msg=Error adding data try again!&type=error");
		}
	}






	public function insertNewUser($post)
	{
		$name=$this->cleanse($post['name']);
		$address=$this->cleanse($post['address']);
		$gender=$this->cleanse($post['gender']);
		$phone=$this->cleanse($post['phone']);
		$email=$this->cleanse($post['email']);
		$password=$this->cleanse($post['password']);
		$date=date("d-m-y @ g:i A");
		$query="insert into user(fullname,address,gender,phone,email,password,date_created) values('$name','$address','$gender','$phone','$email','$password','$date')";
		$query2="insert into login(name,email,password,role) values('$name','$email','$password',3)";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:login.php?msg=User account was created successfully, Please login...&type=success");
			$this->con->query($query2);
		}else{
			header("Location:login.php?msg=Error adding data try again!&type=error");
		}
	}



		public function addDoctor($post)
	{

		$name = $this->cleanse($post['name']);
		$email = $this->cleanse($post['email']);
		$phone = $this->cleanse($post['phone']);
		$address = $this->cleanse($post['address']);
		$password = $this->cleanse($post['password']);
		$gender = strtolower($this->cleanse($post['gender']));
		$specialization = $this->cleanse($post['specialization']);
		$role='2';



		$query="INSERT INTO doctor(name,email,phone,address,password,gender,specialization) VALUES('$name','$email','$phone','$address','$password','$gender','$specialization')";
		$query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','$role')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			$this->con->query($query2);
			header("Location:view-doctor.php?msg=Doctor was created successfully&type=success");
		}else{
			header("Location:view-doctor.php?msg=Error adding data try again!&type=error");
		}
	}




	public function addSpecialization($post)
	{
		$name = strtoupper($this->cleanse($post['name']));

		$query="INSERT INTO specialization(name) VALUES('$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-specialization.php?msg=Specialization was created successfully&type=success");
		}else{
			header("Location:view-specialization.php?msg=Error adding data try again!&type=error");
		}
	}





//Delete Items
	public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM $table WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}


	public function deleteAll($id, $table,$url) 
	{ 
		$email= $this->cleanse($id);
		$query = "DELETE FROM $table WHERE email = '$email' ";
		$query2 = "DELETE FROM login WHERE email = '$email' ";

		$result = $this->con->query($query);

		if ($result == true) {
			$this->con->query($query2);
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}





	//Delete Items
	public function deleteTwoTable($email,$table,$table2,$url) 
	{ 
		$email = $this->cleanse($email);
		$query = "DELETE FROM {$table} WHERE email= '$email'";
		$query2 = "DELETE FROM {$table2} WHERE email= '$email'";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
			$this->con->query($query2);
		} else {
			header("Location:$url?msg=Error deleting Data&type=error");
		}
	}


	public function deleteThreeTable($email,$table,$table2,$url) 
	{ 
		$email = $this->cleanse($email);
		$query = "DELETE FROM {$table} WHERE email= '$email'";
		$query2 = "DELETE FROM {$table2} WHERE email= '$email'";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
			$this->con->query($query2);
		} else {
			header("Location:$url?msg=Error deleting Data&type=error");
		}
	}


	public function updateAdmin($post)
	{
		
		$email=$this->cleanse($post['email']);
		$password=$this->cleanse($post['password']);
		$query="UPDATE login SET password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}


	public function updateUser($post)
	{
		
		$email=$this->cleanse($post['email']);
		$password=$this->cleanse($post['password']);
		$query="UPDATE login SET password='$password' WHERE email='$email' ";
		$query2="UPDATE user SET password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			$this->con->query($query2);
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}



	public function updateWasteInfoPay($value,$url)
	{
		$check=$this->displayOne('waste_info',$value);
		$pay=$check['payment_status'];
		if ($pay === '0') {
			$query="UPDATE waste_info SET payment_status='1' WHERE id='$value' ";
		} else {
			$query="UPDATE waste_info SET payment_status='0' WHERE id='$value' ";
		}

		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:$url?msg=Payment was updated successfully&type=success");
		}else{
			header("Location:$url?msg=Error updating account try again!&type=error");
		}
	}
	

	public function updateWasteInfoDelivery($value,$url)
	{
		$check=$this->displayOne('waste_info',$value);
		
		$delivery=$check['delivery_status'];
		if ($delivery === '0') {
			$query="UPDATE waste_info SET delivery_status='1' WHERE id='$value' ";
		} else {
			$query="UPDATE waste_info SET delivery_status='0' WHERE id='$value' ";
		}

		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:$url?msg=Delivery was updated successfully&type=success");
		}else{
			header("Location:$url?msg=Error updating account try again!&type=error");
		}
	}

	public function updateStatus($user_id,$doc_id)
	{
	$this->con->query("UPDATE chat SET status='1' WHERE (sender='$user_id' AND reciever='$doc_id ' AND status='0') OR (sender='$doc_id' AND reciever='$user_id' AND status='0') ");
	}

	public function updateStatus2($user_id,$doc_id)
	{
	$this->con->query("UPDATE chat SET status2='1' WHERE (sender='$user_id' AND reciever='$doc_id ' AND status2='0') OR (sender='$doc_id' AND reciever='$user_id' AND status2='0') ");
	}


	//Search
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return false;
		}
	}


//Mailing Function
	public function mailing($post)
	{
		$name=$this->cleanse($post['name']);
		$email=$this->cleanse($post['email']);
		$phone=$this->cleanse($post['phone']);
		$subject=$this->cleanse($post['subject']);
		$text=$this->cleanse($post['message']);

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "From: " . $email . "\r\n"; // Sender's E-mail  ---charset=iso-8859-1
		$headers .= 'Content-type: text/html; charset=utf8_encode' . "\r\n";

		$message ='<table style="width:100%">
		<tr>
		<td>'.$name.'  '.$subject.'</td>
		</tr>
		<tr><td>Email: '.$email.'</td></tr>
		<tr><td>phone: '.$subject.'</td></tr>
		<tr><td>Text: '.$text.'</td></tr>

		</table>';
		$to='support@dilproperty.com';

		if (@mail($to, $subject, $message, $headers))
		{
			header("Location:contact.php?msg=Your message has been sent, we will contact you in a moment&type=success");
		}else{
			header("Location:contact.php?msg=message failed sending, please try again later!&type=error");
		}

	}



	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}
	}


}

?>

