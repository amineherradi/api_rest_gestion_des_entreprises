# API Rest - Gestion des entreprises
Service Web (API REST) permettant de gérer (voir, ajouter, modifier, supprimer) plusieurs types d'entreprises mais aussi de calculer l'impôt dû pour chacune d'entre elles.

Outil de test: Postman

Les routes (en attendant la réécriture des URL):
  - REQUEST METHOD GET:
    - /index.php?entity={controllerName}&action={controllerMethodName}&id={id}
    - ex. /index.php?entity=AutoEntreprise&action=detail&id=2
    - ex. /index.php?entity=AutoEntreprise&action=all
    - Vous retourne aussi le résultat calculé de l'impôt par type d'entreprise
    - Possibilité d'ajouter une class de TestModel et une class de TestController avec un attribut 
      $chiffaire_affaire bien qu'il soit déjà présent dans la classe Entreprise.
  
  
  - REQUEST METHOD POST:
    - /index.php?entity={controllerName}&action={controllerMethodName}
    - ex. /index.php?entity=AutoEntreprise&action=add

  - REQUEST METHOD PATCH:
    - /index.php?entity={controllerName}&action={controllerMethodName}&id={id}
    - ex. /index.php?entity=AutoEntreprise&action=update&id=2
  
  - REQUEST METHOD DELETE:
    - /index.php?entity={controllerName}&action={controllerMethodName}&id={id}
    - ex. /index.php?entity=AutoEntreprise&action=delete&id=2

Installation:
  - Un fichier SQL est fournis et prêt à être ajouté à votre phpMyAdmin
    - Avant de l'importer, vous devez créer votre base données.
    - Il peut être ajouté part importation ou en faisant un copier coller de son contenu dans une requête SQL.
  
  - Pour l'installation du programme:
    - git clone git@github.com:amineherradi/api_rest_gestion_des_entreprises.git
  
  - Pour utiliser le programme:
    - Vous pouvez télécharger Postman
