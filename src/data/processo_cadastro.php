<?php 

   include 'connection.php';
   if (isset   ($_POST['nome']) && 
               ($_POST['email']) &&
               ($_POST['senha']) &&
               ($_POST['telefone'])){
   
       $nome = $_POST['nome'];
       $sobrenome = '';
       $email = $_POST['email'];
       $senha = $_POST['senha'];
       $telefone = $_POST['telefone'];
       $nova_senha = password_hash($senha, PASSWORD_DEFAULT);
   
        // String da query
       $sql = "insert into usuarios (nome, sobrenome, email, telefone, senha) values('$nome','$sobrenome','$email','$telefone','$nova_senha' )";
        
        // Testes de inserção (query)
        if(mysqli_query($conn, $sql)){
            echo 'sucesso';
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    mysqli_close($conn);
   
   }
?>