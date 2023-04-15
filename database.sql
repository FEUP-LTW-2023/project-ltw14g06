.mode columns
.headers ON
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS Admin;
DROP TABLE IF EXISTS Agent;
DROP TABLE IF EXISTS Client;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Ticket;
DROP TABLE IF EXISTS Department;
DROP TABLE IF EXISTS Message;
DROP TABLE IF EXISTS Hashtag;
DROP TABLE IF EXISTS FAQ;

CREATE TABLE FAQ(
    idQuestion INT PRIMARY KEY,
    question LONGTEXT,
    answer LONGTEXT
);

CREATE TABLE Hashtag(
    idHashtag INT PRIMARY KEY,
    hashtag VARCHAR(255)
);

CREATE TABLE Message(
    idMessage INT PRIMARY KEY,
    textMessage LONGTEXT,
    dateOfSubmission TIMESTAMP
);

CREATE TABLE Department(
    idDepartment INT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE Ticket(
    idTicket INT PRIMARY KEY,
    dateOfSubmission TIMESTAMP,
    currentStatus VARCHAR(255),
    priority VARCHAR(255)
);

CREATE TABLE User(
    idUser INT PRIMARY KEY,
    name VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255),
    email VARCHAR(255)
);

CREATE TABLE Client(
    idClient INT REFERENCES User
);

CREATE TABLE Agent(
    idClient INT REFERENCES Client
);

CREATE TABLE Admin(
    idAdmin INT REFERENCES Agent
);