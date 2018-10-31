<?php 
    include_once '../models/Categoria.php';
    include_once '../models/Post.php';
    include_once '../config/Conexao.php';
    $db = new Conexao();
    $con = $db->getConexao();
    $categoria = new Categoria($con);
    $categorias = $categoria->read();
    $post = new Post($con);
    $posts = $post->read();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projeto</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="principal">
		<div class="categorias" id="categorias">
			<?php 
				for($i=0;$i<sizeof($categorias);$i++){
                	echo "<div class='nomeCategorias'>".$categorias[$i]['nome']."</div>";
                }
			?>
		</div>
		<div class="posts">
			<?php 
				for($i=0;$i<sizeof($posts);$i++){
                	echo "<div class='nomePosts'>".$posts[$i]['titulo']."</div>";
                }
			?>
		</div>	
	</div>
	<script type="text/javascript"></script>
</body>
</html>