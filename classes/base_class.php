<?php 

class base_class extends Db{

	private $Query;

	public function normal_query($query, $param = null){

		if(is_null($param)){
			$this->Query = $this->con->prepare($query);
			return $this->Query->execute();
		}else{
			$this->Query = $this->con->prepare($query);
			return $this->Query->execute($param);
		}
	}

	public function Count_Rows(){
		return $this->Query->rowCount();
	}

	public function fetch_all(){
		return $this->Query->fetchAll(PDO::FETCH_OBJ);
	}

	public function security($data){
		return strip_tags($data);
	}

	public function create_session($session_name, $session_value){
		$_SESSION[$session_name] = $session_value;

	}
}
