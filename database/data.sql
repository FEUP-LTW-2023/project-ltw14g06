INSERT INTO users (username, name, password, email, type) VALUES ('dratomitoma', 'Tomás Xavier', '$2a$12$ZUfqC.GaSvQN9otZ2P5NzOPNxQdidcpYCGzrquQzeapToj747kDbK', 'dratomitoma@gmail.com','Client');
INSERT INTO users (username, name, password, email, type) VALUES ('summitatem', 'Tiago Cruz', '$2a$12$ZUfqC.GaSvQN9otZ2P5NzOPNxQdidcpYCGzrquQzeapToj747kDbK', 'summitatem@gmail.com','Agent');
INSERT INTO users (username, name, password, email, type) VALUES ('tonevanda', 'João Lourenço', '$2a$12$ZUfqC.GaSvQN9otZ2P5NzOPNxQdidcpYCGzrquQzeapToj747kDbK', 'tonevanda@gmail.com','Admin');
INSERT INTO users (id,username, name, password, email, type) VALUES (0,'','Awaiting agent assignment', ' ', '', 'Agent');

INSERT INTO departments (id,name) VALUES (0,'--');
INSERT INTO departments (name) VALUES ('Accounting');
INSERT INTO departments (name) VALUES ('General Inquiries');
INSERT INTO departments (name) VALUES ('Feedback and Suggestions');
INSERT INTO departments (name) VALUES ('Security');
INSERT INTO departments (name) VALUES ('Human Resources');
INSERT INTO departments (name) VALUES ('Customer Support');
INSERT INTO departments (name) VALUES ('Technical Support');
INSERT INTO departments (name) VALUES ('Shipping and Logistics');
INSERT INTO departments (name) VALUES ('Legal');

INSERT INTO status(name) VALUES ('Open');
INSERT INTO status(name) VALUES ('Closed');
INSERT INTO status(name) VALUES ('Assigned');

INSERT INTO tickets (id, user_id, agent_id, department_id,subject, priority, created_at, updated_at) VALUES (1,1,2, 1,'test', 'Medium','2023-04-26 09:00:00', '2023-04-26 11:30:00');
INSERT INTO tickets (user_id, agent_id, department_id,subject, priority) VALUES (1,2, 1,'test', 'Medium');

INSERT INTO ticket_messages (id, ticket_id, sender_id, message, created_at) VALUES (1,1,1, 'oi test','2023-04-26 09:00:00');

INSERT INTO FAQ (question, answer) VALUES ('Test question', 'Test answer');

INSERT INTO ticket_history (id, ticket_id, text, updated_at) VALUES (1,1,'- deleted everything.','2023-04-26 09:00:00');

INSERT INTO hashtags (name) VALUES ('#support');
INSERT INTO hashtags (name) VALUES ('#helpdesk');
INSERT INTO hashtags (name) VALUES ('#customerservice');
INSERT INTO hashtags (name) VALUES ('#techsupport');
INSERT INTO hashtags (name) VALUES ('#incidentmanagement');
INSERT INTO hashtags (name) VALUES ('#problemresolution');
INSERT INTO hashtags (name) VALUES ('#troubleshooting');
INSERT INTO hashtags (name) VALUES ('#tickettracking');
INSERT INTO hashtags (name) VALUES ('#escalationmanagement');
INSERT INTO hashtags (name) VALUES ('#servicelevelagreements');
INSERT INTO hashtags (name) VALUES ('#userfeedback');
INSERT INTO hashtags (name) VALUES ('#teamcollaboration');

INSERT INTO ticket_hashtags (ticket_id, hashtag_id) VALUES (1,3);

