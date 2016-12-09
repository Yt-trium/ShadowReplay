------------------------------------------------------------
--        Script Oracle.
------------------------------------------------------------

------------------------------------------------------------
-- Requ�tes SQL 
------------------------------------------------------------

------------------------------------------------------------
-- Nombre de visionnages de vid�os par cat�gories de vid�os, pour les visionnages
-- de moins de deux semaines.
------------------------------------------------------------
/*
Liste des visionnages
SELECT idUser, idEpisode, (CURRENT_TIMESTAMP-dateOfView) FROM History;

Nombre de visionnage de vid�os pour les visionnages de moins de deux semaines
SELECT COUNT(idUser) FROM History WHERE (CURRENT_TIMESTAMP-dateOfView) < '+14 00:00:00';

Cat�gorie d'�pisode pour chaque visionnage
History -> Episodes -> Emissions -> Categories
SELECT idUser, History.idEpisode, name FROM History
INNER JOIN Episodes ON History.idEpisode = Episodes.idEpisode
INNER JOIN Emissions ON Episodes.idEmission = Emissions.idEmission
INNER JOIN Categories ON Emissions.idCategory = Categories.idCategory;
*/

SELECT name, COUNT(idCategory) AS NbVisio FROM History
INNER JOIN Episodes ON History.idEpisode = Episodes.idEpisode
INNER JOIN Emissions ON Episodes.idEmission = Emissions.idEmission
INNER JOIN Categories ON Emissions.idCategory = Categories.idCategory
WHERE (CURRENT_TIMESTAMP-dateOfView) < '+14 00:00:00'
GROUP BY idCategory, name
;

------------------------------------------------------------
-- Par utilisateur, le nombre d'abonnements, de favoris et de vid�os visionn�es.
------------------------------------------------------------
/*
Total d'abonnements, de favoris puis de visionnages
SELECT Users.LOGIN, COUNT(Users.LOGIN) FROM Users
INNER JOIN Subscribe ON Users.idUser = Subscribe.idUser
GROUP BY Users.LOGIN
;
SELECT Users.LOGIN, COUNT(Users.LOGIN) FROM Users
INNER JOIN Favorite ON Users.idUser = Favorite.idUser
GROUP BY Users.LOGIN
;
SELECT Users.LOGIN, COUNT(Users.LOGIN) FROM Users
INNER JOIN History ON Users.idUser = History.idUser
GROUP BY Users.LOGIN
;
*/

WITH
SubscribeTotal AS
(SELECT Users.idUser,count(Subscribe.idEmission) AS ST FROM Users
FULL JOIN Subscribe ON Users.idUser=Subscribe.idUser
GROUP BY Users.idUser),
FavoriteTotal AS
(SELECT Users.idUser,count(Favorite.idEpisode) AS FT FROM Users
FULL JOIN Favorite ON Users.idUser=Favorite.idUser
GROUP BY Users.idUser),
HistoryTotal AS
(SELECT Users.idUser,count(History.idEpisode) AS HT FROM Users
FULL JOIN History ON Users.idUser=History.idUser
GROUP BY Users.idUser)
SELECT login, ST, HT, FT, ST+HT+FT FROM Users
NATURAL JOIN SubscribeTotal
NATURAL JOIN FavoriteTotal
NATURAL JOIN HistoryTotal;

------------------------------------------------------------
-- Pour chaque vid�o, le nombre de visionnages par des utilisateurs fran�ais,
-- le nombre de visionnage par des utilisateurs allemands, la diff�rence entre
-- les deux, tri�s par valeur absolue de la diff�rence entre les deux.
------------------------------------------------------------

SELECT Episodes.title, COUNT(Episodes.idEpisode) FROM Episodes
INNER JOIN History ON Episodes.idEpisode = History.idEpisode
INNER JOIN Users ON Users.idUser = History.idUser
WHERE Users.NATIONALITY = 'FR'
GROUP BY Episodes.title, Episodes.idEpisode
;

SELECT Episodes.title, COUNT(Episodes.idEpisode) FROM Episodes
INNER JOIN History ON Episodes.idEpisode = History.idEpisode
INNER JOIN Users ON Users.idUser = History.idUser
WHERE Users.NATIONALITY = 'DE'
GROUP BY Episodes.title, Episodes.idEpisode
;

WITH
TotalAll AS
(SELECT Episodes.title, 0 FROM Episodes),
TotalFR AS
(SELECT Episodes.title, COUNT(Episodes.title) AS TFR FROM Episodes
FULL JOIN History ON Episodes.idEpisode = History.idEpisode
FULL JOIN Users ON Users.idUser = History.idUser
WHERE Users.NATIONALITY = 'FR'
GROUP BY Episodes.title),
TotalDE AS
(SELECT Episodes.title, COUNT(Episodes.title) AS TDE FROM Episodes
FULL JOIN History ON Episodes.idEpisode = History.idEpisode
FULL JOIN Users ON Users.idUser = History.idUser
WHERE Users.NATIONALITY = 'DE'
GROUP BY Episodes.title)
SELECT title, TFR, TDE FROM Episodes
NATURAL JOIN TotalALL
NATURAL JOIN TotalFR
NATURAL JOIN TotalDE;


------------------------------------------------------------
-- Les �pisodes d'�missions qui ont au moins deux fois plus de visionnage que la
-- moyenne des visionnages des autres �pisodes de l'�mission.
------------------------------------------------------------
/*
Calcul de la moyenne par émission (pour le moment juste le nombre d'épisode par emissions)
*/
SELECT Emissions.IdEmission, COUNT(Emissions.IdEmission) AS NbEpisodes
FROM Emissions
INNER JOIN Episodes ON Episodes.IdEmission = Emissions.IdEmission
GROUP BY Emissions.idEmission
ORDER BY Emissions.IdEmission
;

SELECT  p.idEmission, (COUNT(h.idEpisode)) from Episodes v 
FULL JOIN History h ON v.idEpisode= h.idEpisode
FULL JOIN Emissions p ON v.idEmission= p.idEmission
GROUP BY p.idEmission
ORDER BY p.idEmission
;

------------------------------------------------------------
-- Les 10 couples de vid�os apparaissant le plus souvent simultan�ment dans un
-- historique de visionnage d'utilisateur.
------------------------------------------------------------
/*
Pour chaque vidéos existante, je cherche dans les historique de tout le monde
Pour chaque autres vidéos (index supérieur) le nombre de fois ou il apparaissent
Une fois fait, je tri le tout et limit le nombre d'affichage à 10
*/

