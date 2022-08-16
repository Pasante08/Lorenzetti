DROP PROCEDURE IF EXISTS productos_mas_vendidos;
DELIMITER //
CREATE PROCEDURE productos_mas_vendidos()
BEGIN
    SELECT p.idProducto, p.nombre, p.ubicacion, p.precio, df.producto_id, SUM(df.cantidad) AS TotalVentas
    FROM detalle_factura AS df
    INNER JOIN productosistema AS PS
    ON PS.idProducto = df.producto_id
    INNER JOIN producto AS p
    ON p.idProducto = PS.producto_id
    GROUP BY df.producto_id
    ORDER BY SUM(df.cantidad) DESC
    LIMIT 0 , 5;
END
