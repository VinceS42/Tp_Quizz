CREATE DATABASE IF NOT EXISTS quizz;

USE quizz;
CREATE TABLE users(
   idUser INT AUTO_INCREMENT NOT NULL,
   pseudo VARCHAR(150) NOT NULL,
   PRIMARY KEY(idUser),
   UNIQUE(pseudo)
);

CREATE TABLE questions(
   idQuestion INT AUTO_INCREMENT NOT NULL,
   question TEXT NOT NULL,
   reponse TEXT NOT NULL,
   PRIMARY KEY(idQuestion)
);

CREATE TABLE scores(
   idScore INT AUTO_INCREMENT NOT NULL,
   point BIGINT NOT NULL,
   dateTime DATETIME NOT NULL,
   PRIMARY KEY(idScore)
);

CREATE TABLE idUserQuestion(
   idUser INT,
   idQuestion INT,
   PRIMARY KEY(idUser, idQuestion),
   FOREIGN KEY(idUser) REFERENCES users(idUser),
   FOREIGN KEY(idQuestion) REFERENCES questions(idQuestion)
);

CREATE TABLE idUserScore(
   idUser INT,
   idScore INT,
   PRIMARY KEY(idUser, idScore),
   FOREIGN KEY(idUser) REFERENCES users(idUser),
   FOREIGN KEY(idScore) REFERENCES scores(idScore)
);
