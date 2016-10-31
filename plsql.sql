------------------------------------------------------------
--        Script Oracle.
------------------------------------------------------------

------------------------------------------------------------
-- Procédure et fonctions PL/SQL 
------------------------------------------------------------

------------------------------------------------------------
-- Définir une fonction qui convertit au format ​json ​les informations
-- d’une vidéo.
------------------------------------------------------------

CREATE OR REPLACE FUNCTION episodeToJson
RETURN number IS
   total number(2) := 0;
BEGIN
   SELECT count(*) into total
   FROM history;
   
   RETURN total;
END;
/

DECLARE
   c number(2);
BEGIN
   dbms_output.put_line('popopooooo');
   c := episodeToJson();
   dbms_output.put_line('Total no. of Customers: ' || c);
END;
/

------------------------------------------------------------
-- Définir une procédure qui générera un texte initial de la newsletter en y
-- ajoutant la liste de toutes les sorties de la semaine.
------------------------------------------------------------

------------------------------------------------------------
-- Définir une procédure qui génère ​N épisodes, un par semaine, entre une
-- date de début et une date de fin indiquées en paramètre de la procédure.
-- L’incrémentation du numéro d’épisode partira du dernier épisode dans la base.
-- Le descriptif de l’épisode sera « à venir »
------------------------------------------------------------

------------------------------------------------------------
-- Générer la liste des vidéos populaires, conseillées pour un utilisateur,
-- c’est à dire fonction des catégories de vidéos qu’il suit.
------------------------------------------------------------