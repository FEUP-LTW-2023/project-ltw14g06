INSERT INTO users (username, name, password, email, type) VALUES ('dratomitoma', 'Tomás Xavier', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'dratomitoma@gmail.com','client');
INSERT INTO users (username, name, password, email, type) VALUES ('summitatem', 'Tiago Cruz', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'summitatem@gmail.com','agent');
INSERT INTO users (username, name, password, email, type) VALUES ('tonevanda', 'João Lourenço', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'tonevanda@gmail.com','admin');

INSERT INTO departments (id, name) VALUES (1, 'Accounting');

INSERT INTO tickets (id, user_id, agent_id, department_id,subject, status, priority, created_at, updated_at) VALUES (1,'dratomitoma', 'summitatem', 1, 'test', 'open', 'medium','2023-04-26 09:00:00', '2023-04-26 11:30:00');

INSERT INTO ticket_messages (id, ticket_id, sender_id, receiver_id, message, created_at) VALUES (1,1,'dratomitoma', 'summitatem', 'oi test','2023-04-26 09:00:00');

INSERT INTO FAQ (id, question, answer) VALUES (1,'Test question', 'Test answer');

INSERT INTO ticket_history (id, ticket_id, agent_id, status, priority, created_at) VALUES (1,1,'summitatem','open', 'medium','2023-04-26 09:00:00');

INSERT INTO hashtags (id, name) VALUES (1,'Test');

INSERT INTO ticket_hashtags (ticket_id, hashtag_id) VALUES (1,1);

SELECT * FROM users;
