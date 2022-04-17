# dramatik

Un site pour mieux connaitre les kdramas à travers des fiches d'infos et des jeux.

Possibilité de faire des recherches (nom, genre, drama lié) sur les pages de répertoire pour drama(catalogue et abcdaire) et pour quizz.


Configuration 
Pour la meilleure ergonomie lors de votre utlisation du site:
    
    yarn add bootstrap --dev
    
    yarn add @popperjs/core --dev

Pour se retrouver parmi les dramas et quizz :

La pagination

    composer require knplabs/knp-paginator-bundle

La recherche par ElasticSearch

 - avoir installé ElasticSearch: https://www.elastic.co/fr/downloads/elasticsearch
 
 - le lancer sur terminal avec la commande 
   - bin\elasticsearch.bat (Windows) ou  bin/elasticsearch (autre)
 - dans le projet, installé le bundle pour effectuer les requêtes de recherche
 
    
    composer require friendsofsymfony/elastica-bundle

puis pour remplir les index afin de réaliser la recherche

    php bin/console fos:elastica:populate

