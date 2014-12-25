--AJOUT DU CHAMP mdp en VARCHAR(255) (255 car mdp crypté en sha1 et donc long.)
ALTER TABLE UTILISATEUR
ADD mdp VARCHAR(255) NOT NULL;
