CREATE DEFINER=`root`@`localhost` FUNCTION `fGetImageId`(`id` VARCHAR(20), `img_type` VARCHAR(20)) RETURNS varchar(255) CHARSET latin1
BEGIN

DECLARE output VARCHAR(255);
	SET output =( SELECT id   FROM images where ref_id = LPAD(id ,10,0) and type = img_type LIMIT 1 ) ;
RETURN output;
END
