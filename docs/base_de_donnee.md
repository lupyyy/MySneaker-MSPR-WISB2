# Conception de la bdd

![](bdd/Modeles.svg)

**MODELE** (<ins>modele_id</ins>, nom, date, prix)  
**MARQUE** (<ins>marque_id</ins>, nom, histoire, _modele_id_)  
**souhaite** (<ins>_user_id_</ins>, <ins>_modele_id_</ins>)  
**possede** (<ins>_user_id_</ins>, <ins>_modele_id_</ins>)  
**UTILISATEUR** (<ins>user_id</ins>, pseudo, mail, mdp, admin, created_at)

Voir [le dictionnaire de donnée](./bdd/Modeles_data_dict.md)