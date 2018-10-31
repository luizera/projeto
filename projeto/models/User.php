<?php


class User{
	public $id_user;
	public $login;
	public $senha;
	private $conexao;

	public function __construct($con){
		$this->conexao = $con;
	}

	public function read(){

		$consulta = "SELECT login,senha FROM user WHERE login like :login AND senha like :senha";
		$stmt = $this->conexao->prepare($consulta);
		$stmt->bindParam(':login',$this->login,PDO::PARAM_STR);
		$stmt->bindParam(':senha',$this->senha,PDO::PARAM_STR);
		try{
			$stmt->execute();	
			$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() > 0){
					return true;
				}else{
					return false;
				}
			return $resultado;
		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
}