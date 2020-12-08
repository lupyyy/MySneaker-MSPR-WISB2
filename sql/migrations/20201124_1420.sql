CREATE TABLE `modele` (
  `modele_id` int,
  `nom` varchar(64),
  `date` datetime,
  `prix` decimal,
  PRIMARY KEY (`modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `appartient` (
  `marque_id` int,
  `modele_id` int,
  PRIMARY KEY (`marque_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `marque` (
  `marque_id` int,
  `nom` varchar(64),
  `histoire` text,
  PRIMARY KEY (`marque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `souhaite` (
  `user_id` int,
  `modele_id` int,
  PRIMARY KEY (`user_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `possede` (
  `user_id` int,
  `modele_id` int,
  PRIMARY KEY (`user_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `utilisateur` (
  `user_id` int,
  `pseudo` varchar(64),
  `mail` varchar(128),
  `mdp` varchar(256),
  `admin` int,
  `created_at` date,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `appartient` ADD FOREIGN KEY (`modele_id`) REFERENCES `modele` (`modele_id`) ON DELETE CASCADE;
ALTER TABLE `appartient` ADD FOREIGN KEY (`marque_id`) REFERENCES `marque` (`marque_id`) ON DELETE CASCADE;
ALTER TABLE `souhaite` ADD FOREIGN KEY (`modele_id`) REFERENCES `modele` (`modele_id`) ON DELETE CASCADE;
ALTER TABLE `souhaite` ADD FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`) ON DELETE CASCADE;
ALTER TABLE `possede` ADD FOREIGN KEY (`modele_id`) REFERENCES `modele` (`modele_id`) ON DELETE CASCADE;
ALTER TABLE `possede` ADD FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`) ON DELETE CASCADE;