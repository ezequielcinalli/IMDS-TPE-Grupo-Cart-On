CREATE DATABASE imds_tpe;

CREATE TABLE `imds_tpe`.`accepted_material` ( `id` INT NOT NULL AUTO_INCREMENT , `material` VARCHAR(50) NOT NULL , `deliveryMethod` VARCHAR(50) NOT NULL , `image` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 


