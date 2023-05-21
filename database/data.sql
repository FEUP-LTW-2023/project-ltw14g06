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

INSERT INTO priority(name) VALUES ('Low');
INSERT INTO priority(name) VALUES ('Medium');
INSERT INTO priority(name) VALUES ('High');

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

