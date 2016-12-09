------------------------------------------------------------
--        Script Oracle.
------------------------------------------------------------

------------------------------------------------------------
-- Contraintes d’intégrité
------------------------------------------------------------

------------------------------------------------------------
-- Un utilisateur aura un maximum de ​300​ vidéos en favoris
------------------------------------------------------------

CREATE OR REPLACE TRIGGER fav_max
BEFORE INSERT ON Favorite
FOR EACH ROW
BEGIN
  IF(SELECT COUNT(idUser) FROM Favorite WHERE idUser = NEW.idUser > 300)
  THEN
  END IF;
END;
  
------------------------------------------------------------
-- Si une diffusion d’une émission est ajoutée, les dates de disponibilités
-- seront mises à jour. La nouvelle date de fin de disponibilité sera la date
-- de la dernière diffusion plus ​14​ jours
------------------------------------------------------------


------------------------------------------------------------
-- La suppression d’une vidéo entraînera son archivage dans une table des
-- vidéos qui ne sont plus accessibles par le site de replay
------------------------------------------------------------

------------------------------------------------------------
-- Afin de limiter le spam de visionnage, un utilisateur ne pourra pas lancer
-- plus de ​3 visionnages par minute.
------------------------------------------------------------