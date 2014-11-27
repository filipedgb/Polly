.mode columns
.headers ON

DROP Table Utilizador;

DROP Table poll;
DROP Table pollOption;
DROP Table pollAnswer;

CREATE TABLE Utilizador (
IdUser Integer PRIMARY KEY,
Username VARCHAR Unique,
Pword VARCHAR NOT NULL
);



CREATE TABLE poll (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	title VARCHAR UNIQUE,
	description VARCHAR,
	userId INTEGER REFERENCES Utilizador NOT NULL,
	visibility VARCHAR /*Private or Public*/
);

CREATE TABLE pollOption (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	poll_id INTEGER REFERENCES poll NOT NULL,
	optionText VARCHAR,
	counter INTEGER
);

CREATE TABLE pollAnswer(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	poll_id INTEGER REFERENCES poll NOT NULL,
	pollOption_id INTEGER REFERENCES pollOption NOT NULL,
	user_id INTEGER
);



INSERT INTO poll VALUES (NULL, 'Test 1', 'Test poll number 1', 0, 'Public');
INSERT INTO pollOption VALUES (NULL, 1, '<=18', 0);
INSERT INTO pollOption VALUES (NULL, 1, '>=18 & <25', 0);
INSERT INTO pollOption VALUES (NULL, 1, '>=25 & <35', 0);
INSERT INTO pollOption VALUES (NULL, 1, '>=35', 0);

INSERT INTO poll VALUES (NULL, 'Test 2', 'Test poll number 2', 0, 'Private');
INSERT INTO pollOption VALUES (NULL, 2, 'a', 0);
INSERT INTO pollOption VALUES (NULL, 2, 'b', 0);
INSERT INTO pollOption VALUES (NULL, 2, 'c', 0);
INSERT INTO pollOption VALUES (NULL, 2, 'd', 0);



create trigger incCounterAnswer
after insert on pollAnswer
begin
	UPDATE pollOption
	SET counter = counter + 1
	WHERE NEW.pollOption_id = pollOption.id;
end;