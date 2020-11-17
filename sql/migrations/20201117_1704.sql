CREATE DATABASE IF NOT EXISTS `mysneakers` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mysneakers`;

CREATE TABLE `MODELE` (
  `modele_id` VARCHAR(42),
  `nom` VARCHAR(42),
  `date` VARCHAR(42),
  `prix` VARCHAR(42),
  PRIMARY KEY (`modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MARQUE` (
  `marque_id` VARCHAR(42),
  `nom` VARCHAR(42),
  `histoire` VARCHAR(42),
  `modele_id` VARCHAR(42),
  PRIMARY KEY (`marque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SOUHAITE` (
  `user_id` VARCHAR(42),
  `modele_id` VARCHAR(42),
  PRIMARY KEY (`user_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `POSSEDE` (
  `user_id` VARCHAR(42),
  `modele_id` VARCHAR(42),
  PRIMARY KEY (`user_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `UTILISATEUR` (
  `user_id` VARCHAR(42),
  `pseudo` VARCHAR(42),
  `mail` VARCHAR(42),
  `mdp` VARCHAR(42),
  `admin` VARCHAR(42),
  `created_at` VARCHAR(42),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `MARQUE` ADD FOREIGN KEY (`modele_id`) REFERENCES `MODELE` (`modele_id`);
ALTER TABLE `SOUHAITE` ADD FOREIGN KEY (`modele_id`) REFERENCES `MODELE` (`modele_id`);
ALTER TABLE `SOUHAITE` ADD FOREIGN KEY (`user_id`) REFERENCES `UTILISATEUR` (`user_id`);
ALTER TABLE `POSSEDE` ADD FOREIGN KEY (`modele_id`) REFERENCES `MODELE` (`modele_id`);
ALTER TABLE `POSSEDE` ADD FOREIGN KEY (`user_id`) REFERENCES `UTILISATEUR` (`user_id`);