use sakila;


select * from customer;

delimiter $$
create procedure mostrar_clientes()
begin
create view clientes_vw as select concat(first_name,' ',last_name) as nombres_clientes  , email from customer;

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
create view filtrado_vw as select first_name, last_name, email from customer;


select concat(first_name, ' ',last_name) as nombres_clientes, email from filtrado_vw
where first_name like concat(inicial, '%') LIMIT 24;


drop view filtrado_vw;
end $$
delimiter ;


call filtrado_cliente('P');

drop procedure filtrado_cliente;

