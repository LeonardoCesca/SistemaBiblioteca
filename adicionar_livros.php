<?php
	require_once 'autenticacao.php';
	include_once("conexao.php");
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; url=index.php"/>
<title>Biblioteca Pessoal</title>
<link href="css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
	<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Livros</h1>
			</div>			
            <?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$request = md5(implode($_POST));
					if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){
						echo "<script>alert(\"Livro Existente!\")</script>";
					}else{
						$_SESSION['ultima_request'] = $request;
						$titulo = $_POST['titulo'];
						$autor = $_POST['autor'];
						$id = $_POST['id'];
						if(empty($_POST['id']){
							$result_adiciona_livros = "INSERT INTO livros (titulo, autor, usuario) VALUES ('$titulo', '$autor', $_SESSION[usuario_id])";
						}else{
							$result_adiciona_livros = "UPDATE livros SET titulo = '$titulo', autor = '$autor' WHERE id = $id";
						}
						$resultado_adiciona_livros = mysqli_query($conexao_livros, $result_adiciona_livros);
						//ID DO LIVRO INSERIDO
						$ultimo_id = mysqli_insert_id($conexao_livros);
						echo "<script>alert(\"Livro inserido com Sucesso!\")</script>";
					}
				}
				if(isset($_GET['id']){
					$queryEditar = "SELECT * FROM livros WHERE id = $_GET[id]";
					$resultado_editar = mysqli_query($conexao_livros, $queryEditar);
					$editar = mysqli_fetch_array($resultado_editar);
				}else{
					$editar = array(
						'titulo' => '',
						'autor' => '',
						'id' => ''
					);
				}
			?>
            <div>

			  <!-- MENU -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#adiciona_livros" aria-controls="home" role="tab" data-toggle="tab">Adicionar Livros</a></li>
				<li role="presentation"><a href="/Site/buscar.php" aria-controls="buscar" role="tab" data-toggle="tab">Buscar Livros</a></li>
				

				

                
				
			  </ul>
              
              <!-- CONTEUDO MENU -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="adiciona_livros">
					<div style="padding-top:20px;">
						<form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Titulo</label>
                                <div class="col-sm-10">
                                    <input type="text" type="reset" name='titulo' class="form-control" id="titulo" placeholder="Titulo do Livro" value="<?php echo $editar['titulo']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Autor</label>
                                <div class="col-sm-10">
                                    <input type="text" name='autor' class="form-control" id="autor" placeholder="Autor do Livro" value="<?php echo $editar['autor']; ?>">
								</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
									<input type="hidden" name="id" value="<?php echo $editar['id']; ?>">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				
                
                
		
</body>
</html>