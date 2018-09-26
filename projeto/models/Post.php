<?php

class Post{
	public $id;
	public $titulo;
	public $texto;
	public $id_categoria;
	public $autor;
	public $dt_criacao;
	private $conexao;

	public function __construct($con){
		$this->conexao = $con;

	}

	public function read($id=null){
		try{
			if (isset($id)){
				$consulta = "SELECT * from post WHERE id= :id";
				$stmt = $this->conexao->prepare($consulta);
				$stmt->bindParam('id',$id,PDO::PARAM_INT);
				$stmt->execute();
				$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
			}else{
				$consulta = "SELECT * from post order by titulo";
				$stmt = $this->conexao->prepare($consulta);
				$stmt->execute();
				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			return $resultado;
		}catch(PDOException $e){
			die($e);
		}
	}

	//metodo que traga posts filtrados por categoria 
	//ordena por data decrescente
	//join para trazer tambem o nome da categoria
	
	public function readCategoriaPost($idCat=null){
		if (isset($idCat)){
			$consulta = "SELECT c.nome , p.titulo FROM categoria c INNER JOIN post p ON c.id = p.:id_categoria";
			$stmt = $this->conexao->prepare($consulta);
			$stmt->bindParam(':id_categoria',$idCat,PDO::PARAM_INT);

		}else{
			$consulta = "SELECT c.nome , p.titulo FROM categoria c INNER JOIN post p ON c.id = p.id_categoria";
			$stmt = $this->conexao->prepare($consulta);
			$stmt->execute();
			$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}

		$stmt->execute();
		$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
		return $resultado;
	}

	public function create(){
		$consulta = "INSERT INTO post(titulo,texto,autor,id_categoria) VALUES( :titulo,:texto,:autor,:id_categoria)";
		$stmt = $this->conexao->prepare($consulta);
		$stmt->bindParam(':titulo', $this->titulo , PDO::PARAM_STR);
		$stmt->bindParam(':texto', $this->texto , PDO::PARAM_STR);
		$stmt->bindParam(':autor', $this->autor , PDO::PARAM_STR);
		$stmt->bindParam(':id_categoria', $this->id_categoria, PDO::PARAM_INT);
		if ($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function update(){
		// print_r($id);
		$consulta = "UPDATE post SET titulo = :titulo, texto = :texto, autor = :autor, id_categoria = :id_categoria WHERE id = :id;";
		$stmt = $this->conexao->prepare($consulta);
		$stmt->bindParam(':id', $this->id , PDO::PARAM_INT);
		$stmt->bindParam(':titulo', $this->titulo , PDO::PARAM_STR);
		$stmt->bindParam(':texto', $this->texto , PDO::PARAM_STR);
		$stmt->bindParam(':autor', $this->autor , PDO::PARAM_INT);
		$stmt->bindParam(':id_categoria', $this->id_categoria, PDO::PARAM_INT);
		try {
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function delete(){
		$consulta = "DELETE FROM post WHERE id = :id";
		$stmt = $this->conexao->prepare($consulta);
		$stmt->bindParam(':id', $this->id , PDO::PARAM_INT);
		try {
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
}