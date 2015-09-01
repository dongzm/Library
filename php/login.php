<?php 
	use Libaray\mysql\Dbcon;
	include 'mysql.php';
	$data = array();


	$Dbcon = Dbcon::getInstance();
	$stmt = Dbcon::$conn->prepare("select * from users where username=? and pwd=?");
	$stmt->bind_param("ss",$userName,$password);
	$userName = $_POST["userName"];
	$password = md5($_POST["password"]);
	$stmt->execute();
	$stmt->store_result();
	$stmt->data_seek(2); 
	$rows = $stmt->num_rows;
	$stmt->free_result();
	$stmt->close();
	$Dbcon->close();

	if ($rows === 0) {
		$data["success"] = false;
		$data["message"] = "userName no exit!";
	}else{
		$data["success"] = true;
		$data["message"] = "Success!";
		//登录成功  
	    session_start();  
	    $_SESSION['userName'] = $userName;  
	}
	echo json_encode($data);
?>