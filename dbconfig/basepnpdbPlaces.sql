CREATE TABLE Places
(
Username varchar(255) NOT NULL,
StreetNumber int NOT NULL,
StreetName varchar(255), NOT NULL
ApartmentNumber varchar(255) NOT NULL,
City varchar(255) NOT NULL,
Province varchar(255) NOT NULL,
Country varchar(255) NOT NULL,
PostalCode varchar(255) NOT NULL,
TypeOfSpace varchar(255) NOT NULL,
Desciption varchar(255) NOT NULL,
PricePerNight int NOT NULL,
Rating int NOT NULL,
Pets int NOT NULL,
Alcohol int NOT NULL,
Wheelchair int NOT NULL,
Smoking int NOT NULL, 
OutdoorAccess int NOT NULL,
Availabilities int NOT NULL
);

        
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('jdoe',6817,'43e Av',0,'Montreal','Quebec','Canada','H1T2R9','Home','Large Victorian House',100,5,0,1,1,1,1,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('jdoe',7503,'Rue St Denis',0,'Montreal','Quebec','Canada','H2R2E7','Home','3 Floor Apartment Home',400,3,0,0,0,1,0,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('jdoe',251,'Av Percival',0,'Montreal','Quebec','Canada','H4X1T8','Home','Architectural Marvel',250,4,0,1,0,1,0,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('dgand',7766,'George Street',2,'Montreal','Quebec','Canada','H8P1E1','Porch','Big deck on back of apartment',80,4,0,1,0,1,0,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('dgand',11727,'Rue Notre Dame E',20,'Montreal','Quebec','Canada','H1B2X8','Apartment','Top Floor Apartment',34,3,0,0,0,0,0,0);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('dgand',5745,'17 Av',1,'Montreal','Quebec','Canada','H1X2R7','Apartment','Simple Montreal Apartment',100,5,1,1,1,1,1,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('dgand',3708,'Rue St Hubert',3,'Montreal','Quebec','Canada','H2L4A2','Apartment','Simple Montreal Apartment',100,5,0,1,0,1,0,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('bilbo',800,'Rue Gagne Lasalle',0,'Montreal','Quebec','Canada','H8P3W3','Yard','Big Green Yard with Trees',300,4,1,1,0,1,1,0);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('frodo',4430,'St Catherine Ouest',0,'Montreal','Quebec','Canada','H3Z3E4','Apartment','Small chill compact apartment',200,3,0,1,0,1,0,0);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('frodo',5930,'Rue Hurteau',4,'Montreal','Quebec','Canada','H4E2Y2','Basement','Big open basement',100,5,0,1,0,1,0,0);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('gandalf',717,'Charron Street',3,'Montreal','Quebec','Canada','H8P3T8','Loft','Huge views of Mont Royal',300,5,1,1,1,1,1,0);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('gandalf',2630,'St Germain Street',2,'Montreal','Quebec','Canada','H1W2V3','Loft','Views of the St Lawrence',500,5,0,0,0,0,1,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('oprah',6730,'44av',0,'Montreal','Quebec','Canada','H1T2P2','Penthouse','Downtown Views',800,4,0,1,1,1,0,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('oprah',1940,'Jolicouer Street',0,'Montreal','Quebec','Canada','H4E4M2','Warehouse','Industry views and lots of concrete',350,4,0,0,0,0,0,1);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('oprah',16,'Kenaston Av',0,'Montreal','Quebec','Canada','H3R1L8','Rooftop','Skyline view of downtown with a grill',200,4,0,1,0,1,1,0);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('oprah',5240,'Randall Av',0,'Montreal','Quebec','Canada','H4V2V3','Club','Typical club',1000,5,0,1,0,1,1,0);
INSERT INTO Places(Username,StreetNumber,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess,Availabilities) VALUES ('catniss',3555,'Edouard-Montpetit',0,'Montreal','Quebec','Canada','H3T1K7','Home','Basic Surburban Home',100,3,1,1,1,1,1,1);
