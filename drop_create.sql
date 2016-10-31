------------------------------------------------------------
--        Script Oracle.
------------------------------------------------------------

------------------------------------------------------------
-- Drop and purge all tables
------------------------------------------------------------

DROP TABLE BelongsTo PURGE;
DROP TABLE History PURGE;
DROP TABLE Favorite PURGE;
DROP TABLE Subscribe PURGE;
DROP TABLE Interested PURGE;
DROP TABLE Archives PURGE;
DROP TABLE Groups PURGE;
DROP TABLE Episodes PURGE;
DROP TABLE Emissions PURGE;
DROP TABLE Categories PURGE;
DROP TABLE Users PURGE;


------------------------------------------------------------
-- Create all tables
------------------------------------------------------------

------------------------------------------------------------
-- Table: Users
------------------------------------------------------------
CREATE TABLE Users(
	idUser      NUMBER(10,0)  NOT NULL  ,
	login       VARCHAR2 (64)NOT NULL  ,
	password    VARCHAR2 (64) NOT NULL  ,
	lastname    VARCHAR2 (64) NOT NULL  ,
	firstname   VARCHAR2 (64) NOT NULL  ,
	birth       DATE  NOT NULL  ,
	email       VARCHAR2 (320) NOT NULL  ,
	newsletter  NUMBER (1) NOT NULL  ,
	CONSTRAINT Users_Pk PRIMARY KEY (idUser) ,
	CONSTRAINT CHK_BOOLEAN_newsletter CHECK (newsletter IN (0,1)) ,
	CONSTRAINT Users_Uniq UNIQUE (login)
);

------------------------------------------------------------
-- Table: Categories
------------------------------------------------------------
CREATE TABLE Categories(
	idCategory  NUMBER(10,0)  NOT NULL  ,
	name        VARCHAR2 (512) NOT NULL  ,
	CONSTRAINT Categories_Pk PRIMARY KEY (idCategory)
);

------------------------------------------------------------
-- Table: Emissions
------------------------------------------------------------
CREATE TABLE Emissions(
	idEmission    NUMBER(10,0)  NOT NULL  ,
	emissionName  VARCHAR2 (255) NOT NULL  ,
	idCategory    NUMBER(10,0)  NOT NULL  ,
	CONSTRAINT Emissions_Pk PRIMARY KEY (idEmission)
);

------------------------------------------------------------
-- Table: Episodes
------------------------------------------------------------
CREATE TABLE Episodes(
	idEpisode          NUMBER(10,0)  NOT NULL  ,
	title              VARCHAR2 (256) NOT NULL  ,
	description        CLOB  NOT NULL  ,
	duration           NUMBER(10,0)  NOT NULL  ,
	country            VARCHAR2 (128) NOT NULL  ,
	imageFormat        VARCHAR2 (16) NOT NULL  ,
	multiLanguage      NUMBER(10,0)  NOT NULL  ,
	firstBroadcasting  DATE  NOT NULL  ,
	lastBroadcasting   DATE  NOT NULL  ,
	idEmission         NUMBER(10,0)  NOT NULL  ,
	CONSTRAINT Episodes_Pk PRIMARY KEY (idEpisode)
);

------------------------------------------------------------
-- Table: Groups
------------------------------------------------------------
CREATE TABLE Groups(
	idGroup  NUMBER(10,0)  NOT NULL  ,
	name     VARCHAR2 (64) NOT NULL  ,
	CONSTRAINT Groups_Pk PRIMARY KEY (idGroup)
);

------------------------------------------------------------
-- Table: Archives
------------------------------------------------------------
CREATE TABLE Archives(
	idArchive          NUMBER(10,0)  NOT NULL  ,
	title              VARCHAR2 (256) NOT NULL  ,
	description        CLOB  NOT NULL  ,
	duration           NUMBER (10,0) NOT NULL  ,
	country            VARCHAR2 (128) NOT NULL  ,
	imageFormat        VARCHAR2 (16) NOT NULL  ,
	multiLanguage      NUMBER (10,0) NOT NULL  ,
	firstBroadcasting  DATE  NOT NULL  ,
	lastBroadcasting   DATE  NOT NULL  ,
	idEmission         NUMBER(10,0)  NOT NULL  ,
	CONSTRAINT Archives_Pk PRIMARY KEY (idArchive)
);
------------------------------------------------------------
-- Table: Interested
------------------------------------------------------------
CREATE TABLE Interested(
	idUser      NUMBER(10,0)  NOT NULL  ,
	idCategory  NUMBER(10,0)  NOT NULL  ,
	CONSTRAINT Interested_Pk PRIMARY KEY (idUser,idCategory)
);

------------------------------------------------------------
-- Table: Subscribe
------------------------------------------------------------
CREATE TABLE Subscribe(
	idUser      NUMBER(10,0)  NOT NULL  ,
	idEmission  NUMBER(10,0)  NOT NULL  ,
	CONSTRAINT Subscribe_Pk PRIMARY KEY (idUser,idEmission)
);

------------------------------------------------------------
-- Table: Favorite
------------------------------------------------------------
CREATE TABLE Favorite(
	idUser     NUMBER(10,0)  NOT NULL  ,
	idEpisode  NUMBER(10,0)  NOT NULL  ,
	CONSTRAINT Favorite_Pk PRIMARY KEY (idUser,idEpisode)
);

------------------------------------------------------------
-- Table: History
------------------------------------------------------------
CREATE TABLE History(
	dateOfView  DATE  NOT NULL  ,
	idUser      NUMBER(10,0)  NOT NULL  ,
	idEpisode   NUMBER(10,0)  NOT NULL  ,
	CONSTRAINT History_Pk PRIMARY KEY (idUser,idEpisode)
);

------------------------------------------------------------
-- Table: BelongsTo
------------------------------------------------------------
CREATE TABLE BelongsTo(
	idUser   NUMBER(10,0)  NOT NULL  ,
	idGroup  NUMBER(10,0)  NOT NULL  ,
	CONSTRAINT BelongsTo_Pk PRIMARY KEY (idUser,idGroup)
);

------------------------------------------------------------
-- Alter table for relation between tables
------------------------------------------------------------

ALTER TABLE Emissions ADD FOREIGN KEY (idCategory) REFERENCES Categories(idCategory);
ALTER TABLE Episodes ADD FOREIGN KEY (idEmission) REFERENCES Emissions(idEmission);
ALTER TABLE Archives ADD FOREIGN KEY (idEmission) REFERENCES Emissions(idEmission);
ALTER TABLE Interested ADD FOREIGN KEY (idUser) REFERENCES Users(idUser);
ALTER TABLE Interested ADD FOREIGN KEY (idCategory) REFERENCES Categories(idCategory);
ALTER TABLE Subscribe ADD FOREIGN KEY (idUser) REFERENCES Users(idUser);
ALTER TABLE Subscribe ADD FOREIGN KEY (idEmission) REFERENCES Emissions(idEmission);
ALTER TABLE Favorite ADD FOREIGN KEY (idUser) REFERENCES Users(idUser);
ALTER TABLE Favorite ADD FOREIGN KEY (idEpisode) REFERENCES Episodes(idEpisode);
ALTER TABLE History ADD FOREIGN KEY (idUser) REFERENCES Users(idUser);
ALTER TABLE History ADD FOREIGN KEY (idEpisode) REFERENCES Episodes(idEpisode);
ALTER TABLE BelongsTo ADD FOREIGN KEY (idUser) REFERENCES Users(idUser);
ALTER TABLE BelongsTo ADD FOREIGN KEY (idGroup) REFERENCES Groups(idGroup);
