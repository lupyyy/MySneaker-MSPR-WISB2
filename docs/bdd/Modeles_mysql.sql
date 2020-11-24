CREATE DATABASE IF NOT EXISTS `MODELES` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `MODELES`;

CREATE TABLE `MODELE` (
  `modele_id` int,
  `nom` varchar(64),
  `date` datetime,
  `prix` decimal,
  PRIMARY KEY (`modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `APPARTIENT` (
  `marque_id` int,
  `modele_id` int,
  PRIMARY KEY (`marque_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MARQUE` (
  `marque_id` int,
  `nom` varchar(64),
  `histoire` text,
  PRIMARY KEY (`marque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SOUHAITE` (
  `user_id` int,
  `modele_id` int,
  PRIMARY KEY (`user_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `POSSEDE` (
  `user_id` int,
  `modele_id` int,
  PRIMARY KEY (`user_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `UTILISATEUR` (
  `user_id` int,
  `pseudo` varchar(64),
  `mail` varchar(128),
  `mdp` varchar(256),
  `admin` int,
  `created_at` date,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `APPARTIENT` ADD FOREIGN KEY (`modele_id`) REFERENCES `MODELE` (`modele_id`);
ALTER TABLE `APPARTIENT` ADD FOREIGN KEY (`marque_id`) REFERENCES `MARQUE` (`marque_id`);
ALTER TABLE `SOUHAITE` ADD FOREIGN KEY (`modele_id`) REFERENCES `MODELE` (`modele_id`);
ALTER TABLE `SOUHAITE` ADD FOREIGN KEY (`user_id`) REFERENCES `UTILISATEUR` (`user_id`);
ALTER TABLE `POSSEDE` ADD FOREIGN KEY (`modele_id`) REFERENCES `MODELE` (`modele_id`);
ALTER TABLE `POSSEDE` ADD FOREIGN KEY (`user_id`) REFERENCES `UTILISATEUR` (`user_id`);