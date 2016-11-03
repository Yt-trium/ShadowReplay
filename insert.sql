------------------------------------------------------------
--        Script Oracle.
------------------------------------------------------------

------------------------------------------------------------
-- Insert data in all tables
------------------------------------------------------------

------------------------------------------------------------
-- Table: Users
------------------------------------------------------------
INSERT INTO Users VALUES
(1,'Login_1','Password_1','LastName_1','FirstName_1',TO_DATE('1990/01/01', 'yyyy/mm/dd'),'email11@email.com',1,'FR');
INSERT INTO Users VALUES
(2,'Login_2','Password_2','LastName_2','FirstName_2',TO_DATE('1990/01/01', 'yyyy/mm/dd'),'email12@email.com',1,'DE');
INSERT INTO Users VALUES
(3,'Login_3','Password_3','LastName_3','FirstName_3',TO_DATE('1990/01/01', 'yyyy/mm/dd'),'email13@email.com',1,'FR');
INSERT INTO Users VALUES
(4,'Login_4','Password_4','LastName_4','FirstName_4',TO_DATE('1990/01/01', 'yyyy/mm/dd'),'email14@email.com',0,'DE');

------------------------------------------------------------
-- Table: Categories
------------------------------------------------------------
INSERT INTO Categories VALUES
(1, 'Culture');
INSERT INTO Categories VALUES
(2, 'Cinéma');
INSERT INTO Categories VALUES
(3, 'Série');
INSERT INTO Categories VALUES
(4, 'Sciences');

------------------------------------------------------------
-- Table: Emissions
------------------------------------------------------------
INSERT INTO Emissions VALUES
(1, 'South-Park', 3);
INSERT INTO Emissions VALUES
(2, 'Game of Thrones', 3);
INSERT INTO Emissions VALUES
(3, 'Lucifer', 3);
INSERT INTO Emissions VALUES
(4, 'Friends', 3);
INSERT INTO Emissions VALUES
(5, 'E-Penser', 4);
INSERT INTO Emissions VALUES
(6, 'Sous les jupons de l histoire', 1);
INSERT INTO Emissions VALUES
(7, 'Star Wars', 2);

------------------------------------------------------------
-- TEST CONSTRAINT
-- INSERT INTO Emissions VALUES
-- (6, 'Test', 5);
-- Erreur SQL : ORA-02291: violation de contrainte d'intégrité (X) - clé parent introuvable
-- 02291. 00000 - "integrity constraint (%s.%s) violated - parent key not found"
-- Cause:    A foreign key value has no matching primary key value.
-- Action:   Delete the foreign key or add a matching primary key.
------------------------------------------------------------

