<?php
    class conection
    {
    	private $conn;
    	private $user="vuira";
		private $pwd="CvBJFxb2GNbhYLZC";
		private $host="localhost";
		private $dataBase="natural7_vuira";

		public function conect()
		{
			$this->conn = new mysqli($this->host,$this->user,$this->pwd,$this->dataBase);
			if ($this->conn->connect_error)
			{
    			die("Connection failed: " . $this->conn->connect_error);
				error_log("Connection failed: " . $this->conn->connect_error);
			}
			$acentos = $this->conn->query("SET NAMES 'utf8'");
		}

		public function executeQuerry($sql)
		{
			$this->conect();
			$data =  array();
			if(!$result = $this->conn->query($sql))
			{
				printf("Mysql Error: %s\n", $this->conn->error);
				$this->conn->close();
				return $data;
			}

			if ($result->num_rows > 0)
			{
				$i=0;
    			while($row = $result->fetch_object())
    			{
        			$data[$i]=$row;
					$i++;
				}
    		}
			$result->close();
			$this->conn->close();

			return $data;
		}
		public function sqlOperations ($sql)
		{
			$this->conect();
			if ($this->conn->multi_query($sql) === TRUE)
			{
    			$lastId = $this->conn->insert_id;
			}
			else
			{
    			echo "Error: " . $sql . "<br>" . $this->conn->error;
			}
			return $lastId;
		}
    }
?>
