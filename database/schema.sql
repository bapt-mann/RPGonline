DROP DATABASE IF EXISTS RPGOnline;
CREATE DATABASE RPGOnline;
USE RPGOnline;

CREATE TABLE rooms (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    player1_id INT REFERENCES players(id),
    player2_id INT REFERENCES players(id),
    state ENUM('en attente', 'en cours', 'terminee') DEFAULT 'en attente'
);

CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    room_id INT REFERENCES rooms(room_id)
);