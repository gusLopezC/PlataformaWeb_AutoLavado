create database lavado;

use lavado;

create table usuarios(
				id_usuario int auto_increment,
				nombre varchar(50) not null,
				apellido varchar(50) not null,
				usuario varchar(50) not null,
				password text(50) not null,
				fechaCaptura date not null,
				primary key(id_usuario)
					);

create table categorias (
				id_categoria int auto_increment,
				id_usuario int not null,
				nombreCategoria varchar(150) not null,
				fechaCaptura date,
				primary key(id_categoria),
				foreign key (id_usuario) REFERENCES usuarios(id_usuario)
						);

create table imagenes(
				id_imagen int auto_increment ,
				id_categoria int not null,
				nombre varchar(500) not null,
				ruta varchar(500),
				fechaSubida date,
				primary key(id_imagen),
				foreign key (id_categoria) REFERENCES categorias(id_categoria)
					);
create table articulos(
				id_producto int auto_increment,
				id_categoria int not null,
				id_imagen int not null,
				id_usuario int not null,
				nombre varchar(50),
				descripcion varchar(500),
				cantidad int,
				precio float,
				fechaCaptura date,
				provedor varchar(500),
				lote int,
				primary key(id_producto),
				foreign key (id_categoria) REFERENCES categorias(id_categoria),
				foreign key (id_imagen) REFERENCES imagenes(id_imagen),
				foreign key (id_usuario) REFERENCES usuarios(id_usuario)

						);

create table clientes(
				id_cliente int auto_increment,
				id_usuario int not null,
				nombre varchar(200),
				apellido varchar(200),
				direccion varchar(200),
				email varchar(200),
				telefono varchar(200),
				rfc varchar(200),
				primary key(id_cliente)
					);

create table ventas(
				id_venta int not null,
				id_cliente int,
				id_producto int,
				id_usuario int,
				precio float,
				fechaCompra date,
				foreign key (id_cliente) REFERENCES clientes(id_cliente),
				foreign key (id_producto) REFERENCES articulos(id_producto),
				foreign key (id_usuario) REFERENCES usuarios(id_usuario)
					);

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreProvedor` varchar(150) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
