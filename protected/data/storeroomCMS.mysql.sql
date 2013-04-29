SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `storeroom` DEFAULT CHARACTER SET latin1 ;
USE `storeroom` ;

-- -----------------------------------------------------
-- Table `storeroom`.`admins`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`admins` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `pwhash` VARCHAR(45) NOT NULL ,
  `lastlogin` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`attendants`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`attendants` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `pwhash` VARCHAR(45) NOT NULL ,
  `lastlogin` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`instructors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`instructors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`tas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`tas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `semester` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`courses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`courses` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `semester` VARCHAR(6) NOT NULL ,
  `year` YEAR NOT NULL ,
  `section` INT(11) NOT NULL ,
  `instructors_id` INT(11) NOT NULL ,
  `tas_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_courses_instructors1_idx` (`instructors_id` ASC) ,
  INDEX `fk_courses_tas1_idx` (`tas_id` ASC) ,
  CONSTRAINT `fk_courses_instructors1`
    FOREIGN KEY (`instructors_id` )
    REFERENCES `storeroom`.`instructors` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_tas1`
    FOREIGN KEY (`tas_id` )
    REFERENCES `storeroom`.`tas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`itemcategories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`itemcategories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`itemimage`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`itemimage` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `filename` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `itemcategories_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_itemimage_itemcategories1_idx` (`itemcategories_id` ASC) ,
  CONSTRAINT `fk_itemimage_itemcategories1`
    FOREIGN KEY (`itemcategories_id` )
    REFERENCES `storeroom`.`itemcategories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`kits`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`kits` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `storeroomid` VARCHAR(20) NOT NULL ,
  `itemimage_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_kits_itemimage1_idx` (`itemimage_id` ASC) ,
  CONSTRAINT `fk_kits_itemimage1`
    FOREIGN KEY (`itemimage_id` )
    REFERENCES `storeroom`.`itemimage` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`items`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`items` (
  `id` INT(11) NOT NULL ,
  `storeroomid` VARCHAR(20) NULL DEFAULT NULL ,
  `niunumber` INT(11) NULL DEFAULT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `po` INT(11) NULL DEFAULT NULL ,
  `cost` DECIMAL(10,0) NULL DEFAULT NULL ,
  `purchasedate` DATE NULL DEFAULT NULL ,
  `added` DATETIME NOT NULL ,
  `kits_id` INT(10) NULL DEFAULT NULL ,
  `itemcategories_id` INT(11) NOT NULL ,
  `itemimage_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_items_kits1_idx` (`kits_id` ASC) ,
  INDEX `fk_items_itemcategories1_idx` (`itemcategories_id` ASC) ,
  INDEX `fk_items_itemimage1_idx` (`itemimage_id` ASC) ,
  CONSTRAINT `fk_items_kits1`
    FOREIGN KEY (`kits_id` )
    REFERENCES `storeroom`.`kits` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_itemcategories1`
    FOREIGN KEY (`itemcategories_id` )
    REFERENCES `storeroom`.`itemcategories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_itemimage1`
    FOREIGN KEY (`itemimage_id` )
    REFERENCES `storeroom`.`itemimage` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`in`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`in` (
  `items_id` INT(11) NOT NULL ,
  PRIMARY KEY (`items_id`) ,
  CONSTRAINT `fk_in_items1`
    FOREIGN KEY (`items_id` )
    REFERENCES `storeroom`.`items` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`students` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `semester` VARCHAR(45) NOT NULL ,
  `year` INT(11) NOT NULL ,
  `cleared` TEXT NULL DEFAULT NULL ,
  `image` VARCHAR(245) NULL DEFAULT NULL ,
  `courses_id` INT(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_students_courses1_idx` (`courses_id` ASC) ,
  CONSTRAINT `fk_students_courses1`
    FOREIGN KEY (`courses_id` )
    REFERENCES `storeroom`.`courses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`incidents`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`incidents` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `createdon` DATETIME NOT NULL ,
  `note` VARCHAR(200) NULL DEFAULT NULL ,
  `items_id` INT(11) NOT NULL ,
  `attendants_id` INT(11) NOT NULL ,
  `students_id` INT(11) NOT NULL ,
  `kits_id` INT(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_incidents_items1_idx` (`items_id` ASC) ,
  INDEX `fk_incidents_attendants1_idx` (`attendants_id` ASC) ,
  INDEX `fk_incidents_students1_idx` (`students_id` ASC) ,
  INDEX `fk_incidents_kits1_idx` (`kits_id` ASC) ,
  CONSTRAINT `fk_incidents_items1`
    FOREIGN KEY (`items_id` )
    REFERENCES `storeroom`.`items` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidents_attendants1`
    FOREIGN KEY (`attendants_id` )
    REFERENCES `storeroom`.`attendants` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidents_students1`
    FOREIGN KEY (`students_id` )
    REFERENCES `storeroom`.`students` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidents_kits1`
    FOREIGN KEY (`kits_id` )
    REFERENCES `storeroom`.`kits` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`inhistory`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`inhistory` (
  `indate` DATETIME NOT NULL ,
  `items_id` INT(11) NOT NULL ,
  `attendants_id` INT(11) NOT NULL ,
  `students_id` INT(11) NOT NULL ,
  PRIMARY KEY (`items_id`) ,
  INDEX `fk_inhistory_attendants1_idx` (`attendants_id` ASC) ,
  INDEX `fk_inhistory_students1_idx` (`students_id` ASC) ,
  CONSTRAINT `fk_inhistory_items1`
    FOREIGN KEY (`items_id` )
    REFERENCES `storeroom`.`items` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inhistory_attendants1`
    FOREIGN KEY (`attendants_id` )
    REFERENCES `storeroom`.`attendants` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inhistory_students1`
    FOREIGN KEY (`students_id` )
    REFERENCES `storeroom`.`students` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`notes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`notes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(200) NULL DEFAULT NULL ,
  `createdon` DATETIME NOT NULL ,
  `items_id` INT(11) NOT NULL ,
  `attendants_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`, `items_id`) ,
  INDEX `fk_notes_items1_idx` (`items_id` ASC) ,
  CONSTRAINT `fk_notes_items1`
    FOREIGN KEY (`items_id` )
    REFERENCES `storeroom`.`items` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`out`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`out` (
  `items_id` INT(11) NOT NULL ,
  PRIMARY KEY (`items_id`) ,
  CONSTRAINT `fk_out_items1`
    FOREIGN KEY (`items_id` )
    REFERENCES `storeroom`.`items` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`outhistory`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`outhistory` (
  `outdate` DATETIME NOT NULL ,
  `items_id` INT(11) NOT NULL ,
  `attendants_id` INT(11) NOT NULL ,
  `students_id` INT(11) NOT NULL ,
  PRIMARY KEY (`items_id`) ,
  INDEX `fk_outhistory_attendants1_idx` (`attendants_id` ASC) ,
  INDEX `fk_outhistory_students1_idx` (`students_id` ASC) ,
  CONSTRAINT `fk_outhistory_items1`
    FOREIGN KEY (`items_id` )
    REFERENCES `storeroom`.`items` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_outhistory_attendants1`
    FOREIGN KEY (`attendants_id` )
    REFERENCES `storeroom`.`attendants` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_outhistory_students1`
    FOREIGN KEY (`students_id` )
    REFERENCES `storeroom`.`students` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`outofservice`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`outofservice` (
  `createdon` DATETIME NOT NULL ,
  `note` VARCHAR(200) NULL DEFAULT NULL ,
  `items_id` INT(11) NOT NULL ,
  `attendants_id` INT(11) NOT NULL ,
  INDEX `fk_outofservice_items1_idx` (`items_id` ASC) ,
  INDEX `fk_outofservice_attendants1_idx` (`attendants_id` ASC) ,
  CONSTRAINT `fk_outofservice_items1`
    FOREIGN KEY (`items_id` )
    REFERENCES `storeroom`.`items` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_outofservice_attendants1`
    FOREIGN KEY (`attendants_id` )
    REFERENCES `storeroom`.`attendants` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `storeroom`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `storeroom`.`user` (
  `user_id` INT(10) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `image` VARCHAR(245) NULL DEFAULT NULL ,
  `lastlogin` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

USE `storeroom` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
