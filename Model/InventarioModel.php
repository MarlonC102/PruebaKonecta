<?php
    class InventarioModel {
        private $id;
        private $NombreProducto;
        private $Referencia;
        private $Precio;
        private $Peso;
        private $Categoria;
        private $Stock;
        private $FechaCreación;
        private $FechaUltimaVenta;
    
        public function __GET($att){
            return $this->$att;
        }

        public function __SET($att, $v){
            $this->$att=$v;
        }
    }
?>