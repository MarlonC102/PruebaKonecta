CREATE DATABASE prueba;
use prueba;

CREATE TABLE inventario(
    id int AUTO_INCREMENT PRIMARY key not null,
    NombreProducto varchar(50) not null,
    Referencia varchar (50) not null,
    Precio int not null,
    Peso int not null,
    Categoria varchar(50) not null,
    Stock int not null,
    FechaCreación date not null,
    FechaUltimaVenta dateTime 
);