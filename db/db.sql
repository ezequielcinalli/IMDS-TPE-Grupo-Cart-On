CREATE DATABASE imds_tpe;

CREATE TABLE `imds_tpe`.`accepted_material` ( `id` INT NOT NULL AUTO_INCREMENT , `material` VARCHAR(50) NOT NULL , `deliveryMethod` VARCHAR(50) NOT NULL , `image` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

CREATE TABLE `imds_tpe`.`retirement_request` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `lastname` VARCHAR(50) NOT NULL , `address` VARCHAR(50) NOT NULL , `phone` INT NOT NULL , `retirement_time` VARCHAR(50) NOT NULL , `volume_materials` VARCHAR(50) NOT NULL , `image` INT NULL , `completed` BOOLEAN NOT NULL DEFAULT FALSE, PRIMARY KEY (`id`)) ENGINE = InnoDB; 

