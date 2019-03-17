<?php  
$resposta = '';
include 'src/data/connection.php';
if (isset   ($_POST['nome']) && 
            ($_POST['sobrenome']) &&
            ($_POST['email']) &&
            ($_POST['senha']) && 
            ($_POST['telefone'])){
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $nova_senha = password_hash($senha, PASSWORD_DEFAULT);

    // String da query
    $sql = "insert into usuarios (nome, sobrenome, email, telefone, senha) values('$nome','$sobrenome','$email','$telefone','$nova_senha' )";

    // Testes de inserção (query)
    if(mysqli_query($conn, $sql)){
        $resposta = 'Cadastro com sucesso';
    }else{
         $resposta = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        echo $resposta;    
    ?>
    <form action="cadastro.php" method="POST">  
        <div>
            <label for="nome">NOME:</label>
            <input type="text" name="nome">
        </div>
        
        <div>
            <label for="sobrenome">SOBRENOME:</label>
            <input type="text" name="sobrenome">
        </div>

        <div>
            <label for="email">EMAIL:</label>
            <input type="email" name="email">
        </div>
        
        <div>
            <label for="senha">SENHA:</label>
            <input type="password" name="senha">
        </div>
        
        <div>
            <label for="telefone">TELEFONE:</label>
            <input type="text" name="telefone">
        </div>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>