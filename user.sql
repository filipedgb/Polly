.mode columns
.headers ON

DROP Table Utilizador;

CREATE TABLE Utilizador (
IdUser Integer PRIMARY KEY,
Username VARCHAR Unique,
Pword VARCHAR NOT NULL
);

/* INSERT INTO Utilizador(IdUser,Username,Pword) VALUES (0,"Admin",)' */