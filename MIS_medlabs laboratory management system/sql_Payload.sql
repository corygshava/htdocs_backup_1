-- creates the doctors' table (assumes that you have access to the hospital's database) --

CREATE TABLE `medlabs`.`doctors` ( `DoctorId` INT NOT NULL AUTO_INCREMENT , `DoctorName` TEXT NOT NULL , `DoctorSerial` VARCHAR(16) NOT NULL , `password` VARCHAR(25) NOT NULL , PRIMARY KEY (`DoctorId`)) ENGINE = InnoDB;