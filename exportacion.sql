
-- -----------------------------------------------------
-- Table `M108_twitter`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `M108_twitter`.`categories` (
  `id_categories`  INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_categories`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `M108_twitter`.`tweets_has_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `M108_twitter`.`tweets_categories` (
  `id_tweets` INT NOT NULL,
  `id_categories` INT NOT NULL,
  PRIMARY KEY (`id_tweets`, `id_categories`),
  INDEX `fk_tweets_categories_categories` (`category_category_id` ASC),
  INDEX `fk_tweets_category_tweets` (`tweets_idtweets` ASC),
  CONSTRAINT `fk_tweets_has_category_tweets1`
    FOREIGN KEY (`tweets_idtweets`)
    REFERENCES `M108_twitter`.`tweets` (`idtweets`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tweets_has_category_category1`
    FOREIGN KEY (`category_category_id`)
    REFERENCES `M108_twitter`.`category` (`id_category`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
