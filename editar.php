<?php
    include("conexion.php");
?>

<html>
<head>
    <title>EDITAR</title>
</head>
<body>
<?php
        if(isset($_POST['enviar'])){
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $producto=$_POST['producto'];

            $sql="update proveedores set nombre='".$nombre."',
                producto='".$producto."' where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
               echo " <script languaje='JavaScript'>
                        alert('Los datos fueron ingresados correctamente a la BD');
                        location.assign('index.php');
                        </script>";
            }
            else {
                " <script languaje='JavaScript'>
                        alert('ERROR: Los datos NO fueron ingresados a la BD');
                        location.assign('index.php');
                        </script>";
            }
            mysqli_close($conexion);

        }
        else {
            $id=$_GET['id'];
            $sql="select * from proveedores where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);
            $fila=mysqli_fetch_assoc($resultado);
            $nombre=$fila["nombre"];
            $producto=$fila["producto"];

            mysqli_close($conexion);
    ?>
    <h1>Editar Proveedor<h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>

        <label>Producto</label>
        <input type="text" name="producto" value="<?php echo $producto; ?>"><br>

        <input type="hidden" name="id"
        value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php">Regresar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>