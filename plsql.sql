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
(
idEp IN NUMBER(10,0)
)
RETURN VARCHAR2 IS
   ret Episodes.title%Type;
BEGIN
   SELECT title INTO ret
   FROM Episodes
   WHERE idEpisode = idEp;
   RETURN ret;
END;
/

DECLARE
   s VARCHAR2(256);
BEGIN
   dbms_output.put_line('popopooooo');
   dbms_output.put_line( 'Salaire de 7369 avant augmentation ' || F_Test_Augmentation( 2 ) ) ;
   dbms_output.put(s);
END;
/

CREATE OR REPLACE FUNCTION F_Test_Augmentation
       (
         PN$Numemp IN Episodes.idEpisode%Type
       ) Return NUMBER
   IS
      LN$Salaire Episodes.idEpisode%Type ;
   BEGIN
        Select idEpisode Into LN$Salaire From Episodes Where idEpisode = PN$Numemp ;
        LN$Salaire := LN$Salaire * 2 ;
     Return( LN$Salaire ) ;
  END;
   /

------------------------------------------------------------
-- Définir une procédure qui générera un texte initial de la newsletter en y
-- ajoutant la liste de toutes les sorties de la semaine.
------------------------------------------------------------

CREATE OR REPLACE FUNCTION newsletter
RETURN VARCHAR2 IS
   ret VARCHAR2(2048);
BEGIN
   SELECT title INTO ret
   FROM Episodes
   WHERE (CURRENT_TIMESTAMP-lastBroadcasting) < '+7 00:00:00';
   RETURN ret;
END;
/

DECLARE
   s VARCHAR2(2048);
BEGIN
   dbms_output.put_line('Newsleter :');
   dbms_output.put(newsletter());
END;
/

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


