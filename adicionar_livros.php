<?php
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
						echo "Livro Existente!";
					}else{
						$_SESSION['ultima_request'] = $request;
						$titulo = $_POST['titulo'];
						$autor = $_POST['autor'];
						$_SESSION['titulo'] = $titulo;
						$_SESSION['autor'] = $autor;
						$result_adiciona_livros = "INSERT INTO livros (titulo, autor) VALUES ('$titulo', '$autor')";
						$resultado_adiciona_livros = mysqli_query($conexao_livros, $result_adiciona_livros);
						//ID DO LIVRO INSERIDO
						$ultimo_id = mysqli_insert_id($conexao_livros);
						echo "Livro inserido com Sucesso!"; 		
			}
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
                                    <input type="text" type="reset" name='titulo' class="form-control" id="titulo" placeholder="Titulo do Livro" value="<?php if(isset($_SESSION['titulo'])){ echo $_SESSION['titulo']; }?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Autor</label>
                                <div class="col-sm-10">
                                    <input type="text" name='autor' class="form-control" id="autor" placeholder="Autor do Livro" value="<?php if(isset($_SESSION['autor'])){ echo $_SESSION['autor']; } ?>">
								</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				
                
                
		
</body>
</html>