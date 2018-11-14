<?php

header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Post.php';
require_once '../../models/Categoria.php';

//instancia o objeto conexao
$db = new Conexao();

//recebe a conexao feita
$con = $db->getConexao();

//instancia o objeto categotia com a conexao como parametro
//passa a conexao
$post = new Post($con);

//chama o metodo read() e da o resultado dele na variavel resultado
$id = json_decode(file_get_contents('php://input'),true);
$getIdCategoria = $_GET['id'];

$post->readCategoria($id);