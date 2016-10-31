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
--- Nombre de visionnage de vidéos pour les visionnages de moins de deux semaines
--SELECT idUser, (CURRENT_TIMESTAMP-dateOfView) FROM History;
SELECT COUNT(idUser) FROM History WHERE (CURRENT_TIMESTAMP-dateOfView) < '+14 00:00:00';
--- Nombre de visionnage de vidéos par catégories de vidéos
---- TODO ----

------------------------------------------------------------
-- Par utilisateur, le nombre d’abonnements, de favoris et de vidéos visionnées.
------------------------------------------------------------

------------------------------------------------------------
-- Pour chaque vidéo, le nombre de visionnages par des utilisateurs français,
-- le nombre de visionnage par des utilisateurs allemands, la différence entre
-- les deux, triés par valeur absolue de la différence entre les deux.
------------------------------------------------------------

------------------------------------------------------------
-- Les épisodes d’émissions qui ont au moins deux fois plus de visionnage que la
-- moyenne des visionnages des autres épisodes de l’émission.
------------------------------------------------------------

------------------------------------------------------------
-- Les 10 couples de vidéos apparaissant le plus souvent simultanément dans un
-- historique de visionnage d’utilisateur.
------------------------------------------------------------