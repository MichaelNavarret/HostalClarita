--LLENADO DE TABLA EMPRESA (3)
INSERT INTO Empresa (rutEmpresa, correo, contraseña, nombre, direccion)
VALUES ('21333221', 'malyaso@gmail.com', 'oo987ghyt2', 'Malvados y asociados', 'Poblacion Libertad, pasaje 3 poniente, #323. Chillán, Chile');
INSERT INTO Empresa (rutEmpresa, correo, contraseña, nombre, direccion)
VALUES ('33292319', 'floranis@gmail.com', '221019AN22', 'Flor de Anís', 'Poblacion Guerra, pasaje 19 pereira, #272. Valparaiso, Chile');

 
--LLENADO TABLA "ESTADO" (4)
INSERT INTO Estado (nombre) VALUES ('Confirmada');
INSERT INTO Estado (nombre) VALUES ('Cancelada');
INSERT INTO Estado (nombre) VALUES ('Activa');
INSERT INTO Estado (nombre) VALUES ('Terminada');

--LLENADO TABLA "TIPO HABITACION"
INSERT INTO TipoHabitacion (valor, nombre, detalle) 
VALUES (30000, 'Simple', 'Habitación con una sola cama. Pensadas para la estadía individual.');
INSERT INTO TipoHabitacion (valor, nombre, detalle) 
VALUES (45000, 'Doble', 'Habitación con dos camas. Pensadas para la estadía compartida de 2 huéspedes.');
INSERT INTO TipoHabitacion (valor, nombre, detalle) 
VALUES (500000, 'Comedor', 'Comedor amplio para desarrollar diversas actividades. Máximo de personas: 120 aproximadamente.');

--LLENADO TABLA "ESTADO HABITACION"
INSERT into EstadoHabitacion (nombre)
VALUES ('Libre');
INSERT into EstadoHabitacion (nombre)
VALUES ('Ocupada');
INSERT into EstadoHabitacion (nombre)
VALUES ('Mantenimiento');


--LLENADO TABLA HABITACION (10)
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,2,'Habitación de tipo Simple. Con una sola Cama', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,2,'Habitación de tipo Simple. Con una sola Cama', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,2,'Habitación de tipo Simple. Con una sola Cama', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,2,'Habitación de tipo Simple. Con una sola Cama', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,2,'Habitación de tipo Simple. Con una sola Cama', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,3,'Habitación de tipo Doble. Con 2 Camas', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,3,'Habitación de tipo Doble. Con 2 Camas', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,3,'Habitación de tipo Doble. Con 2 Camas', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,3,'Habitación de tipo Doble. Con 2 Camas', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,3,'Habitación de tipo Doble. Con 2 Camas', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (1,4,'', null);
INSERT INTO Habitacion(idEstadoHabitacion, idTipoHabitacion, detalle, idReserva)
VALUES (3,2,'Habitación de tipo Simple. Con una sola Cama', null);

--LLENADO TABLA "TIPO PAGO"
INSERT INTO TipoPago (nombre) Values ('Tarjeta Credito');
INSERT INTO TipoPago (nombre) Values ('Tarjeta Debito');
INSERT INTO TipoPago (nombre) Values ('Transferencia');
INSERT INTO TipoPago (nombre) Values ('Efectivo');


--LLENANDO TABLA RUBRO
INSERT INTO Rubro (nombre) VALUES ('ALIMENTOS');
INSERT INTO Rubro (nombre) VALUES ('ARTICULOS DEL HOGAR');
INSERT INTO Rubro (nombre) VALUES ('CARNICERIA');
INSERT INTO Rubro (nombre) VALUES ('ELEMENTOS DE LIMPIEZA');
INSERT INTO Rubro (nombre) VALUES ('EQUIPO DE OFICINA Y MUEBLES');
INSERT INTO Rubro (nombre) VALUES ('EQUIPO ELECTRICOS');
INSERT INTO Rubro (nombre) VALUES ('FABRICA DE COLCHONES Y FRAZADAS');

