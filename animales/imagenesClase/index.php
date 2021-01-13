<?php
if (isset($_POST['enviar'])) {
    echo 'Nombre original:' . $_FILES['foto']['name'] . '<br>';
    echo 'Nombre temporal:' . $_FILES['foto']['tmp_name'] . '<br>';
    echo 'Tamaño:' . $_FILES['foto']['size'] . '<br>';
    echo 'Tipo:' . $_FILES['foto']['type'] . '<br>';
    echo 'Error:' . $_FILES['foto']['error'] . '<br>';
    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        $fichero_unico = $_FILES['foto']['name']."-".time();
        $ruta = "fotos/".$fichero_unico;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        $conex = new mysqli("localhost", "dwes", "abc123.", "imagenes");
        $conex->query("insert into fotos (nombre, ruta) values ('$fichero_unico', '$ruta')");
        echo $conex->error;
        $conex->close();

    }
    else{
        echo "Alto fail subiendo la img";
    }
} 

if(isset($_POST['mostrar'])){
    $conex = new mysqli("localhost", "dwes", "abc123.", "imagenes");
    $result = $conex->query('select * from fotos');
    while ($fila=$result->fetch_object()) {
        echo "<a href='mostrarImagen.php?ruta=$fila->ruta'><img src='$fila->ruta'></a><br>";
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    Foto: <input type="file" name="foto"><br>
    <input type="submit" name="enviar" value="Enviar">
    <input type="submit" name="mostrar" value="Mostrar">
</form>
