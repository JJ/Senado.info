CREATE TABLE `sena2`.`personas` (
`nombre` VARCHAR( 64 ) NOT NULL ,
`apellidos` VARCHAR( 128 ) NOT NULL ,
`grupo` VARCHAR( 32 ) NOT NULL ,
`origen` ENUM( 'electo', 'designado' ) NOT NULL ,
`zona` VARCHAR( 64 ) NOT NULL ,
`partido` VARCHAR( 16 ) NOT NULL ,
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
)