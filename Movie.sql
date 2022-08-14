CREATE DATABASE movieDB;

USE movieDB ;
CREATE TABLE user(
UserID INT NOT NULL AUTO_INCREMENT,
Fname VARCHAR(50), 
Lname VARCHAR(50),
Email VARCHAR(50),
PhoneNumber VARCHAR(11),
UserPassword VARCHAR(20),
UserRole INT,
PRIMARY KEY(UserID));


CREATE TABLE movie(
MovieID INT NOT NULL AUTO_INCREMENT,
MovieName VARCHAR(50), 
MoviePicture VARCHAR(50),
MovieType VARCHAR(50),
Description_Movie VARCHAR(200),
ReleaseDate DATE,
RegisterDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(MovieID));

CREATE TABLE actor(
ActorID INT NOT NULL AUTO_INCREMENT,
ActorName VARCHAR(50), 
ActorPicture VARCHAR(50),
ActorDescription VARCHAR(50),
OscarDate DATE,
RegisterDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(ActorID));

CREATE TABLE actor_movie(
ActorID INT,
MovieID INT,
roleInMovie VARCHAR(20),
FOREIGN KEY (MovieID) REFERENCES movie(MovieID),
FOREIGN KEY (ActorID) REFERENCES actor(ActorID));


ALTER TABLE movie MODIFY COLUMN movieRating FLOAT;

DROP DATABASE movieDB

ALTER TABLE actor ADD COLUMN ActorGender VARCHAR(10);
ALTER TABLE actor DROP COLUMN OscarDate;

DELETE FROM movie WHERE movieId=3

ALTER TABLE actor_movie DROP COLUMN roleInMovie;
ALTER TABLE actor_movie ADD PRIMARY KEY(ActorID,MovieID);

SELECT MovieID, MovieName, MoviePicture, MovieType, RegisterDate FROM  movie

SELECT ActorName FROM actor, actor_movie WHERE actor.ActorID=actor_movie.ActorID and MovieId = 6

ALTER TABLE actor ADD COLUMN ActorAge INT



DELETE FROM actor_movie WHERE ActorID=7

DELETE FROM actor WHERE ActorID=7

SELECT * FROM actor, actor_movie WHERE actor.ActorID=actor_movie.ActorID AND actor_movie.ActorID=7


SELECT CURDATE();

SELECT MovieID, MovieName, MoviePicture, ReleaseDate, ReleaseDate-CURDATE()  FROM movie WHERE ReleaseDate-CURDATE()>0 AND movieID= (SELECT movieID FROM movie WHERE 


SELECT MovieID, MovieName, MoviePicture, ReleaseDate, ReleaseDate-CURDATE()  FROM movie WHERE ReleaseDate-CURDATE()= (SELECT MIN(ReleaseDate-CURDATE()) FROM movie WHERE ReleaseDate-CURDATE()>0);

