<html>
<head>
    <title>Lista de proveedores</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estas seguro?, se eliminarán los datos');
        }
    </script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php
    include("conexion.php");
    $sql="select * from proveedores";
    $resultado=mysqli_query($conexion,$sql);
?>
    <h1>Lista de proveedores</h1>
    <a href="agregar.php">Nuevo proveedor</a><br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas=mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td> <?php echo $filas['id'] ?></td>
                <td><?php echo $filas['nombre'] ?></td>
                <td><?php echo $filas['producto'] ?></td>
                <td>
<?php echo "<a href='editar.php?id=".$filas['id']."'>EDITAR</a>"; ?>
                    -
<?php echo "<a href='eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>ELIMINAR</a>"; ?>


                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
        mysqli_close($conexion);
    ?>
</body>
</html>