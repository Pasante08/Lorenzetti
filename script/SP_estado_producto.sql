DROP PROCEDURE IF EXISTS estado_producto;
DELIMITER //
CREATE PROCEDURE estado_producto(IN id INT, IN status INT)
BEGIN
UPDATE productosistema SET estado = status WHERE idProducto = id;
SELECT @vol:=voltaje_id, @col:=color_id, @product:=producto_id FROM productosistema WHERE idProducto = id;
	CASE
		WHEN @vol = 0 AND @col = 0 THEN
			UPDATE producto SET estado = status WHERE idProducto = @product;
		WHEN @vol = 0 AND @col != 0 THEN
			UPDATE producto SET estado = status WHERE idProducto = @product;
		WHEN @vol != 0 AND @col = 0 THEN
			UPDATE producto_voltaje SET estado = status WHERE producto_id = @product AND voltaje_id = @vol;
			SELECT @pv:=COUNT(*) AS total FROM productosistema WHERE producto_id = @product AND estado != status;
				IF @pv != 0 THEN
					IF @pv = 1 THEN
						UPDATE producto_voltaje SET estado = 1 WHERE producto_id = @product AND voltaje_id = @vol;
						UPDATE producto SET estado = status WHERE idProducto = @product;
					ELSE
						UPDATE producto_voltaje SET estado = 1 WHERE producto_id = @product AND voltaje_id = @vol;
					END IF;
					UPDATE producto_voltaje SET estado = status WHERE producto_id = @product AND voltaje_id = @vol;
                ELSE
					UPDATE producto SET estado = status WHERE idProducto = @product;
				END IF;
		WHEN @vol != 0 AND @col != 0 THEN
            UPDATE producto_color SET estado = status WHERE producto_id = @product AND color_id = @col;
            SELECT @pa:=COUNT(pc.idProductoColor) AS total FROM producto_color AS pc
			INNER JOIN productosistema AS ps ON ps.color_id = pc.color_id
			WHERE ps.voltaje_id = @vol AND ps.producto_id = @product AND ps.estado = 1;
            IF @pa = 0 THEN
				UPDATE producto_voltaje SET estado = 0 WHERE producto_id = @product AND voltaje_id = @vol;
			ELSE
				UPDATE producto_voltaje SET estado = 1 WHERE producto_id = @product AND voltaje_id = @vol;
			END IF;
	END CASE;
END //