INSERT INTO users (username, name, password, email, type) VALUES ('dratomitoma', 'Tomás Xavier', '$2a$12$ZUfqC.GaSvQN9otZ2P5NzOPNxQdidcpYCGzrquQzeapToj747kDbK', 'dratomitoma@gmail.com','client');
INSERT INTO users (username, name, password, email, type) VALUES ('summitatem', 'Tiago Cruz', '$2a$12$ZUfqC.GaSvQN9otZ2P5NzOPNxQdidcpYCGzrquQzeapToj747kDbK', 'summitatem@gmail.com','agent');
INSERT INTO users (username, name, password, email, type) VALUES ('tonevanda', 'João Lourenço', '$2a$12$ZUfqC.GaSvQN9otZ2P5NzOPNxQdidcpYCGzrquQzeapToj747kDbK', 'tonevanda@gmail.com','admin');

INSERT INTO departments (name) VALUES ('Accounting');

INSERT INTO tickets (id, user_id, agent_id, department_id,subject, status, priority, created_at, updated_at) VALUES (1,1,2, 1, 'test', 'open', 'medium','2023-04-26 09:00:00', '2023-04-26 11:30:00');

INSERT INTO ticket_messages (id, ticket_id, sender_id, receiver_id, message, created_at) VALUES (1,1,1,2, 'oi test','2023-04-26 09:00:00');

INSERT INTO FAQ (question, answer) VALUES ('Test question', 'Test answer');

INSERT INTO ticket_history (id, ticket_id, agent_id, status, priority, created_at) VALUES (1,1,1,'open', 'medium','2023-04-26 09:00:00');

INSERT INTO hashtags (name) VALUES ('Test');

INSERT INTO ticket_hashtags (ticket_id, hashtag_id) VALUES (1,1);

