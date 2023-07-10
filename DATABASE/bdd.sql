CREATE DATABASE IF NOT EXISTS quizz;

USE quizz;

CREATE TABLE users(
   id_user INT AUTO_INCREMENT,
   pseudo VARCHAR(150) NOT NULL,
   PRIMARY KEY(id_user),
   UNIQUE(pseudo)
);

CREATE TABLE questions(
   id_question INT AUTO_INCREMENT,
   question TEXT NOT NULL,
   reponse TEXT NOT NULL,
   PRIMARY KEY(id_question)
);

CREATE TABLE scores(
   id_score INT AUTO_INCREMENT,
   point BIGINT NOT NULL,
   dateTime DATETIME NOT NULL,
   PRIMARY KEY(id_score)
);

CREATE TABLE fake_reponse(
   id_fake_reponse INT AUTO_INCREMENT,
   fake_reponse TEXT NOT NULL,
   PRIMARY KEY(id_fake_reponse)
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

CREATE TABLE id_question_reponse(
   id_question INT,
   id_fake_reponse INT,
   PRIMARY KEY(id_question, id_fake_reponse),
   FOREIGN KEY(id_question) REFERENCES questions(id_question),
   FOREIGN KEY(id_fake_reponse) REFERENCES fake_reponse(id_fake_reponse)
);