------------------------------------------------------------
-- Table: Episodes
------------------------------------------------------------
INSERT INTO Episodes VALUES
(1,'Episode 1','Episode Number 1',3600,'USA','4:3',1,TO_DATE('2015/01/01', 'yyyy/mm/dd'),TO_DATE('2016/10/27', 'yyyy/mm/dd'),1,1);
INSERT INTO Episodes VALUES
(2,'Episode 2','Episode Number 2',3600,'USA','4:3',1,TO_DATE('2015/01/01', 'yyyy/mm/dd'),TO_DATE('2016/10/28', 'yyyy/mm/dd'),2,1);
INSERT INTO Episodes VALUES
(3,'Episode 3','Episode Number 3',3600,'USA','4:3',1,TO_DATE('2015/01/01', 'yyyy/mm/dd'),TO_DATE('2016/10/29', 'yyyy/mm/dd'),3,1);
INSERT INTO Episodes VALUES
(4,'Episode 4','Episode Number 4',3600,'USA','4:3',1,TO_DATE('2015/01/01', 'yyyy/mm/dd'),TO_DATE('2016/10/30', 'yyyy/mm/dd'),4,1);
INSERT INTO Episodes VALUES
(5,'Episode 5','Episode Number 5',3600,'USA','4:3',1,TO_DATE('2015/01/01', 'yyyy/mm/dd'),TO_DATE('2016/10/31', 'yyyy/mm/dd'),5,1);
INSERT INTO Episodes VALUES
(6,'GOT EP1','GOT Episode Number 1',3600,'USA','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/10/30', 'yyyy/mm/dd'),1,2);
INSERT INTO Episodes VALUES
(7,'GOT EP2','GOT Episode Number 2',3600,'USA','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/10/30', 'yyyy/mm/dd'),2,2);
INSERT INTO Episodes VALUES
(8,'E-Penser 1','E-Penser first video',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/01', 'yyyy/mm/dd'),1,5);
INSERT INTO Episodes VALUES
(9,'E-Penser 2','E-Penser second video',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/01', 'yyyy/mm/dd'),2,5);
INSERT INTO Episodes VALUES
(10,'Napoleon','Napoleon le Conquerant',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/01', 'yyyy/mm/dd'),1,6);
INSERT INTO Episodes VALUES
(11,'Star Wars VII','Star Wars Episode VII',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/01', 'yyyy/mm/dd'),7,7);
INSERT INTO Episodes VALUES
(12,'Star Wars IV','Star Wars Episode IV',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2014/11/01', 'yyyy/mm/dd'),4,7);
-- Sortie de la semaine
INSERT INTO Episodes VALUES
(13,'GOT EP3','GOT Episode Number 3',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/06', 'yyyy/mm/dd'),3,2);
INSERT INTO Episodes VALUES
(14,'GOT EP4','GOT Episode Number 4',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/06', 'yyyy/mm/dd'),4,2);
INSERT INTO Episodes VALUES
(15,'GOT EP5','GOT Episode Number 5',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/06', 'yyyy/mm/dd'),5,2);
INSERT INTO Episodes VALUES
(16,'GOT EP6','GOT Episode Number 6',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/06', 'yyyy/mm/dd'),6,2);
INSERT INTO Episodes VALUES
(17,'GOT EP7','GOT Episode Number 7',1800,'FR','16:9',1,TO_DATE('2014/01/01', 'yyyy/mm/dd'),TO_DATE('2016/11/25', 'yyyy/mm/dd'),7,2);
------------------------------------------------------------
-- Table: Groups
------------------------------------------------------------
INSERT INTO Groups VALUES
(1,'admin');
INSERT INTO Groups VALUES
(2,'modo');

------------------------------------------------------------
-- Table: Archives
------------------------------------------------------------
INSERT INTO Archives VALUES
(1,'Friends Episode 1','Friends Episode Number 1',3600,'USA','4:3',1,TO_DATE('2012/01/01', 'yyyy/mm/dd'),TO_DATE('2014/10/31', 'yyyy/mm/dd'),1,4);

------------------------------------------------------------
-- Table: Interested
------------------------------------------------------------
INSERT INTO Interested VALUES
(1,1);
INSERT INTO Interested VALUES
(1,2);
INSERT INTO Interested VALUES
(1,3);
INSERT INTO Interested VALUES
(2,4);
INSERT INTO Interested VALUES
(3,4);

------------------------------------------------------------
-- Table: Subscribe
------------------------------------------------------------
INSERT INTO Subscribe VALUES
(1,3);
INSERT INTO Subscribe VALUES
(2,2);
INSERT INTO Subscribe VALUES
(3,1);
INSERT INTO Subscribe VALUES
(1,1);
INSERT INTO Subscribe VALUES
(1,7);

------------------------------------------------------------
-- Table: Favorite
------------------------------------------------------------
INSERT INTO Favorite VALUES
(1,1);
INSERT INTO Favorite VALUES
(1,3);
INSERT INTO Favorite VALUES
(1,7);
INSERT INTO Favorite VALUES
(2,7);
INSERT INTO Favorite VALUES
(3,6);
INSERT INTO Favorite VALUES
(3,7);

------------------------------------------------------------
-- Table: History
------------------------------------------------------------
/*
INSERT INTO History VALUES
(CURRENT_TIMESTAMP,1,1);
INSERT INTO History VALUES
(CURRENT_TIMESTAMP,2,1);
INSERT INTO History VALUES
(CURRENT_TIMESTAMP,3,1);
INSERT INTO History VALUES
(CURRENT_TIMESTAMP,3,5);

INSERT INTO History VALUES
(TO_DATE('2014/01/01', 'yyyy/mm/dd'),2,2);
INSERT INTO History VALUES
(TO_DATE('2014/01/01', 'yyyy/mm/dd'),2,3);
INSERT INTO History VALUES
(TO_DATE('2014/01/01', 'yyyy/mm/dd'),2,4);

INSERT INTO History VALUES
(CURRENT_TIMESTAMP,1,8);
INSERT INTO History VALUES
(CURRENT_TIMESTAMP,2,8);
INSERT INTO History VALUES
(CURRENT_TIMESTAMP,3,8);
INSERT INTO History VALUES
(CURRENT_TIMESTAMP,1,10);
INSERT INTO History VALUES
(CURRENT_TIMESTAMP,1,11);
INSERT INTO History VALUES
(TO_DATE('2014/01/01', 'yyyy/mm/dd'),2,11);
*/

INSERT INTO History VALUES
(0,CURRENT_TIMESTAMP,1,1);
INSERT INTO History VALUES
(1,CURRENT_TIMESTAMP,2,1);
INSERT INTO History VALUES
(2,CURRENT_TIMESTAMP,3,1);
INSERT INTO History VALUES
(3,CURRENT_TIMESTAMP,3,5);

INSERT INTO History VALUES
(4,TO_DATE('2014/01/01', 'yyyy/mm/dd'),2,2);
INSERT INTO History VALUES
(5,TO_DATE('2014/01/01', 'yyyy/mm/dd'),2,3);
INSERT INTO History VALUES
(6,TO_DATE('2014/01/01', 'yyyy/mm/dd'),2,4);

INSERT INTO History VALUES
(7,CURRENT_TIMESTAMP,1,8);
INSERT INTO History VALUES
(8,CURRENT_TIMESTAMP,2,8);
INSERT INTO History VALUES
(9,CURRENT_TIMESTAMP,3,8);
INSERT INTO History VALUES
(10,CURRENT_TIMESTAMP,1,10);
INSERT INTO History VALUES
(11,CURRENT_TIMESTAMP,1,11);
INSERT INTO History VALUES
(12,TO_DATE('2014/01/01', 'yyyy/mm/dd'),2,11);
INSERT INTO History VALUES
(13,TO_DATE('2014/01/01', 'yyyy/mm/dd'),4,11);

------------------------------------------------------------
-- Table: BelongsTo
------------------------------------------------------------
INSERT INTO BelongsTo VALUES
(1,1);
