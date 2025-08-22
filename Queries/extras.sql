-- Añadir otro campo a la tabla RENTAL llamado "alquilado"


-- Modificar el sp para obtener las 



-- Usar más sps...? PUEDE SER -> PARA OBNETER INFO DE ACTOR, STAFF Y TIENDA.
SELECT * FROM sakila.actor
order by actor_id desc;

INSERT INTO actor(first_name, last_name) VALUES('Pedrito','Cagamer');
UPDATE ACTOR SET first_name = 'Pedro' WHERE actor_id = '204';
UPDATE ACTOR SET last_name = 'Carnal' WHERE actor_id = '204';
UPDATE ACTOR SET first_name = 'Pablo', last_name = 'Canijote' WHERE actor_id = 204;

DELETE FROM actor WHERE actor_id = 204;

use sakila;

delimiter $$
create procedure mostrar_actores()
begin
create view actores_vw as select concat(first_name,' ',last_name) as nombres_actores, actor_id from actor;

select * from actores_vw LIMIT 24;

drop view actores_vw;
end $$
delimiter ;

call mostrar_actores();

drop procedure mostrar_actores;


-- SEGUNDO SP


select concat (first_name,' ', last_name) as nombres_clientes, email from customer
where first_name like 'A%';

delimiter $$
create procedure filtrado_actor(in inicial varchar(50))
begin
create view filtrado_vw as select first_name, last_name, actor_id from actor;


select concat(first_name, ' ',last_name) as nombres_actores, actor_id from filtrado_vw
where first_name like concat(inicial, '%') LIMIT 24;


drop view filtrado_vw;
end $$
delimiter ;


call filtrado_actor('P');

drop procedure filtrado_actor;


----------------------
use sakila;


select * from customer
order by customer_id desc;

INSERT INTO customer(first_name, last_name, email,store_id,address_id) VALUES('','','',1,10);
UPDATE customer SET first_name = "1", last_name = "2", email="3" WHERE customer_id = 608;
DELETE FROM customer WHERE customer_id = 608;

delimiter $$
create procedure mostrar_clientes()
begin
create view clientes_vw as select concat(first_name,' ',last_name) as nombres_clientes  , email, customer_id from customer;

select * from clientes_vw LIMIT 24;

drop view clientes_vw;
end $$
delimiter ;

call mostrar_clientes();

drop procedure mostrar_clientes;


-- SEGUNDO SP


select concat (first_name,' ', last_name) as nombres_clientes, email from customer
where first_name like 'A%';

delimiter $$
create procedure filtrado_cliente(in inicial varchar(50))
begin
create view filtrado_vw as select first_name, last_name, email, customer_id from customer;


select concat(first_name, ' ',last_name) as nombres_clientes, email, customer_id from filtrado_vw
where first_name like concat(inicial, '%') LIMIT 24;


drop view filtrado_vw;
end $$
delimiter ;


call filtrado_cliente('P');

drop procedure filtrado_cliente;

-------------------------------------------------------------------------
SELECT * FROM sakila.staff;

DESCRIBE STAFF;
INSERT INTO staff(first_name, last_name, username, password, email, address_id, store_id) VALUES('Lui','gi','Lu','Luigi','lui@gi.ma',9,1);
UPDATE STAFF SET first_name = "Gustavo", last_name = "Perroni", username = "Guspe", password = "123", email = "hola@peru.pe" WHERE staff_id = 7;
DELETE FROM STAFF WHERE staff_id =5;

delimiter $$
create procedure mostrar_staff()
begin
create view staff_vw as select concat(first_name,' ',last_name) as nombres_staff, email, staff_id from staff;

select * from staff_vw LIMIT 24;

drop view staff_vw;
end $$
delimiter ;

call mostrar_staff();

drop procedure mostrar_staff;


-- SEGUNDO SP


select concat (first_name,' ', last_name) as nombres_clientes, email from customer
where first_name like 'A%';

delimiter $$
create procedure filtrado_staff(in inicial varchar(50))
begin
create view filtrado_vw as select first_name, last_name, email, staff_id from staff;


select concat(first_name, ' ',last_name) as nombres_staff, email, staff_id from filtrado_vw
where first_name like concat(inicial, '%') LIMIT 24;


drop view filtrado_vw;
end $$
delimiter ;


call filtrado_staff('L');

drop procedure filtrado_staff;


--------------------------

SELECT * FROM staff WHERE username = "Guspe" && password = 123;

delimiter $$
create procedure validacion_staff(IN usuario VARCHAR(50), IN contra VARCHAR(50))
begin
	DECLARE validado BOOL;
	DECLARE num INT;
	SELECT COUNT(*) INTO num FROM staff WHERE username = usuario AND password = contra;
    
    IF num > 0 THEN
		SET validado = TRUE;
	ELSE
		SET validado = FALSE;
	END IF;
    
    SELECT validado;
end $$
delimiter ;

call validacion_staff("Guspe","123");

drop procedure validacion_staff;





-- No necesario para insert, delete o update
-- AÑADIR UN TRIGGER PARA BORRAR EL ALQUILER ANTERIOR
-- O IMPLEMENTAR ALQUILADO EN INVENTARIO Y USAR UN TRIGGER PARA ACTIVAR O DESACTIVAR CADA QUE SE DEVUELVE UNA PELICULA

-- Boton para cambiar entre catalogo de pelis y todas las disponibles para alquilar





-- Missing sql statement:

--Nito alterar rental
ALTER TABLE rental ADD COLUMN alquilado bool DEFAULT FALSE