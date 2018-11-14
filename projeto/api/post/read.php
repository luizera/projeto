<?php
header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Post.php';
//include "../../config/auth.php";

//instancia o objeto conexao
$db = new Conexao();

//recebe a conexao feita
$con = $db->getConexao();

//instancia o objeto categotia com a conexao como parametro
//passa a conexao
$post = new Post($con);

//chama o metodo read() e da o resultado dele na variavel resultado
if(isset($_GET['id'])){
	$resultado = $post->read($_GET['id']);
}else{
	$resultado = $post->read();
}

echo json_encode($resultado);