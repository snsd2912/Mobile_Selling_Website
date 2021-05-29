<?php 
	class DB{
		//ham lay nhieu ban ghi
		public static function fetchAll($sql,$param = NULL){
			$conn = Connection::getInstance();
			$query = NULL;
			if($param == NULL)
				$query = $conn->query($sql);
			else{
				$query = $conn->prepare($sql);
				$query->execute($param);
			}
			return $query->fetchAll();
		}
		//ham lay mot ban ghi
		public static function fetch($sql,$param = NULL){
			$conn = Connection::getInstance();
			$query = NULL;
			if($param == NULL)
				$query = $conn->query($sql);
			else{
				$query = $conn->prepare($sql);
				$query->execute($param);
			}
			return $query->fetch();
		}
		//ham tra ve so luong ban ghi
		public static function rowCount($sql, $param = NULL){
			$conn = Connection::getInstance();
			$query = NULL;
			if($param == NULL)
				$query = $conn->query($sql);
			else{
				$query = $conn->prepare($sql);
				$query->execute($param);
			}
			return $query->rowCount();
		}
		//ham thuc thi cau truy van insert, update, delete
		public static function execute($sql, $param = NULL){
			$conn = Connection::getInstance();
			$query = NULL;
			if($param == NULL){
				$query = $conn->query($sql);
				return $conn->lastInsertId();
			}
			else{
				$query = $conn->prepare($sql);
				$query->execute($param);
				// tra ve id vua moi insert vao 
				return $conn->lastInsertId();
			}
		}
	}
 ?>