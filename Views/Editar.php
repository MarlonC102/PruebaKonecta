
<?php 
require_once '../Controller/InventarioController.php';
require_once '../Model/InventarioModel.php';
$inventario = new InventarioModel();
$control = new InventarioController();
$resultado=$control->buscar($_GET['id']);
?>
<?php include "header.php"; ?>
<body>
<div class="container">
  <h2>Editar Producto</h2>
  <form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="NombreProducto">Nombre:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="NombreProducto" name="NombreProducto" value="<?php echo $resultado->NombreProducto; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Referencia">Referencia:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Referencia" name="Referencia" value="<?php echo $resultado->Referencia; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Precio">Precio:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="Precio" name="Precio" min="1" value="<?php echo $resultado->Precio; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Peso">Peso:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="Peso" name="Peso" min="1" value="<?php echo $resultado->Peso; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Categoria">Categoria:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Categoria" name="Categoria" value="<?php echo $resultado->Categoria; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Stock">Stock:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="Stock" name="Stock" min="1" value="<?php echo $resultado->Stock; ?>">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" id='btn' name='btn' class="btn btn-success">Guardar</button>
      </div>
    </div>
  </form>
</div>

</body>
<?php 
    if (isset($_POST['btn'])) {
        $inventario->__SET('id',$_GET['id']);
        $inventario->__SET('NombreProducto',$_POST['NombreProducto']);							
        $inventario->__SET('Referencia',$_POST['Referencia']);
        $inventario->__SET('Precio',$_POST['Precio']);
        $inventario->__SET('Peso',$_POST['Peso']);
        $inventario->__SET('Categoria',$_POST['Categoria']);
        $inventario->__SET('Stock',$_POST['Stock']);
        if ($control->actualizar($inventario)) {
            header('Location: Listar.php'); }
    }	
?>
</html>
