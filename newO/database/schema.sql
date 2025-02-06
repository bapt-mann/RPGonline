DROP DATABASE IF EXISTS RPGOnline;
CREATE DATABASE RPGOnline;
USE RPGOnline;

CREATE TABLE rooms (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    player1_id INT REFERENCES players(id),
    player2_id INT REFERENCES players(id),
    state ENUM('waiting', 'running', 'finished') DEFAULT 'waiting'
);

CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL
);