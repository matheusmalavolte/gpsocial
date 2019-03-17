<?php  
$resposta = '';
$result = '';
include 'src/data/connection.php';
if (isset   ($_POST['nome']) && 
            ($_POST['sobrenome'])){
   $sobrenome = $_POST['sobrenome'];
   $nome = $_POST['nome'];
    // String da query
    $sql = "select * from usuarios where nome = 'Matheus'";
    $sql2 = "select * from usuarios where sobrenome = '$sobrenome'";
    if($nome ==''){
        $result = mysqli_query($conn, $sql);
    }
    /*if(!$sobrenome == ''){
        $result = mysqli_query($conn, $sql2);
    }*/
    // Testes de inserção (query)
    if (mysqli_num_rows($result) > 0){
        $resposta = 'encontrado';
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
    <form action="consulta.php" method="POST">  
        <div>
            <label for="nome">NOME:</label>
            <input type="text" name="nome" value="">
        </div>
        <div>
            <label for="sobrenome">SOBRENOME:</label>
            <input type="text" name="sobrenome" value="">
        </div>
        <input type="submit" value="Enviar">
    </form>
    <?php 
   
    ?>
</body>
</html>