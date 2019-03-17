<?php  
$resposta = '';
include 'src/data/connection.php';
if (isset   ($_POST['login']) && 
            ($_POST['senha'])){

   $login = $_POST['login'];
   $senha = $_POST['senha'];

    // Primeiro teste - Buscar o usuário pelo email
    $sql = "select * from usuarios where email = '$login'";
    $result1 = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result1) > 0){
        // Encontrou o usuário
        // Testar a senha informada 
        while($row = mysqli_fetch_assoc($result1)){
            $senha_stored = $row['senha'];
            if(password_verify($senha, $senha_stored)){
                $resposta = 'Sucesso, você sera redirecionado';
            }else{
				$resposta = 'Senha incorreta';
            }
        }
    }else{
        echo 'Usuário não encontrado';
    }
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/navbar.css">
      <link rel="stylesheet" type="text/css" href="css/estilo-login.css">
      <link rel="stylesheet" type="text/css" href="css/responsividade.css">
      <title> Gps Social</title>
   </head>
   <body>
      <nav class="navbar navbar-dark bg-dark">
         <div class="container">
            <a class="navbar-brand" href="index.html">Gps Social</a>
            <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-2"></div>
               <div class="col-md-4"> <a href="#" class="fonte_branca">Fale conosco</a></div>
               <div class="col-md-4"><a href="quem-somos.php" class="fonte_branca">Quem somos</a></div>
            </div>
         </div>
      </nav>
      <form class="box" action="login.php" method="POST">
         <h1>Login</h1>
         <input type="text" name="login" placeholder="E-mail"> 
         <input type="password" name="senha" placeholder="Senha">
         <input type="submit"  value="Entrar">
		 <a href="cadastro.php" class="texto">Criar uma conta?</a>
		 <?php
		 	echo "<a class='texto'> ". $resposta ."</a>";
		 
		 ?>
         <!--<a class="botao" href="cadastro.html">Cadastre-se</a>-->
      </form>
   </body>
</html>