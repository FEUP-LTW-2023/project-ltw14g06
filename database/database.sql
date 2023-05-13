.mode columns
.header ON
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS ticket_hashtags;
DROP TABLE IF EXISTS hashtags;
DROP TABLE IF EXISTS ticket_history;
DROP TABLE IF EXISTS FAQ;
DROP TABLE IF EXISTS ticket_messages;
DROP TABLE IF EXISTS tickets;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS departments;

CREATE TABLE departments (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  username VARCHAR(255) NOT NULL UNIQUE,
  name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  type VARCHAR(255) CHECK( type IN ('Client', 'Agent', 'Admin')) NOT NULL DEFAULT 'Client',
  department_id INTEGER NOT NULL DEFAULT 1,
  FOREIGN KEY (department_id) REFERENCES departments(id)
);


CREATE TABLE tickets (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  agent_id INTEGER NOT NULL DEFAULT 0,
  department_id INTEGER NOT NULL DEFAULT 0,
  subject VARCHAR(255) NOT NULL,
  status VARCHAR(255) CHECK( status IN ('Open', 'Assigned', 'Closed')) NOT NULL DEFAULT 'Open',
  priority VARCHAR(255) CHECK( priority IN ('Low', 'Medium', 'High')) NOT NULL DEFAULT 'Medium',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (agent_id) REFERENCES users(id),
  FOREIGN KEY (department_id) REFERENCES departments(id)
);

CREATE TABLE ticket_messages (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  ticket_id INTEGER NOT NULL,
  sender_id INTEGER NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (ticket_id) REFERENCES tickets(id),
  FOREIGN KEY (sender_id) REFERENCES users(id)
);

CREATE TABLE FAQ (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  question TEXT NOT NULL UNIQUE,
  answer TEXT NOT NULL
);

CREATE TABLE ticket_history (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  ticket_id INTEGER NOT NULL,
  agent_id INTEGER NOT NULL,
  status VARCHAR(255) CHECK( status IN ('Open', 'Assigned', 'Closed')) NOT NULL DEFAULT 'Open',
  priority VARCHAR(255) CHECK( priority IN ('Low', 'Medium', 'High')) NOT NULL DEFAULT 'Medium',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (ticket_id) REFERENCES tickets(id),
  FOREIGN KEY (agent_id) REFERENCES users(id)
);

CREATE TABLE hashtags (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE ticket_hashtags (
  ticket_id INTEGER NOT NULL,
  hashtag_id INTEGER NOT NULL,
  PRIMARY KEY (ticket_id, hashtag_id),
  FOREIGN KEY (ticket_id) REFERENCES tickets(id) ON DELETE CASCADE,
  FOREIGN KEY (hashtag_id) REFERENCES hashtags(id) ON DELETE CASCADE
);
