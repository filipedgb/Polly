CREATE TABLE poll (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	title VARCHAR,
	description VARCHAR
);

CREATE TABLE pollField (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	poll_id INTEGER REFERENCES poll NOT NULL,
	fieldName VARCHAR
);

CREATE TABLE pollFieldOption (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	pollField_id INTEGER REFERENCES pollField NOT NULL,
	optionText VARCHAR
);

INSERT INTO poll VALUES (NULL, 'Test 1', 'Test poll number 1');
INSERT INTO pollField VALUES (NULL, 1, 'Age');
INSERT INTO pollFieldOption VALUES (NULL, 1, '<=18');
INSERT INTO pollFieldOption VALUES (NULL, 1, '>=18 & <25');
INSERT INTO pollFieldOption VALUES (NULL, 1, '>=25 & <35');
INSERT INTO pollFieldOption VALUES (NULL, 1, '>=35');
