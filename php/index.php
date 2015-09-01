<?php
	use Libaray\mysql\Dbcon;
    include '../php/mysql.php';
    switch ($_GET["fun"]) {
        case 'list':
            $dbcon = Dbcon::getInstance();  
            $sql = "select * from students ";                         
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
            break;
        
        default:
            break;
    }
?>