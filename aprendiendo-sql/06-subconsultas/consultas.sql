select * from usuarios where id in (select usuario_id from entradas);

select * from usuarios where id not in (select usuario_id from entradas);