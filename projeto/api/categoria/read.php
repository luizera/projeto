<?php

header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Categoria.php';
//include "../../config/auth.php";

//instancia o objeto conexao
$db = new Conexao();

//recebe a conexao feita
$con = $db->getConexao();


//instancia o objeto categotia com a conexao como parametro
//passa a conexao
$cat = new Categoria($con);
if(isset($_GET['id'])){
	$resultado = $cat->read($_GET['id']);
}else{
	$resultado = $cat->read();
}
//chama o metodo read() e da o resultado dele na variavel resultado


echo json_encode($resultado);