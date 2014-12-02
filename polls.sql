.mode columns
.headers ON

DROP Table Utilizador;
DROP Table groupPoll;
DROP Table poll;
DROP Table pollOption;
DROP Table pollAnswer;
DROP Table pollImage;

CREATE TABLE Utilizador (
	IdUser Integer PRIMARY KEY,
	Username VARCHAR Unique,
	Pword VARCHAR NOT NULL,
	Email VARCHAR NOT NULL,
	Active Integer, 
	RegCode Integer

);

CREATE TABLE groupPoll (
	groupId INTEGER PRIMARY KEY AUTOINCREMENT,
	title VARCHAR UNIQUE,
	description VARCHAR,
	userId INTEGER REFERENCES Utilizador NOT NULL,
	visibility VARCHAR, /*Private or Public*/
	titleHash VARCHAR /*used to generate private polls links */
);

CREATE TABLE poll (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	title VARCHAR UNIQUE,
	userId INTEGER REFERENCES Utilizador NOT NULL,
	titleHash VARCHAR,  /*used to generate private polls links */
	groupId INTEGER REFERENCES groupPoll
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

CREATE TABLE pollImage (
	poll_id INTEGER REFERENCES poll NOT NULL,
	src VARCHAR
);


/*

INSERT INTO poll VALUES (NULL, 'Test 1', 'Test poll number 1', 0, 'Public',1);
INSERT INTO pollOption VALUES (NULL, 1, '<=18', 0);
INSERT INTO pollOption VALUES (NULL, 1, '>=18 & <25', 0);
INSERT INTO pollOption VALUES (NULL, 1, '>=25 & <35', 0);
INSERT INTO pollOption VALUES (NULL, 1, '>=35', 0);

INSERT INTO poll VALUES (NULL, 'Test 2', 'Test poll number 2', 0, 'Private',2);
INSERT INTO pollOption VALUES (NULL, 2, 'a', 0);
INSERT INTO pollOption VALUES (NULL, 2, 'b', 0);
INSERT INTO pollOption VALUES (NULL, 2, 'c', 0);
INSERT INTO pollOption VALUES (NULL, 2, 'd', 0);

*/

create trigger incCounterAnswer
after insert on pollAnswer
begin
	UPDATE pollOption
	SET counter = counter + 1
	WHERE NEW.pollOption_id = pollOption.id;
end;


