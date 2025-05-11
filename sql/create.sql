
CREATE TABLE IF NOT EXISTS `dishTypes` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS `dishes` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `price` INT NOT NULL,
  `isActive` TINYINT(1) NOT NULL DEFAULT 1,
  `dishTypeId` INT UNSIGNED NOT NULL,
  INDEX (`dishTypeId`),
  CONSTRAINT `fk_dishes_dishTypes`
    FOREIGN KEY (`dishTypeId`)
    REFERENCES `dishTypes`(`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
