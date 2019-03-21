<?php
 include 'connection.php';

 $sql = "select * from acessibilidade";
 $resultado = mysqli_query($conn,$sql);
 if (mysqli_num_rows($resultado) > 0) {
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "id: " . $row["id"]. " - Acessibilidade " . $row["tipo"].  "<br>";
    }
}else{
    echo "No data";
}
?>