--LLENADO TABLA OPERADOR HOSTAL
INSERT INTO OperadorHostal (rutOperador, nombre, apellidoPat, apellidoMat, fechaNacimiento, fechaContrato) 
VALUES ('223321232','Jorge','Fernandez','Pereira','10-22-1987', '08-13-2010');
INSERT INTO OperadorHostal (rutOperador, nombre, apellidoPat, apellidoMat, fechaNacimiento, fechaContrato) 
VALUES ('81233211','Juan','Mardonez','Cartes','07/21/1983' , '01/12/2012' );
INSERT INTO OperadorHostal (rutOperador, nombre, apellidoPat, apellidoMat, fechaNacimiento, fechaContrato) 
VALUES ('192321231','Miguel','Navarro','Lopez','07-09-1989' , '03-22-2002' );
INSERT INTO OperadorHostal (rutOperador, nombre, apellidoPat, apellidoMat, fechaNacimiento, fechaContrato) 
VALUES ('192231232','Pedro','Martinez','Romanoff', '12/13/1993' , '02/12/2007' );

--LLENANDO TABLA INFORME
INSERT INTO Informe (nombre, contenido) VALUES ('Informacion Total', 'Registro de todos los movimientos');
INSERT INTO Informe (nombre, contenido) VALUES ('Informacion de reservas', 'Registro de todas las reservas del mes');
INSERT INTO Informe (nombre, contenido) VALUES ('Informacion de ordenes pedido', 'Registro de todas las ordenes de Pedido');
INSERT INTO Informe (nombre, contenido) VALUES ('Informacion de ordenes recepcion', 'Registro de todas las ordenes de recibidas');
INSERT INTO Informe (nombre, contenido) VALUES ('Informacion de visitas web', 'Registro de todas las visitas web');

--LLENADO TABLA PROVEEDOR
INSERT INTO Proveedor (rutProveedor, direccion, nombre, idRubro) 
VALUES ('192323132', 'San Marcos Nº 531, Arica', 'Carniceria Pascal',3 );
INSERT INTO Proveedor (rutProveedor, direccion, nombre, idRubro) 
VALUES ('223927763', 'Eduardo de La Barra N° 480, La Serena', 'Morfeos Bed', 7 );
INSERT INTO Proveedor (rutProveedor, direccion, nombre, idRubro) 
VALUES ('983321232', 'Barros Arana N° 492. Torre Ligure. Concepción', 'ElecServices', 6 );
INSERT INTO Proveedor (rutProveedor, direccion, nombre, idRubro) 
VALUES ('223012322', 'Camilo Henríquez Nº 281, Valdivia', 'Wonder Muebles', 5 );
INSERT INTO Proveedor (rutProveedor, direccion, nombre, idRubro) 
VALUES ('332203921', 'Ignacio Carrera Pinto 185, Punta Arena', 'Sweet Home', 2 );

--TABLA PRODUCTO
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Carne Molida (500g)', 4000, '192323132');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Pechuga deshuesada (850g)', 4000, '192323132');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Filetillos de Pollo (830g)', 4000, '192323132');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Tutro entero de pollo(1kg)', 4000, '192323132');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Tártaro (500g)', 5000, '192323132');

INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Cobertor 1/2 Plaza', 14000, '223927763');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Cobertor 2 Plazas', 14000, '223927763');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Sabanas 1/2 Plaza', 10000, '223927763');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Sabanas 2 Plazas', 10000, '223927763');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Colchon 1/2 Plaza', 34000, '223927763');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Colchon 2 Plazas', 34000,'223927763');

INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Reparación Luces', 14000, '983321232');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Nuevas conexiones', 14000, '983321232');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Mantenimiento de conexiones', 10000, '983321232');

INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Rosen Sofá Cama', 300000, '223012322');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Comedor 6 Sillas', 250000, '223012322');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Silla Auditorio', 20000, '223012322');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Rack Horizont 55', 50000, '223012322');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Estante Roch ', 100000, '223012322');


INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Cortinas', 10000, '332203921');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Alfombra', 250000, '332203921');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Set 12 Vasos', 10000, '332203921');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Mantel Comedor', 3000, '332203921');
INSERT INTO Producto (nombre, valor, rutProveedor) VALUES ('Cortina de baño ', 5000, '332203921');
 
SELECT rutProveedor, nombre FROM Proveedor