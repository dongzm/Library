<?php
	namespace Libaray\books;
	include 'mysql.php';
	use Libaray\mysql\Dbcon as Dbcon;

	switch ($_GET["fun"]) {
		case 'list':
			queryList();
			break;

		case 'detail':
			detail();
			break;
		
default:
	echo "找不到方法";
			break;
	}

	function queryList(){
		$dbcon = Dbcon::getInstance();
		$sql = "SELECT * FROM books order by rank ";
		$result = $dbcon->query($sql);

		if ($result->num_rows > 0) {
			$arr = array();
		    // 输出每行数据	    
		    while($row = $result->fetch_assoc()) {
		    	$arr[] = $row;
		    }
		    echo json_encode($arr);
		} else {
		    echo "";
		}

		$dbcon->close();
	}

	function detail(){
		$id = $_GET["id"];
		$dbcon = Dbcon::getInstance();
		$sql = "SELECT * FROM books";
		if (!empty($id)) {
			$sql .= " where id = '$id' ";
		}
		$sql .= " order by rank  ";
		$result = $dbcon->query($sql);

		if ($result->num_rows > 0) {
		    // 输出每行数据	    
		    while($row = $result->fetch_assoc()) {
		    	echo json_encode($row);
		    	break;
		    }
		    
		} else {
		    echo "";
		}

		$dbcon->close();
	}

	

	
	
?>