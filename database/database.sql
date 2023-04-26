.mode columns
.header ON
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS ticket_hashtags;
DROP TABLE IF EXISTS hashtags;
DROP TABLE IF EXISTS ticket_history;
DROP TABLE IF EXISTS FAQ;
DROP TABLE IF EXISTS ticket_messages;
DROP TABLE IF EXISTS tickets;
DROP TABLE IF EXISTS departments;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  username VARCHAR(255) NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  type VARCHAR(255) CHECK( type IN ('client', 'agent', 'admin')) NOT NULL DEFAULT 'client'
);

CREATE TABLE departments (
  id INT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE tickets (
  id INT NOT NULL PRIMARY KEY,
  user_id VARCHAR(255) NOT NULL,
  agent_id VARCHAR(255) NOT NULL,
  department_id INT NOT NULL,
  subject VARCHAR(255) NOT NULL,
  status VARCHAR(255) CHECK( status IN ('open', 'assigned', 'closed')) NOT NULL DEFAULT 'open',
  priority VARCHAR(255) CHECK( priority IN ('low', 'medium', 'high')) NOT NULL DEFAULT 'medium',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT NULL,
  FOREIGN KEY (user_id) REFERENCES users(username),
  FOREIGN KEY (agent_id) REFERENCES users(username),
  FOREIGN KEY (department_id) REFERENCES departments(id)
);

CREATE TABLE ticket_messages (
  id INT NOT NULL PRIMARY KEY,
  ticket_id INT NOT NULL,
  sender_id VARCHAR(255) NOT NULL,
  receiver_id VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (ticket_id) REFERENCES tickets(id),
  FOREIGN KEY (sender_id) REFERENCES users(username),
  FOREIGN KEY (receiver_id) REFERENCES users(username)
);

CREATE TABLE FAQ (
  id INT NOT NULL PRIMARY KEY,
  question TEXT NOT NULL,
  answer TEXT NOT NULL
);

CREATE TABLE ticket_history (
  id INT NOT NULL PRIMARY KEY,
  ticket_id INT NOT NULL,
  agent_id VARCHAR(255) NOT NULL,
  status VARCHAR(255) CHECK( status IN ('open', 'assigned', 'closed')) NOT NULL DEFAULT 'open',
  priority VARCHAR(255) CHECK( priority IN ('low', 'medium', 'high')) NOT NULL DEFAULT 'medium',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (ticket_id) REFERENCES tickets(id),
  FOREIGN KEY (agent_id) REFERENCES users(username)
);

CREATE TABLE hashtags (
    id INT NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE ticket_hashtags (
  ticket_id INT NOT NULL,
  hashtag_id INT NOT NULL,
  PRIMARY KEY (ticket_id, hashtag_id),
  FOREIGN KEY (ticket_id) REFERENCES tickets(id) ON DELETE CASCADE,
  FOREIGN KEY (hashtag_id) REFERENCES hashtags(id) ON DELETE CASCADE
);
