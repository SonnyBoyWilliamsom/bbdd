/*select producto
from productos
where productos.id_proveedor = (select proveedores.id from proveedores where proveedores.proveedor = "Fnac")*/

/*select distinct proveedores.proveedor, productos.producto from productos
inner join proveedores
on productos.id_proveedor = proveedores.id
where productos.producto = "lavadora"*/

/*select proveedor from proveedores
where id in (select distinct productos.id_proveedor from productos where producto= "lavadora") 
Con la preposicion 'in' podemos establecer una serie de valores que pueden otorgarse a un campo en la sentencia WHERE
*/
UPDATE productos SET producto = CONCAT('El más barato!!!! - ', producto) WHERE precio = (select MIN(precio) from productos);
DELETE FROM proveedores WHERE id = 5;
select * from productos










