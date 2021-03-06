CREATE TABLE Utilisateur (
    id_utilisateur SERIAL,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    email VARCHAR(50),
    CONSTRAINT pkUtilisateur PRIMARY KEY (id_utilisateur)
);

CREATE TABLE Auteur(
    id_auteur INTEGER PRIMARY KEY,
    FOREIGN KEY (id_auteur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Admin(
    id_admin INTEGER PRIMARY KEY,
    FOREIGN KEY (id_admin) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Rubrique(
    nom VARCHAR(30) PRIMARY KEY,
    rub_mere VARCHAR(30),
    FOREIGN KEY (rub_mere) REFERENCES Rubrique(nom)
);

CREATE TABLE Article(
	id_article SERIAL,
	id_pers INTEGER NOT NULL,
	titre VARCHAR(30),
	date_publi DATE,
	rubrique VARCHAR(30) NOT NULL,
	CONSTRAINT pkArticle PRIMARY KEY (id_article),
	FOREIGN KEY (rubrique) REFERENCES Rubrique(nom),
	FOREIGN KEY (id_pers) REFERENCES Auteur(id_auteur)
);

CREATE TABLE Mot_clef(
	mot VARCHAR(30) PRIMARY KEY
);

CREATE TABLE Version(
	id_version INTEGER,
	id_article INTEGER,
	date_modif DATE,
	FOREIGN KEY (id_article) REFERENCES Article (id_article),
	PRIMARY KEY (id_article, id_version)
);

CREATE TABLE Image(
	id_contenu INTEGER,
	id_version INTEGER,
	id_article INTEGER,
	titre VARCHAR(50),
	source VARCHAR(80),
	position INTEGER,
	PRIMARY KEY (id_contenu, id_version,  id_article),
	FOREIGN KEY (id_version, id_article) REFERENCES Version(id_version, id_article)
);

CREATE TABLE Texte(
	id_contenu INTEGER,
	id_version INTEGER,
	id_article INTEGER,
	titre VARCHAR(50),
	contenu TEXT,
	position INTEGER,
	PRIMARY KEY (id_contenu, id_version,  id_article),
	FOREIGN KEY (id_version, id_article) REFERENCES Version (id_version, id_article)
);


CREATE TABLE Comporter_MC(
    id_article INTEGER,
    mot_clef VARCHAR(30),
    PRIMARY KEY(id_article, mot_clef),
    FOREIGN KEY (id_article) REFERENCES Article (id_article),
    FOREIGN KEY (mot_clef) REFERENCES Mot_clef(mot)
);
