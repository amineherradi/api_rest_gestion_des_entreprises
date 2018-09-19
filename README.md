# test_citiz
Service Web (API REST) permettant de gérer (voir, ajouter, modifier, supprimer) plusieurs types d'entreprises mais aussi de calculer l'impôt dû pour chacune d'entre elles.

Outil de test: Postman

Les routes (en attendant la réécriture des URL):
  - REQUEST METHOD GET:
    - /index.php?entity={controllerName}&action={controllerMethodName}&id={id}
    - ex. /index.php?entity=AutoEntreprise&action=detail&id=2
    - ex. /index.php?entity=AutoEntreprise&action=all
  
  - REQUEST METHOD POST:
    - /index.php?entity={controllerName}&action={controllerMethodName}&id={id}
    - ex. /index.php?entity=AutoEntreprise&action=update&id=2
    - ex. /index.php?entity=AutoEntreprise&action=add

  - REQUEST METHOD DELETE:
    - /index.php?entity={controllerName}&action={controllerMethodName}&id={id}
    - ex. /index.php?entity=AutoEntreprise&action=delete&id=2

@TODO - Features:
- Nettoyage des données d'hydratation des objets
- Vérification des valeurs passées au contructeur
- Vérification des injections url
- Retourner les codes HTTP en réponse aux requêtes
