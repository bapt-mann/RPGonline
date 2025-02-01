CREATE DATABASE IF NOT EXISTS RPGOnline;
USE RPGOnline;

CREATE TABLE chambres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    joueur1_id INT NOT NULL,
    joueur2_id INT DEFAULT NULL,
    etat ENUM('en attente', 'en cours', 'terminee') DEFAULT 'en attente'
);

CREATE TABLE joueurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    chambre_id INT,
    FOREIGN KEY (chambre_id) REFERENCES chambres(id)
);