------------------------------------------------------------
--        Script Oracle.
------------------------------------------------------------

------------------------------------------------------------
-- Requêtes SQL 
------------------------------------------------------------

------------------------------------------------------------
-- Nombre de visionnages de vidéos par catégories de vidéos, pour les visionnages
-- de moins de deux semaines.
------------------------------------------------------------
/*
Liste des visionnages
SELECT idUser, idEpisode, (CURRENT_TIMESTAMP-dateOfView) FROM History;

Nombre de visionnage de vidéos pour les visionnages de moins de deux semaines
SELECT COUNT(idUser) FROM History WHERE (CURRENT_TIMESTAMP-dateOfView) < '+14 00:00:00';

Catégorie d'épisode pour chaque visionnage
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
-- Par utilisateur, le nombre d'abonnements, de favoris et de vidéos visionnées.
------------------------------------------------------------
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

/* En une seul requête ? THQ login_1 = 10 login_2 = 10*/
SELECT Users.LOGIN, COUNT(Users.LOGIN) AS NB FROM Users
INNER JOIN Subscribe ON Users.idUser = Subscribe.idUser
INNER JOIN Favorite ON Users.idUser = Favorite.idUser
INNER JOIN History ON Users.idUser = History.idUser
GROUP BY Users.LOGIN
;

SELECT Users.LOGIN, COUNT(Users.LOGIN)
FROM Subscribe
GROUP BY Users.LOGIN
;

/*
SELECT Users.LOGIN, Emissions.EMISSIONNAME FROM Users
INNER JOIN Subscribe ON Users.idUser = Subscribe.idUser
INNER JOIN Emissions ON Subscribe.idEmission = Emissions.idEmission
GROUP BY Users.LOGIN, Emissions.EMISSIONNAME
;

SELECT Emissions.EMISSIONNAME, COUNT(Emissions.EMISSIONNAME) FROM Users
INNER JOIN Subscribe ON Users.idUser = Subscribe.idUser
INNER JOIN Emissions ON Subscribe.idEmission = Emissions.idEmission
GROUP BY Emissions.EMISSIONNAME
;
*/

------------------------------------------------------------
-- Pour chaque vidéo, le nombre de visionnages par des utilisateurs français,
-- le nombre de visionnage par des utilisateurs allemands, la différence entre
-- les deux, triés par valeur absolue de la différence entre les deux.
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

------------------------------------------------------------
-- Les épisodes d'émissions qui ont au moins deux fois plus de visionnage que la
-- moyenne des visionnages des autres épisodes de l'émission.
------------------------------------------------------------

------------------------------------------------------------
-- Les 10 couples de vidéos apparaissant le plus souvent simultanément dans un
-- historique de visionnage d'utilisateur.
------------------------------------------------------------
