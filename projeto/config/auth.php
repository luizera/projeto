<?php
	
	header('Content-Type: application/json');

	require_once 'Conexao.php';
	require_once '../../models/User.php';

	$db = new Conexao();
	$con = $db->getConexao();
	$user = new User($con);

	$user->login =  $_SERVER['PHP_AUTH_USER'];
    $user->senha = 	$_SERVER['PHP_AUTH_PW'] ;


	function logar($user){
		if($user->read()){
			return true;
		}else{
			echo json_encode(["mensagem" => "Dados Invalidos!"]);
			return false;
		}
	}

	if (!logar($user)){
			header('HTTP/1.0 401 Unauthorized');
			echo json_encode(["mensagem" => "Autenticacao Necessaria!"]);
			exit;
	}