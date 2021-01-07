<?php 
require_once '../Controller/InventarioController.php';
require_once '../Model/InventarioModel.php';
$inventario = new InventarioModel();
$control = new InventarioController();
if ($control->eliminar($_GET['id'])){
    header('Location: Listar.php');
}
?>