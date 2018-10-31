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

//chama o metodo read() e da o resultado dele na variavel resultado

$resultado = $cat->read();

echo json_encode($resultado);