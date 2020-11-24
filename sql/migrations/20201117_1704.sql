CREATE TABLE `modele` (
  `modele_id` VARCHAR(42),
  `nom` VARCHAR(42),
  `date` VARCHAR(42),
  `prix` VARCHAR(42),
  PRIMARY KEY (`modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `marque` (
  `marque_id` VARCHAR(42),
  `nom` VARCHAR(42),
  `histoire` VARCHAR(42),
  `modele_id` VARCHAR(42),
  PRIMARY KEY (`marque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `souhaite` (
  `user_id` VARCHAR(42),
  `modele_id` VARCHAR(42),
  PRIMARY KEY (`user_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `possede` (
  `user_id` VARCHAR(42),
  `modele_id` VARCHAR(42),
  PRIMARY KEY (`user_id`, `modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `utilisateur` (
  `user_id` VARCHAR(42),
  `pseudo` VARCHAR(42),
  `mail` VARCHAR(42),
  `mdp` VARCHAR(42),
  `admin` VARCHAR(42),
  `created_at` VARCHAR(42),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `marque` ADD FOREIGN KEY (`modele_id`) REFERENCES `modele` (`modele_id`);
ALTER TABLE `souhaite` ADD FOREIGN KEY (`modele_id`) REFERENCES `modele` (`modele_id`);
ALTER TABLE `souhaite` ADD FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`);
ALTER TABLE `possede` ADD FOREIGN KEY (`modele_id`) REFERENCES `modele` (`modele_id`);
ALTER TABLE `possede` ADD FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`);