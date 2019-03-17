<?php  

include 'src/data/connection.php';
if (isset   ($_POST['login']) && 
            ($_POST['senha'])){

   $login = $_POST['login'];
   $senha = $_POST['senha'];

    // Primeiro teste - Buscar o usuário pelo email
    $sql = "select * from usuarios where email = '$login'";
    $result1 = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result1) > 0){
        echo 'Usuario encontrado';
        // Encontrou o usuário
        // Testar a senha informada 
        while($row = mysqli_fetch_assoc($result1)){
            $senha_stored = $row['senha'];
            if(password_verify($senha, $senha_stored)){
                echo 'Tudo certo';
            }else{
                echo 'Deu Erro';
            }
        }
    }else{
        echo 'usuario nao encontrado';
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
    <form action="login.php" method="POST">  
        <div>
            <label for="nome">Login:</label>
            <input type="text" name="login" value="">
        </div>
        <div>
            <label for="sobrenome">SOBRENOME:</label>
            <input type="password" name="senha" value="">
        </div>
        <input type="submit" value="Enviar">
    </form>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>