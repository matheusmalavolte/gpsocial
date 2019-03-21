<?php 

   include 'connection.php';
   if (isset   ($_POST['tipo'])){
   
       $tipo = $_POST['tipo'];
       

       $sql = "insert into acessibilidade (tipo) values('$tipo' )";
       if(mysqli_query($conn, $sql)){
        echo 'sucesso';
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
mysqli_close($conn);


   }
   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Document</title>
   </head>
   <body>
       <form action="filtro.php" method="POST">
       <input type="text" name="tipo">
       <input type="submit" value="enviar">
       </form>
   </body>
   </html>
