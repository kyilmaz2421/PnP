CREATE TABLE Places (
Username varchar(255) NOT NULL,
PlaceID varchar(255) NOT NULl PRIMARY KEY,
StreetName varchar(255) NOT NULL,
ApartmentNumber varchar(255),
City varchar(255) NOT NULL,
Province varchar(255) NOT NULL,
Country varchar(255) NOT NULL,
PostalCode varchar(255) NOT NULL,
TypeOfSpace varchar(255) NOT NULL,
Desciption varchar(255) NOT NULL,
PricePerNight int NOT NULL,
Rating float NOT NULL,
RatingNumber int NOT NULL,
Pets boolean NOT NULL,
Alcohol boolean NOT NULL,
Wheelchair boolean NOT NULL,
Smoking boolean NOT NULL, 
OutdoorAccess boolean NOT NULL
);

        
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('jdoe','CA9FC358E81E48777F4FE212882323FE16F8C38A80BB5D2A096096B20945F8C0','6817 43e Av',0,'Montreal','Quebec','Canada','H1T2R9','Home','Large Victorian House',100,5,13,true,false,true,true,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('jdoe','7812782B6A8C101094D509FC53507AFA0019F681510999FC57FA5E09E79F4570','7503 Rue St Denis',0,'Montreal','Quebec','Canada','H2R2E7','Home','3 Floor Apartment Home',400,3.3,21233,true,true,true,true,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('jdoe','E150B9BE6E00295E88E4659B58191599481430F0CD2095413DB3B6FBE22E9620','251 Av Percival',0,'Montreal','Quebec','Canada','H4X1T8','Home','Architectural Marvel',250,4,213,true,true,true,false,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('dgand','C0031638E846DFC2F1A7723A134383324C51B227B302F75F684C8320192B6981','7766 George Street',2,'Montreal','Quebec','Canada','H8P1E1','Porch','Big deck on back of apartment',80,4.87,23213,false,true,false,false,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('dgand','9D59F8B5541E61B4D0B2800A77EBE281675AB13FE37350C456D09E3E6F3DB5F9','11727 Rue Notre Dame E',20,'Montreal','Quebec','Canada','H1B2X8','Apartment','Top Floor Apartment',34,3.1,12113,true,true,true,false,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('dgand','995629BC7AF715D9A88B35FB28EE18D23C87F1AF707E1F685EC100839CFC84D9','5745 17 Av',1,'Montreal','Quebec','Canada','H1X2R7','Apartment','Simple Montreal Apartment',100,5,5213,true,false,false,false,false);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('dgand','9B8111CEF816337D33A3CD33742C1980BC4EAF5A60E18B17AFD002D6B8955B5D','3708 Rue St Hubert',3,'Montreal','Quebec','Canada','H2L4A2','Apartment','Simple Montreal Apartment',100,0,0,false,false,false,false,false);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('bilbo','D634808F3578E22869AD310D15A2B570F17BF923215DA621C5D68A612800D674','800 Rue Gagne Lasalle',0,'Montreal','Quebec','Canada','H8P3W3','Yard','Big Green Yard with Trees',300,0.7,23,false,true,true,true,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('frodo','143DF2883552099E21E1B6487A2697676DE8F95AF799E28FCE1E8FD9F3AEB0BA','4430 St Catherine Ouest',0,'Montreal','Quebec','Canada','H3Z3E4','Apartment','Small chill compact apartment',200,3.8,3,false,true,true,true,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('frodo','561BA5C96BE25908AD3B7D08F1042763AA51447C6C593503363A720795C0D2B0','5930 Rue Hurteau',4,'Montreal','Quebec','Canada','H4E2Y2','Basement','Big open basement',100,4,99913,true,true,false,true,false);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('gandalf','381E0B5128188039AB32016F106B8D6DE73B5884F1C2939169CCC15E1176F210','717 Charron Street',3,'Montreal','Quebec','Canada','H8P3T8','Loft','Huge views of Mont Royal',300,2.3,657,true,true,false,false,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('gandalf','F57DD77131563FC185623214BA1FB786DBA6EEF6BF208FDFECBE660678FB5B20','2630 St Germain Street',2,'Montreal','Quebec','Canada','H1W2V3','Loft','Views of the St Lawrence',500,1.1,34,false,true,true,true,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('oprah','9F6A7181380048090E82D2082A2A59FDAAEBD3EBF93CDC2AE1C9007069BAFEDE','673044av',0,'Montreal','Quebec','Canada','H1T2P2','Penthouse','Downtown Views',800,4.1,21,true,true,true,true,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('oprah','1882AEC64E12C316C0126CF639FDA5F4246188F9F4DF85F9B25BB2EF06FA861B','1940 Jolicouer Street',0,'Montreal','Quebec','Canada','H4E4M2','Warehouse','Industry views and lots of concrete',350,4.2,213,false,true,true,true,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('oprah','2EC25AA3959F4743EF6DB708A8A4A1ED089BC56243E943495AA5348492B289CA','16 Kenaston Av',0,'Montreal','Quebec','Canada','H3R1L8','Rooftop','Skyline view of downtown with a grill',200,4.5,9913,true,false,true,true,false);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('oprah','45271ED8BC0289331D159E489F5AB0E590EE8E6EBCEAED082ADF3303C4213193','5240 Randall Av',0,'Montreal','Quebec','Canada','H4V2V3','Club','Typical club',1000,3.4,2111113,true,true,false,false,true);
INSERT INTO Places(Username,PlaceID,StreetName,ApartmentNumber,City,Province,Country,PostalCode,TypeOfSpace,Desciption,PricePerNight,Rating,RatingNumber,Pets,Alcohol,Wheelchair,Smoking,OutdoorAccess) VALUES ('catniss','123388A507701765A306910B87098B65032B6827FC3AA6E9BAFE7DF305224B2B','3555 Edouard-Montpetit',0,'Montreal','Quebec','Canada','H3T1K7','Home','Basic Surburban Home',100,3.8,1,true,false,true,true,false);
