-- Script SQL d'aide pour explorer la base de données MySQL
-- Enregistrez ce fichier et exécutez-le via un client SQL (SQLTools, phpMyAdmin, mysql CLI)

-- 1) Sélectionner la base (ajustez le nom si besoin)
USE `bibliothèque`;

-- 2) Lister les tables
SHOW TABLES;

-- 3) Décrire la table 'membre' (structure)
DESCRIBE membre;

-- 4) Afficher toutes les données de la table 'membre'
SELECT * FROM membre;

-- 5) Requête exemple avec limite et ordonnancement
SELECT * FROM membre ORDER BY date_inscription DESC LIMIT 100;

-- 6) Exemple de création de table (si vous voulez recréer une table propre)
-- Ajustez les champs selon vos besoins
-- CREATE TABLE membre (
--   membre_id INT AUTO_INCREMENT PRIMARY KEY,
--   nom VARCHAR(100) NOT NULL,
--   prenom VARCHAR(100) NOT NULL,
--   telephone VARCHAR(50),
--   email VARCHAR(150),
--   age INT,
--   sexe VARCHAR(10),
--   date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 7) Exemple d'insertion
-- INSERT INTO membre (nom, prenom, telephone, email, age, sexe) VALUES ('Dupont', 'Jean', '0102030405', 'j.dupont@example.com', 30, 'M');

-- 8) Pour limiter l'encodage utf8 (si nécessaire)
-- SET NAMES 'utf8mb4';

-- Fin du script
