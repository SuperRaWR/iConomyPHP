<?php

class iAccount{
	private $name, $nameEscaped, $dbhost, $dbuser, $dbpass, $dbname, $dbtable, $db;


	public function __construct ($mcname) { 


		//Fill out database information here.
		$this->dbhost = 'localhost';
		$this->dbuser = 'root';
		$this->dbpass = '';
		$this->dbname = 'minecraft';
		$this->dbtable = 'iconomy';
		//You shouldn't need to edit below.

		$this->db = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

		if ($this->hasIconomyAccount($mcname)) {			
			$this->name = $mcname;
			$this->nameEscaped = $this->db->real_escape_string($mcname);
		} else {
			die('There is no iconomy account named '.$mcname);
		}
		
	}

	public function give ($amount) {
		$amt = $this->balance() + $amount;
		$this->set($amt);
	}
	public function take ($amount) {
		$amt = $this->balance() - $amount;
		$this->set($amt);
	}

	public function set ($amount) {
		$this->db->query('UPDATE `'.$this->dbtable.'` SET `balance` = \''.$amount.'\' WHERE `username` = \''.$this->nameEscaped.'\';');
	}


	public function balance () {
		$result = $this->db->query("SELECT `balance` FROM `".$this->dbtable."` WHERE `username`='".$this->nameEscaped."';");
		$row = $result->fetch_assoc();
		return $row['balance'];
		
	}

	private function hasIconomyAccount ($mcname) {
		$mcname = $this->db->real_escape_string($mcname);
		$result = $this->db->query("SELECT * FROM `".$this->dbtable."` WHERE `username`='$mcname';");
		return $result->num_rows;
	}

}

?>