<?php 
	namespace Libaray\mysql;
	class Dbcon{
		//保存类实例的静态成员变量
		private static $_instance;

		private static $servername = "127.0.0.1";
		private static $username = "root";
		private static $password = "123456";
		private static $dbname = "Libaray";
		public static $conn;
/*
		private static $servername = "127.0.0.1";
		private static $username = "root";
		private static $password = "123456";
		private static $dbname = "Libaray";
		public static $conn;*/

		//private标记的构造方法
		private function __construct(){
			// 创建连接
			self::$conn = new \mysqli(self::$servername, self::$username, self::$password,self::$dbname);
			// 检测连接
			if (self::$conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			self::$conn->query("SET NAMES UTF8");
		}

		//创建__clone方法防止对象被复制克隆
		public function __clone(){
			\trigger_error('Clone is not allow!',E_USER_ERROR);
		}

		//单例方法,用于访问实例的公共的静态方法
		public static function getInstance(){
			if(!(self::$_instance instanceof self)){
				self::$_instance = new self;
			}
			return self::$_instance;
		}

		public function insert($sql){
			if (self::$conn->query($sql) === FALSE) {
			    echo "Error: " .  $conn->error;
			}
		}

		public function query($sql){
			$result = self::$conn->query($sql);
			return $result;
		}

		public function close(){
			self::$conn->close();
		}

		public static function create_guid() {
		    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
		    $hyphen = chr(45);// "-"
		    $uuid = chr(123)// "{"
		    .substr($charid, 0, 8).$hyphen
		    .substr($charid, 8, 4).$hyphen
		    .substr($charid,12, 4).$hyphen
		    .substr($charid,16, 4).$hyphen
		    .substr($charid,20,12)
		    .chr(125);// "}"
		    return substr($uuid,1,36);
		}
	}
	
?>