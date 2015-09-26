-- MySQL Script generated by MySQL Workbench
-- 09/26/15 18:30:28
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema adeies_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema adeies_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `adeies_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `adeies_db` ;

-- -----------------------------------------------------
-- Table `adeies_db`.`geniki_dieuthinsi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`geniki_dieuthinsi` (
  `genikidid` INT NOT NULL AUTO_INCREMENT ,
  `gdname` VARCHAR(255) NULL ,
  PRIMARY KEY (`genikidid`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`dieuthinsi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`dieuthinsi` (
  `dieuthinsiid` INT NOT NULL AUTO_INCREMENT ,
  `dname` VARCHAR(255) NULL ,
  `genikidid` INT NULL ,
  PRIMARY KEY (`dieuthinsiid`)  ,
  INDEX `gdid_idx` (`genikidid` ASC)  ,
  CONSTRAINT `gdid_fk`
    FOREIGN KEY (`genikidid`)
    REFERENCES `adeies_db`.`geniki_dieuthinsi` (`genikidid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`tmima`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`tmima` (
  `tmimaid` INT NOT NULL AUTO_INCREMENT ,
  `tmname` VARCHAR(255) NULL ,
  `dieuthinsiid` INT NULL ,
  PRIMARY KEY (`tmimaid`)  ,
  INDEX `did_idx` (`dieuthinsiid` ASC)  ,
  CONSTRAINT `did_fk`
    FOREIGN KEY (`dieuthinsiid`)
    REFERENCES `adeies_db`.`dieuthinsi` (`dieuthinsiid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`idiotites`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`idiotites` (
  `idiotita_id` INT NOT NULL AUTO_INCREMENT ,
  `idname` VARCHAR(255) NULL ,
  PRIMARY KEY (`idiotita_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`ypallhlos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`ypallhlos` (
  `ypallhlosid` INT NOT NULL AUTO_INCREMENT ,
  `genikidid` INT NULL ,
  `dieuthinsiid` INT NULL ,
  `tmimaid` INT NULL ,
  `onoma` VARCHAR(255) NULL ,
  `epitheto` VARCHAR(255) NULL ,
  `max_adeies` VARCHAR(255) NULL ,
  `fylo` TINYINT(1) NULL ,
  `idiotita_id` INT NULL ,
  `ypoloipo_adeion_trexon` INT NULL ,
  `ypoloipo_adeion_palio` INT NULL ,
  `username` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  PRIMARY KEY (`ypallhlosid`)  ,
  INDEX `gdid_idx` (`genikidid` ASC)  ,
  INDEX `did_idx` (`dieuthinsiid` ASC)  ,
  INDEX `tmid_idx` (`tmimaid` ASC)  ,
  INDEX `idiotita_id_idx` (`idiotita_id` ASC)  ,
  CONSTRAINT `gdid_fk2`
    FOREIGN KEY (`genikidid`)
    REFERENCES `adeies_db`.`geniki_dieuthinsi` (`genikidid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `did_fk2`
    FOREIGN KEY (`dieuthinsiid`)
    REFERENCES `adeies_db`.`dieuthinsi` (`dieuthinsiid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `tmid_fk2`
    FOREIGN KEY (`tmimaid`)
    REFERENCES `adeies_db`.`tmima` (`tmimaid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idiotita_id_fk`
    FOREIGN KEY (`idiotita_id`)
    REFERENCES `adeies_db`.`idiotites` (`idiotita_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`typos_adeias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`typos_adeias` (
  `typos_id` INT NOT NULL AUTO_INCREMENT ,
  `typosname` VARCHAR(255) NULL ,
  PRIMARY KEY (`typos_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`katastash`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`katastash` (
  `katastasi_id` INT NOT NULL AUTO_INCREMENT ,
  `katname` VARCHAR(255) NULL ,
  PRIMARY KEY (`katastasi_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`adeies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`adeies` (
  `adeia_id` INT NOT NULL AUTO_INCREMENT ,
  `ypallhlosid` INT NULL ,
  `typos_id` INT NULL ,
  `date_submitted` DATETIME NULL ,
  `date_starts` DATETIME NULL ,
  `date_ends` DATETIME NULL ,
  `ar_adeiwn` INT NULL ,
  `katastasi_id` INT NULL DEFAULT 0 ,
  `yp_dieuthinti` TINYINT(1) NULL DEFAULT 0 ,
  `yp_proistamenou` TINYINT(1) NULL DEFAULT 0 ,
  `yp_gen_dieuthinti` TINYINT(1) NULL DEFAULT 0 ,
  `yp_ektelestikou` TINYINT(1) NULL DEFAULT 0 ,
  `yp_perifereiarxh` TINYINT(1) NULL DEFAULT 0 ,
  PRIMARY KEY (`adeia_id`)  ,
  INDEX `ypid_idx` (`ypallhlosid` ASC)  ,
  INDEX `typos_id_idx` (`typos_id` ASC)  ,
  INDEX `kat_id_idx` (`katastasi_id` ASC)  ,
  CONSTRAINT `ypid_fk`
    FOREIGN KEY (`ypallhlosid`)
    REFERENCES `adeies_db`.`ypallhlos` (`ypallhlosid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `typos_id_fk`
    FOREIGN KEY (`typos_id`)
    REFERENCES `adeies_db`.`typos_adeias` (`typos_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `kat_id_fk`
    FOREIGN KEY (`katastasi_id`)
    REFERENCES `adeies_db`.`katastash` (`katastasi_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`paidia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`paidia` (
  `paidiid` INT NOT NULL ,
  `ypallhlosid` INT NULL ,
  `birthday` DATETIME NULL ,
  PRIMARY KEY (`paidiid`)  ,
  INDEX `ypid_idx` (`ypallhlosid` ASC)  ,
  CONSTRAINT `ypid_fk2`
    FOREIGN KEY (`ypallhlosid`)
    REFERENCES `adeies_db`.`ypallhlos` (`ypallhlosid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adeies_db`.`files`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adeies_db`.`files` (
  `file_id` INT NOT NULL AUTO_INCREMENT ,
  `filename` VARCHAR(255) NULL ,
  `filepath` VARCHAR(255) NULL ,
  `adeia_id` INT NULL ,
  PRIMARY KEY (`file_id`)  ,
  INDEX `adeia_id_file_idx` (`adeia_id` ASC)  ,
  CONSTRAINT `adeia_id_file`
    FOREIGN KEY (`adeia_id`)
    REFERENCES `adeies_db`.`adeies` (`adeia_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `adeies_db`.`geniki_dieuthinsi`
-- -----------------------------------------------------
START TRANSACTION;
USE `adeies_db`;
INSERT INTO `adeies_db`.`geniki_dieuthinsi` (`genikidid`, `gdname`) VALUES (0, 'Εσωτερικής Λειτουργίας');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adeies_db`.`dieuthinsi`
-- -----------------------------------------------------
START TRANSACTION;
USE `adeies_db`;
INSERT INTO `adeies_db`.`dieuthinsi` (`dieuthinsiid`, `dname`, `genikidid`) VALUES (0, 'Διαφάνειας & Ηλεκτρονικής Διακυβέρνησης', 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adeies_db`.`tmima`
-- -----------------------------------------------------
START TRANSACTION;
USE `adeies_db`;
INSERT INTO `adeies_db`.`tmima` (`tmimaid`, `tmname`, `dieuthinsiid`) VALUES (0, 'Πληροφορικής', 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adeies_db`.`idiotites`
-- -----------------------------------------------------
START TRANSACTION;
USE `adeies_db`;
INSERT INTO `adeies_db`.`idiotites` (`idiotita_id`, `idname`) VALUES (0, 'Υπάλληλος');
INSERT INTO `adeies_db`.`idiotites` (`idiotita_id`, `idname`) VALUES (1, 'Προϊστάμενος');
INSERT INTO `adeies_db`.`idiotites` (`idiotita_id`, `idname`) VALUES (2, 'Διευθυντής');
INSERT INTO `adeies_db`.`idiotites` (`idiotita_id`, `idname`) VALUES (3, 'Γενικός Διευθυντής');
INSERT INTO `adeies_db`.`idiotites` (`idiotita_id`, `idname`) VALUES (4, 'Εκτελεστικός Γραμματέας');
INSERT INTO `adeies_db`.`idiotites` (`idiotita_id`, `idname`) VALUES (5, 'Περιφερειάρχης');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adeies_db`.`ypallhlos`
-- -----------------------------------------------------
START TRANSACTION;
USE `adeies_db`;
INSERT INTO `adeies_db`.`ypallhlos` (`ypallhlosid`, `genikidid`, `dieuthinsiid`, `tmimaid`, `onoma`, `epitheto`, `max_adeies`, `fylo`, `idiotita_id`, `ypoloipo_adeion_trexon`, `ypoloipo_adeion_palio`, `username`, `password`) VALUES (0, 0, 0, 0, 'Κωνσταντίνος', 'Ιωάννου', '7', 0, 0, 7, 7, 'ypallhlos', 'ypallhlos');
INSERT INTO `adeies_db`.`ypallhlos` (`ypallhlosid`, `genikidid`, `dieuthinsiid`, `tmimaid`, `onoma`, `epitheto`, `max_adeies`, `fylo`, `idiotita_id`, `ypoloipo_adeion_trexon`, `ypoloipo_adeion_palio`, `username`, `password`) VALUES (1, 0, 0, 0, 'Γεώργιος', 'Παπαγιάννης', '12', 0, 1, 12, 12, 'proistamenos', 'proistamenos');
INSERT INTO `adeies_db`.`ypallhlos` (`ypallhlosid`, `genikidid`, `dieuthinsiid`, `tmimaid`, `onoma`, `epitheto`, `max_adeies`, `fylo`, `idiotita_id`, `ypoloipo_adeion_trexon`, `ypoloipo_adeion_palio`, `username`, `password`) VALUES (2, 0, 0, 0, 'Ιωάννα', 'Καραγιαννίδου', '22', 1, 2, 22, 22, 'dieuthintis', 'dieuthintis');
INSERT INTO `adeies_db`.`ypallhlos` (`ypallhlosid`, `genikidid`, `dieuthinsiid`, `tmimaid`, `onoma`, `epitheto`, `max_adeies`, `fylo`, `idiotita_id`, `ypoloipo_adeion_trexon`, `ypoloipo_adeion_palio`, `username`, `password`) VALUES (3, 0, 0, 0, 'Μαρία', 'Πετρίδου', '25', 1, 3, 25, 25, 'genikosd', 'genikosd');
INSERT INTO `adeies_db`.`ypallhlos` (`ypallhlosid`, `genikidid`, `dieuthinsiid`, `tmimaid`, `onoma`, `epitheto`, `max_adeies`, `fylo`, `idiotita_id`, `ypoloipo_adeion_trexon`, `ypoloipo_adeion_palio`, `username`, `password`) VALUES (4, 0, 0, 0, 'Ηρακλής', 'Γεωργιάδης', '35', 0, 4, 35, 35, 'ektelestikos', 'ektelestikos');
INSERT INTO `adeies_db`.`ypallhlos` (`ypallhlosid`, `genikidid`, `dieuthinsiid`, `tmimaid`, `onoma`, `epitheto`, `max_adeies`, `fylo`, `idiotita_id`, `ypoloipo_adeion_trexon`, `ypoloipo_adeion_palio`, `username`, `password`) VALUES (5, 0, 0, 0, 'Πέτρος', 'Γιαννόπουλος', '45', 0, 5, 45, 45, 'perifereiarxhs', 'perifereiarxhs');
INSERT INTO `adeies_db`.`ypallhlos` (`ypallhlosid`, `genikidid`, `dieuthinsiid`, `tmimaid`, `onoma`, `epitheto`, `max_adeies`, `fylo`, `idiotita_id`, `ypoloipo_adeion_trexon`, `ypoloipo_adeion_palio`, `username`, `password`) VALUES (6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adeies_db`.`typos_adeias`
-- -----------------------------------------------------
START TRANSACTION;
USE `adeies_db`;
INSERT INTO `adeies_db`.`typos_adeias` (`typos_id`, `typosname`) VALUES (0, 'Κανονική');
INSERT INTO `adeies_db`.`typos_adeias` (`typos_id`, `typosname`) VALUES (1, 'Σχολική');
INSERT INTO `adeies_db`.`typos_adeias` (`typos_id`, `typosname`) VALUES (2, 'Τηλεφωνική');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adeies_db`.`katastash`
-- -----------------------------------------------------
START TRANSACTION;
USE `adeies_db`;
INSERT INTO `adeies_db`.`katastash` (`katastasi_id`, `katname`) VALUES (0, 'Υπο αξιολόγηση');
INSERT INTO `adeies_db`.`katastash` (`katastasi_id`, `katname`) VALUES (1, 'Εγκρίθηκε');
INSERT INTO `adeies_db`.`katastash` (`katastasi_id`, `katname`) VALUES (2, 'Απορρίφθηκε');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adeies_db`.`paidia`
-- -----------------------------------------------------
START TRANSACTION;
USE `adeies_db`;
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (0, 0, '1999-09-06');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (1, 0, '2008-06-21');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (2, 1, '2003-03-14');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (3, 2, '2005-03-12');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (4, 2, '1990-02-19');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (5, 3, '1998-06-12');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (6, 4, '1992-08-25');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (7, 4, '1995-12-31');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (8, 5, '2003-05-30');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (9, 6, '1994-03-06');
INSERT INTO `adeies_db`.`paidia` (`paidiid`, `ypallhlosid`, `birthday`) VALUES (10, 6, '2002-05-24');

COMMIT;

