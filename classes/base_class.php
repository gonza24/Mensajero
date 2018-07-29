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

	public function count_rows(){
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

	public function single_result(){
		return $this->Query->fetch(PDO::FETCH_OBJ);
	}

	public function time_ago($db_msg_time){
		date_default_timezone_set("America/Argentina/Buenos_Aires");

		$db_time = strtotime($db_msg_time);

		$current_time = time();

		$seconds = $current_time - $db_time;
		$minutes = floor($seconds/60); //60 seg
		$hours 	 = floor($seconds/3600); // 60seg * 60min
		$days 	 = floor($seconds/86400); // 60seg * 60min * 24hs
		$weeks	 = floor($seconds/604800); // 60seg*60min*24hs* 7 dias
		$monts 	 = floor($seconds/2592000); // 60seg*60min*24hs* 30 dias
		$years 	 = floor($seconds/31536000); // 60seg*60min*24hs* 365dias

		if($seconds <= 60){
			return "Ahora";
		}else if($minutes <= 60){
			if($minutes == 1){
				return "Hace 1 minuto";
			}else{
				return "Hace ".$minutes." minutos";
			}
		}else if($hours <= 24){
			if($hours == 1){
				return "Hace 1 hora";
			}else{
				return "Hace ".$hours." horas";
			}

		}else if($days <= 7){
			if($days == 1){
				return "Hace 1 día";
			}else{
				return "Hace ".$days." días";
			}
		}else if($weeks <= 4.3){
			if($weeks == 1){
				return "Hace 1 semana";
			}else{
				return "Hace ".$weeks." semanas";
			}
		}else if($monts <= 12){
			if($monts == 1){
				return "Hace 1 mes";
			}else{
				return "Hace ".$monts." meses";
			}
		}else{
			if($years == 1){
				return "Hace 1 año";
			}else{
				return "Hace ".$years." años";
			}
		}


	}
}
