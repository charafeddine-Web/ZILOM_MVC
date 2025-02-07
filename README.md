## ZILOM - Plateforme de Cours en Ligne --MVC

#Contexte du Projet

Youdemy est une plateforme interactive et personnalisée visant à révolutionner l'apprentissage en ligne pour les étudiants et les enseignants. Ce projet implémente des concepts avancés de développement web tout en respectant les principes de la programmation orientée objet (OOP).

## Fonctionnalités

Partie Front Office

-Visiteur

Accès au catalogue des cours avec pagination.

Recherche de cours par mots-clés.

Création d'un compte avec choix du rôle (Étudiant ou Enseignant).

-Étudiant

Visualisation du catalogue des cours.

Recherche et consultation des détails des cours (description, contenu, enseignant, etc.).

Inscription à un cours après authentification.

Accès à une section “Mes cours” regroupant les cours rejoints.

-Enseignant

Ajout de nouveaux cours avec des détails tels que :

Titre, description, contenu (vidéo ou document), tags, et catégorie.

-Gestion des cours :

Modification, suppression et consultation des inscriptions.

Accès à une section “Statistiques” sur les cours :

Nombre d’étudiants inscrits, Nombre de cours, etc.

Partie Back Office

-Administrateur

Validation des comptes enseignants.

-Gestion des utilisateurs :

Activation, suspension ou suppression.

-Gestion des contenus :

Cours, catégories et tags.

Insertion en masse de tags pour gagner en efficacité.

Accès à des statistiques globales :

Nombre total de cours, répartition par catégorie.

Le cours avec le plus d’étudiants.

Les Top 3 enseignants.

-Fonctionnalités Transversales

Un cours peut contenir plusieurs tags (relation many-to-many).

Application du concept de polymorphisme dans les méthodes suivantes : Ajouter cours et afficher cours.

Système d’authentification et d’autorisation pour protéger les routes sensibles.

Contrôle d’accès : chaque utilisateur ne peut accéder qu’aux fonctionnalités correspondant à son rôle.

-Exigences Techniques

Respect des principes OOP (encapsulation, héritage, polymorphisme).

Base de données relationnelle avec gestion des relations (one-to-many, many-to-many).

Utilisation des sessions PHP pour la gestion des utilisateurs connectés.

Validation des données utilisateur pour garantir la sécurité.

Validation

Validation côté client avec HTML5 et JavaScript pour minimiser les erreurs avant la soumission.

Validation côté serveur incluant :

Prévention des attaques Cross-Site Scripting (XSS) et Cross-Site Request Forgery (CSRF).

Utilisation de requêtes préparées pour prévenir les injections SQL.

*Critères de Performance

Logique métier et architecture clairement séparées.

Cohérence dans l’application des concepts OOP.

Structure et lisibilité du code optimisées.

Utilisation correcte des classes, objets, méthodes, etc.

Conception responsive adaptée à tous les types d’écrans.

******************************Installation

Clonez le repository :

git clone https://github.com/charafeddine-Web/ZILOM_MVC.git

Accédez au dossier :

cd ZILOM_MVC

Configurez la base de données en utilisant le fichier SQL fourni dans le dossier database.

Mettez à jour les informations de connexion à la base de données dans le fichier config.php.

Lancez un serveur local :

php -S localhost:8000

Accédez à l’application dans votre navigateur :

http://localhost:8000

Auteur

Nom : TBIBZAT CHARAF EDDINE

Contact : charafeddinetbibzat@gmail.com
