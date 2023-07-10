CREATE DATABASE IF NOT EXISTS quizz;

USE quizz;

CREATE TABLE users(
   id_user INT AUTO_INCREMENT NOT NULL,
   pseudo VARCHAR(150) NOT NULL,
   PRIMARY KEY(id_user),
   UNIQUE(pseudo)
);

CREATE TABLE questions(
   id_question INT AUTO_INCREMENT NOT NULL,
   question TEXT NOT NULL,
   reponse TEXT NOT NULL,
   PRIMARY KEY(id_question)
);

CREATE TABLE scores(
   id_score INT AUTO_INCREMENT NOT NULL,
   points BIGINT NOT NULL,
   dateTime DATETIME NOT NULL,
   PRIMARY KEY(id_score)
);

CREATE TABLE id_user_question(
   id_user INT,
   id_question INT,
   PRIMARY KEY(id_user, id_question),
   FOREIGN KEY(id_user) REFERENCES users(id_user),
   FOREIGN KEY(id_question) REFERENCES questions(id_question)
);

CREATE TABLE id_user_score(
   id_user INT,
   id_score INT,
   PRIMARY KEY(id_user, id_score),
   FOREIGN KEY(id_user) REFERENCES users(id_user),
   FOREIGN KEY(id_score) REFERENCES scores(id_score)
);
