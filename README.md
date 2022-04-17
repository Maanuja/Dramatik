# dramatik

Un site développé avec Symfony pour mieux connaitre les kdramas à travers des fiches d'infos et des jeux.

Vous pouvez créer un compte user pour jouer ou créer des quizz, ajouter des critiques sur les dramas. Dans votre espace compte, vous retrouvez vos critiques et les quizz que vous avez créé (bientot vous aurez aussi l'historique de vos quizz).

L'admin gere le catalogue de drama et les genres associés, vérifie les infos des users et valide les quizz créés afin de les mettre en ligne.

Possibilité de faire des recherches (nom, genre, drama lié, quizz) sur les pages de répertoire de drama(catalogue et abcdaire) et de quizz.


Configuration 
Pour la meilleure ergonomie lors de votre utlisation du site:
    
      composer require symfony/webpack-encore-bundle
      
      yarn add bootstrap --dev
    
      yarn add @popperjs/core --dev

Pour se retrouver parmi les dramas et quizz :

La pagination

    composer require knplabs/knp-paginator-bundle

La recherche par ElasticSearch

 - avoir installé ElasticSearch: https://www.elastic.co/fr/downloads/elasticsearch
 
 - le lancer sur terminal avec la commande (s'assurer d'avoir le bon network.host et port dans elasticsearch.yml)
   - bin\elasticsearch.bat (Windows) ou  bin/elasticsearch (autre)
 - dans le projet, installé le bundle pour effectuer les requêtes de recherche
 
    
    composer require friendsofsymfony/elastica-bundle

puis pour remplir les index afin de réaliser la recherche

    php bin/console fos:elastica:populate

Pour tester: 

   compte admin:

      email: noreply.dramatik@gmail.com
      mdp: admin

   compte user:
      email: paris1@univ.fr
      mdp: Dandelions
   
[lien pour la base de données](https://github.com/Maanuja/Dramatik/blob/main/dramatik.sql)