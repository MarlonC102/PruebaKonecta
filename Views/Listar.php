
<?php 
require_once '../Controller/InventarioController.php';
require_once '../Model/InventarioModel.php';
$inventario = new InventarioModel();
$control = new InventarioController();
?>
<?php include "header.php"; ?>
<body>
<div class="container">

    
    <div class="row">

    <a href="Crear.php" class="btn btn-success">Nuevo Producto</a>
        <table  class="table">
        <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre del producto</th>
        <th scope="col">Referencia</th>
        <th scope="col">Precio</th>
        <th scope="col">Peso</th>
        <th scope="col">Categoria</th>
        <th scope="col">Stock</th>
        <th scope="col">Fecha de creación</th>
        <th scope="col">Fecha de ultima venta</th>
        <th scope="col">acciones</th>
        </tr>
            <?php $i=0; foreach ($control->ListaDatos() as $r): $i++;?>
                <td><?php echo $i ?></td>
                <td> <?php echo $r->__GET('NombreProducto');?> </td>
                <td> <?php echo $r->__GET('Referencia');?> </td>
                <td> <?php echo $r->__GET('Precio');?> </td>
                <td> <?php echo $r->__GET('Peso');?> </td>
                <td> <?php echo $r->__GET('Categoria');?> </td>
                <td> <?php echo $r->__GET('Stock');?> </td>
                <td> <?php echo $r->__GET('FechaCreación');?> </td>
                <td> <?php echo $r->__GET('FechaUltimaVenta');?> </td>
                <td>
                <a href="Editar.php?id=<?php echo $r->id;?>" class="btn btn-warning" role="button" ><i class="fa fa-pencil-square-o"></i></a>
                <a href="Eliminar.php?id=<?php echo $r->id;?>" onclick='return confirm("¿Estas seguro?")' class="btn btn-danger" role="button" ><i class="fa fa-trash"></i></a>
                </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>
