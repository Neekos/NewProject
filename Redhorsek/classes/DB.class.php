<?php  
	class DB{
	protected $db_host = 'localhost';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_name = 'my_db';
		//Методо подключения
		public function connect()
		{
			$connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
			mysql_select_db($this->db_name);

			return true;
		}
		//Метод берет объект запроса и конвертирует в ассоциативный массив
		public function processRowSet($rowSet, $singleRow=false){
			$resultArray = array();
			//mysql_fetch_assoc() преобразовывает каждый ряд в массив
			while ($row = mysql_fetch_assoc($rowSet)) {
				array_push($resultArray, $row);
			}

			if ($singleRow === true) {
				return $resultArray[0];

				
			}
			return $resultArray;
		}

		public function select($table, $where){
			$sql = "SELECT * FROM $table WHERE $where";
			$result = mysql_query($sql);
			//возвращает количество рядов результата запроса.
			if (mysql_num_rows($result) == 1) {
				return $this->processRowSet($result, true);
			}
			return $this->processRowSet($result);
		}

		public function update($data, $table, $where){
			foreach ($data as $column => $value) {
				$sql = "UPDATE $table SET $column = $value WHERE $where";
				mysql_query($sql) or die(mysql_error());
			}
			return true;
		}

		public function insert($data, $table){
			$columns = "";
			$values = "";

			foreach ($data as $column => $value) {
				$columns.=($columns == "")? "" : ", ";
				$columns.= $column;
				$values.=($values == "")? "" : ", ";
				$values.= $value;
			}
			$sql = "insert into $table ($columns) values ($values)";
			mysql_query($sql) or die(mysql_error());
			//возвращает ID, сгенерированный колонкой с AUTO_INCREMENT последним запросом INSERT к серверу, на который ссылается переданный функции указатель link_identifier. Если параметр link_identifier не указан, используется последнее открытое соединение.
			return mysql_insert_id();
		}

		public function get_one_db($id){

            $sql = "SELECT id, title, discription FROM price WHERE id= '$id'";

            $res = mysql_query($sql);

            if (!$res) {
                return FALSE;
            }
            $row = mysql_fetch_array($res, MYSQL_ASSOC);

            return $row;
        }
	}
?>