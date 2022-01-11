CREATE TABLE user (
    id INTEGER PRIMARY AUTO_INCREMENT KEY NOT NULL,
    email nvarchar(255) NOT NULL,
    username VARCHAR(50) NOT NULL, 
    passowrd VARCHAR(100) NOT NULL
);



-- ==> Create Table article --
CREATE TABLE articles (
	idArticle INTEGER PRIMARY AUTO_INCREMENT KEY NOT NULL,
	title VARCHAR(50) NOT NULL, 
	description VARCHAR(1000) NOT NULL, 
	dateOfPost DATETIME NOT NULL,
	idUser INTEGER,
	FOREIGN KEY (idUser) REFERENCES user(id) 
);