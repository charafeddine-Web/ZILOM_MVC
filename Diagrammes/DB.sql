CREATE DATABASE zilom_db;

\c zilom_db;

-- Créer le type ENUM pour les statuts
CREATE TYPE status_type AS ENUM ('active', 'suspended');
CREATE TYPE status_enseignant_type AS ENUM ('en_attente', 'accepter', 'refuser');
CREATE TYPE type_cours AS ENUM ('text', 'video');

CREATE TABLE Roles (
                       idRole SERIAL PRIMARY KEY,
                       nom VARCHAR(55) NOT NULL
);

CREATE TABLE users (
                       idUser SERIAL PRIMARY KEY,
                       nom VARCHAR(255) NOT NULL,
                       prenom VARCHAR(255) NOT NULL,
                       email VARCHAR(255) UNIQUE NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       status status_type DEFAULT 'active',
                       status_enseignant status_enseignant_type DEFAULT 'en_attente',
                       idRole INT NOT NULL,
                       FOREIGN KEY (idRole) REFERENCES Roles(idRole) ON DELETE CASCADE
);
CREATE TABLE categories (
                            idCategory SERIAL PRIMARY KEY,
                            nom VARCHAR(255) NOT NULL UNIQUE,
                            description TEXT,
                            imageCategy TEXT
);
CREATE TABLE cours (
                       idCours SERIAL PRIMARY KEY,
                       titre VARCHAR(255) NOT NULL,
                       description TEXT NOT NULL,
                       contenu TEXT,
                       type type_cours NOT NULL,
                       categorie_id INT,
                       enseignant_id INT NOT NULL,
                       date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       FOREIGN KEY (enseignant_id) REFERENCES users(idUser) ON DELETE CASCADE,
                       FOREIGN KEY (categorie_id) REFERENCES categories(idCategory) ON DELETE CASCADE
);

CREATE TABLE tags (
                      idTag SERIAL PRIMARY KEY,
                      nom VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE cours_tags (
                            cours_id INT NOT NULL,
                            tag_id INT NOT NULL,
                            PRIMARY KEY (cours_id, tag_id),
                            FOREIGN KEY (cours_id) REFERENCES cours(idCours) ON DELETE CASCADE,
                            FOREIGN KEY (tag_id) REFERENCES tags(idTag) ON DELETE CASCADE
);

CREATE TABLE favoris (
                         etudiant_id INT NOT NULL,
                         cours_id INT NOT NULL,
                         date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                         PRIMARY KEY (etudiant_id, cours_id),
                         FOREIGN KEY (etudiant_id) REFERENCES users(idUser) ON DELETE CASCADE,
                         FOREIGN KEY (cours_id) REFERENCES cours(idCours) ON DELETE CASCADE
);

CREATE TABLE inscriptions (
                              idInscription SERIAL PRIMARY KEY,
                              cours_id INT NOT NULL,
                              etudiant_id INT NOT NULL,
                              date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                              FOREIGN KEY (cours_id) REFERENCES cours(idCours) ON DELETE CASCADE,
                              FOREIGN KEY (etudiant_id) REFERENCES users(idUser) ON DELETE CASCADE
);

