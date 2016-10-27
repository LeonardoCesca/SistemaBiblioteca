<?php
	include_once('conexao.php');
	
	$id = $_REQUEST['id'];
	
	if($id != null){
		
		$queryDeletar = "DELETE FROM livros where id =". $id;
		mysqli_query($conexao_livros, $queryDeletar);
		
		header("Location: buscar.php");

		
	}else{
		
		header("Location: buscar.php");
	}
	
?>
