<?php
	include_once("conexao.php");

	if(isset($_POST) && $_POST){
	
	$busca = $_POST['busca'];
	}else{
		$busca = null;
	}
	$queryBusca = "SELECT * FROM livros WHERE titulo LIKE '%$busca%' OR autor LIKE '%$busca%'";
	$resultado_adiciona_livros = mysqli_query($conexao_livros, $queryBusca);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Biblioteca Pessoal</title>
<link href="bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script language="Javascript">
</script>
</script>
</head>

<body>
	<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Livros</h1>
			</div>			
            <div>
			 <!-- MENU -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="/Site/adicionar_livros.php" aria-controls="home" role="tab" data-toggle="tab">Adicionar Livros</a></li>
				<li role="presentation" class="active"><a href="/Site/buscar.php" aria-controls="buscar" role="tab" data-toggle="tab">Buscar Livros</a></li>
						
			  </ul>
              <!-- CONTEUDO MENU -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="busca">
					<div style="padding-top:20px;">
						<form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Busca</label>
                                <div class="col-sm-10">
                                    <input type="text" name='busca' class="form-control" id="busca" placeholder="Pesquisar...">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Buscar</button>
                                </div>
                            </div>
                        </form>
					</div>
					<table class="table table-bordered table-stripped" id="tabelinha">
						<thead>
						 
							<th>Id</th>
							<th>Título</th>
							<th>Autor</th>
							<th>Ações </th>
						</thead>
						<tbody>
							

							<?php 
									 while ($resultado = mysqli_fetch_array($resultado_adiciona_livros)){
										echo "<tr>
											<td>".$resultado['id']."</td>
										<td>".$resultado['titulo']."</td>
											<td>".$resultado['autor']."</td>
											<td>
										<!--BOTAO DELETAR-->
										<a href='deletar.php'</a>
										<a class='btn btn-danger' href='deletar.php?id=".$resultado['id']."' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">Deletar</a>
										</td>
										</tr>";
															
								 }
							?>
							
							<!--CONFIRMAÇÃO DELETAR-->
								<script type="text/JavaScript">
									function deletar(){
										var agree=confirm("Deseja deletar esse livro? ");
										if (agree)
											return true ;
										else
											return false ;
									}
</script>
</body>
<script type="text/javascript">
	$("#tabelinha").DataTable();
</script>
</html>