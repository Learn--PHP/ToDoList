CREATE DATABASE todolist;
CREATE  TABLE `todolist`.`todolist` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NOT NULL ,
  `deadline` DATE NOT NULL ,
  `content` VARCHAR(200) NOT NULL ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
