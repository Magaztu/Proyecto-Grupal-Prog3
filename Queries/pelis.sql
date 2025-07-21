
-- QUERY PARA PROGRAMACIÓN WEB

delimiter $$
create procedure busqueda_titulo(in titulo_pelicula varchar(255))
begin
create view megasuperjoin_vw as select film.film_id, film.title, concat(film.length, ' minutos') as tiempo_total, category.name as categoria, film.description, rating from film
inner join film_category on film.film_id = film_category.film_id
inner join category on film_category.category_id = category.category_id;

select distinct * from megasuperjoin_vw
where title like concat(titulo_pelicula, '%') LIMIT 16;

drop view megasuperjoin_vw;

end $$
delimiter ;

call busqueda_titulo('E');

-- ACADEMY DINOSAUR
-- ACE GOLDFINGER
-- ADAPTATION HOLES
-- AFFAIR PREJUDICE
-- AFRICAN EGG
-- AGENT TRUMAN


drop procedure busqueda_titulo;

delimiter $$
create procedure busqueda_actores(in titulo_pelicula varchar(255))
begin
create view actores_vw as select film_actor.actor_id, concat(actor.first_name,' ',actor.last_name) as actores, film.title from film_actor
inner join actor on actor.actor_id = film_actor.actor_id
inner join film on film_actor.film_id = film.film_id;

select distinct * from actores_vw
where title = titulo_pelicula LIMIT 2;

drop view actores_vw;

end $$
delimiter ;

call busqueda_actores('AFRICAN EGG');

-- ACADEMY DINOSAUR
-- ACE GOLDFINGER
-- ADAPTATION HOLES
-- AFFAIR PREJUDICE
-- AFRICAN EGG
-- AGENT TRUMAN


drop procedure busqueda_actores;

drop view actores_vw;

select film_actor.actor_id, concat(actor.first_name,' ',actor.last_name) as actores from film_actor
inner join actor on actor.actor_id = film_actor.actor_id
inner join film on film_actor.film_id = film.film_id
where film.title = 'AGENT TRUMAN';


-- Qué tiene rentas
SELECT * FROM RENTAL where rental_id > 16000;
SELECT * FROM inventory;

INSERT INTO RENTAL(rental_date, inventory_id, customer_id, return_date,staff_id) VALUES('2001-09-10',2,'3','2001-10-10',1);