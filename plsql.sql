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
CREATE OR REPLACE FUNCTION episode_to_json(e_id NUMBER)
RETURN VARCHAR2
IS
  return_text VARCHAR2(32000):= '{' || CHR(10);
  CURSOR cursor_episode_informations IS
  SELECT * FROM Episodes WHERE idEpisode = e_id;
  
  idEpisode_var NUMBER(10,0);
	title_var VARCHAR2 (256);
	description_var CLOB;
	duration_var NUMBER(10,0);
	country_var VARCHAR2 (128);
	imageFormat_var VARCHAR2 (16);
	multiLanguage_var NUMBER(10,0);
	firstBroadcasting_var DATE;
	lastBroadcasting_var DATE;
	nb_var NUMBER(10,0);
	idEmission_var NUMBER(10,0);
  
BEGIN
  OPEN cursor_episode_informations;  
  
	FETCH cursor_episode_informations INTO
  idEpisode_var, title_var, description_var, duration_var,
  country_var, imageFormat_var, multiLanguage_var, firstBroadcasting_var,
  lastBroadcasting_var, nb_var, idEmission_var;
   
	return_text:=CONCAT(return_text,'"idEpisode": ');
	return_text:=CONCAT(return_text,idEpisode_var);
	return_text:=CONCAT(return_text,','||CHR(10));
	return_text:=CONCAT(return_text,'"title": "');
	return_text:=CONCAT(return_text,title_var);
	return_text:=CONCAT(return_text,'",'||CHR(10));
	return_text:=CONCAT(return_text,'"description": "');
	return_text:=CONCAT(return_text,description_var);
	return_text:=CONCAT(return_text,'",'||CHR(10));
	return_text:=CONCAT(return_text,'"duration": ');
	return_text:=CONCAT(return_text,duration_var);
	return_text:=CONCAT(return_text,','||CHR(10));
	return_text:=CONCAT(return_text,'"country": "');
	return_text:=CONCAT(return_text,country_var);
	return_text:=CONCAT(return_text,'",'||CHR(10));
   
	return_text:=CONCAT(return_text,'"imageFormat": "');
	return_text:=CONCAT(return_text,imageFormat_var);
	return_text:=CONCAT(return_text,'",'||CHR(10));
	return_text:=CONCAT(return_text,'"multiLanguage": ');
	return_text:=CONCAT(return_text,multiLanguage_var);
	return_text:=CONCAT(return_text,','||CHR(10));
	return_text:=CONCAT(return_text,'"firstBroadcasting": "');
	return_text:=CONCAT(return_text,firstBroadcasting_var);
	return_text:=CONCAT(return_text,'",'||CHR(10));
	return_text:=CONCAT(return_text,'"lastBroadcasting": "');
	return_text:=CONCAT(return_text,lastBroadcasting_var);
	return_text:=CONCAT(return_text,'",'||CHR(10));
	return_text:=CONCAT(return_text,'"nb": ');
	return_text:=CONCAT(return_text,nb_var);
	return_text:=CONCAT(return_text,','||CHR(10));
    
	return_text:=CONCAT(return_text,'"idEmission": ');
	return_text:=CONCAT(return_text,idEmission_var);
	return_text:=CONCAT(return_text,CHR(10));
  
  return_text := CONCAT(return_text,'}');
	RETURN return_text;
END;
/

-- TEST
BEGIN
   dbms_output.put_line(episode_to_json(1));
END;
/
------------------------------------------------------------
-- Définir une procédure qui générera un texte initial de la newsletter en y
-- ajoutant la liste de toutes les sorties de la semaine.
------------------------------------------------------------

CREATE OR REPLACE PROCEDURE print_newsletter
IS
BEGIN
   dbms_output.put_line('Les sorties de la semaine :');
   dbms_output.put_line(create_newsletter());
END;
/

CREATE OR REPLACE FUNCTION create_newsletter
RETURN VARCHAR2
IS
	tmp_title VARCHAR2(256);
  return_text VARCHAR2(4096):= '';
	CURSOR cursor_episodes_title IS
  SELECT title FROM Episodes
	WHERE (CURRENT_TIMESTAMP-lastBroadcasting) > '-7 00:00:00'
  AND   (CURRENT_TIMESTAMP-lastBroadcasting) < '-0 00:00:00';
BEGIN
	OPEN cursor_episodes_title;
  
  LOOP
		FETCH cursor_episodes_title INTO tmp_title;
		EXIT WHEN cursor_episodes_title%NOTFOUND;
		return_text:=CONCAT(return_text,tmp_title);
		return_text:=CONCAT(return_text,CHR(10));
	END LOOP;
  
  CLOSE cursor_episodes_title;
	RETURN return_text;
END;
/

-- TEST
BEGIN
   print_newsletter();
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
/*
2 Vidéos / Catégories maximum
Les vidéos doivent êtres sortie les 2 dernières semaines
*/
CREATE OR REPLACE FUNCTION suggestion_generator(u_id NUMBER)
RETURN VARCHAR2
IS
	tmp_title VARCHAR2(256);
  return_text VARCHAR2(4096):= '';
BEGIN
	RETURN return_text;
END;
/

-- TEST
BEGIN
   dbms_output.put_line('Liste des vidéos populaires, conseillées pour utilisateur 1 :');
   dbms_output.put_line(suggestion_generator(1));
   dbms_output.put_line('Liste des vidéos populaires, conseillées pour utilisateur 2 :');
   dbms_output.put_line(suggestion_generator(2));
END;
/