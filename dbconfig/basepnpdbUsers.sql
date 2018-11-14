CREATE TABLE Users (
   Username     VARCHAR(255) NOT NULL PRIMARY KEY
  ,FirstName    VARCHAR(255) NOT NULL
  ,LastName     VARCHAR(255) NOT NULL
  ,Email        VARCHAR(255) NOT NULL
  ,Password     VARCHAR(255) NOT NULL
  ,Phone        INTEGER  NOT NULL
  ,Rating       INTEGER  NOT NULL
  ,NumOfRatings INTEGER  NOT NULL
  ,Gender       INTEGER  NOT NULL
  ,Description  VARCHAR(255) NOT NULL
  ,Birthdate    INTEGER  NOT NULL
  ,NumOfPlaces  INTEGER  NOT NULL
);
INSERT INTO Users (Username,FirstName,LastName,Email,Password,Phone,Rating,NumOfRatings,Gender,Description,Birthdate,NumOfPlaces) VALUES ('jdoe','Jane','Doe','doe@gmail.com','janepass',5146694587,4,22,1,'From the internet',20010810,3);
INSERT INTO Users (Username,FirstName,LastName,Email,Password,Phone,Rating,NumOfRatings,Gender,Description,Birthdate,NumOfPlaces) VALUES ('dgand','Doug','Anderson','dgand@yahoo.com','dougpass',5143287812,3,12,0,'From space',19961201,4);
INSERT INTO Users (Username,FirstName,LastName,Email,Password,Phone,Rating,NumOfRatings,Gender,Description,Birthdate,NumOfPlaces) VALUES ('bilbo','Bilbo','Baggins','bobag@shire.com','bilbopass',4385449034,5,50,0,'From Middle Earth',18000101,1);
INSERT INTO Users (Username,FirstName,LastName,Email,Password,Phone,Rating,NumOfRatings,Gender,Description,Birthdate,NumOfPlaces) VALUES ('frodo','Frodo','Baggins','frodo@shire.com','frodopass',5144990385,2,2,0,'From Middle Earth',18800203,2);
INSERT INTO Users (Username,FirstName,LastName,Email,Password,Phone,Rating,NumOfRatings,Gender,Description,Birthdate,NumOfPlaces) VALUES ('gandalf','Gandalf','Greybeard','gandalf@wizard.com','gandalfpass',5141112222,5,80,0,'From Beyond',12000505,2);
INSERT INTO Users (Username,FirstName,LastName,Email,Password,Phone,Rating,NumOfRatings,Gender,Description,Birthdate,NumOfPlaces) VALUES ('oprah','Oprah','Winefry','oprah@winefry.com','oprahpass',5144589908,4,37,1,'From Chicago',19640312,4);
INSERT INTO Users (Username,FirstName,LastName,Email,Password,Phone,Rating,NumOfRatings,Gender,Description,Birthdate,NumOfPlaces) VALUES ('catniss','Catniss','Everdeen','catniss@hugames.com','catnisspass',5143207564,5,888,1,'From District 13',20500923,1);
