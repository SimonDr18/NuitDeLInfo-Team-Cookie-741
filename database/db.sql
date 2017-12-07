#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP TABLE Participe;
DROP TABLE Propose;
DROP TABLE PossedeImages;
DROP TABLE PossedeVideos;
DROP TABLE Poser_Question;
DROP TABLE Est_present;
DROP TABLE Renseigner;
DROP TABLE GROUPESOIREE;
DROP TABLE EVENEMENT;
DROP TABLE FORMATIONS;
DROP TABLE LOCALISATION;
DROP TABLE QUALITE_ROUTE;
DROP TABLE IMAGES;
DROP TABLE VIDEOS;
DROP TABLE ORGANISATEUR;
DROP TABLE MEMBRE;


#------------------------------------------------------------
# Table: MEMBRE
#------------------------------------------------------------

CREATE TABLE MEMBRE(
        idU           int (11) Auto_increment  NOT NULL ,
        nom           Varchar (25) ,
        prenom        Varchar (25) ,
        login         Varchar (42) ,
        adresse_Email Varchar (100) NOT NULL ,
        mdp           Varchar (30) NOT NULL ,
        age           Int NOT NULL ,
        ville         Varchar (25) ,
        PRIMARY KEY (idU)
);


#------------------------------------------------------------
# Table: GROUPESOIREE
#------------------------------------------------------------

CREATE TABLE GROUPESOIREE(
        idGroupeSoiree int (11) Auto_increment  NOT NULL ,
        adresse        Varchar (100) ,
        dateDeb        Datetime NOT NULL ,
        dateFin        Datetime ,
        PRIMARY KEY (idGroupeSoiree)
);


#------------------------------------------------------------
# Table: EVENEMENT
#------------------------------------------------------------

CREATE TABLE EVENEMENT(
        idEvent        int (11) Auto_increment  NOT NULL ,
        titreEvent     Varchar (25) ,
        type           Varchar (25) NOT NULL ,
        nbBlesse       Int ,
        idLocalisation Int NOT NULL ,
        PRIMARY KEY (idEvent)
);


#------------------------------------------------------------
# Table: FORMATIONS
#------------------------------------------------------------

CREATE TABLE FORMATIONS(
        idForma    int (11) Auto_increment  NOT NULL ,
        titreForma Varchar (25) NOT NULL ,
        typeFoma   Varchar (25) NOT NULL ,
        contenu    Varchar (500) NOT NULL ,
        PRIMARY KEY (idForma)
);


#------------------------------------------------------------
# Table: LOCALISATION
#------------------------------------------------------------

CREATE TABLE LOCALISATION(
        idLocalisation int (11) Auto_increment  NOT NULL ,
        latitude       Float NOT NULL ,
        longitude      Float NOT NULL ,
        PRIMARY KEY (idLocalisation )
);


#------------------------------------------------------------
# Table: QUALITE_ROUTE
#------------------------------------------------------------

CREATE TABLE QUALITE_ROUTE(
        idQualite   int (11) Auto_increment  NOT NULL ,
        Etat_Route  Varchar (25) NOT NULL ,
        Departement Int NOT NULL ,
        NomRoute    Varchar (25) NOT NULL ,
        kilometre   Float NOT NULL ,
        PRIMARY KEY (idQualite)
);


#------------------------------------------------------------
# Table: IMAGES
#------------------------------------------------------------

CREATE TABLE IMAGES(
        idImage     int (11) Auto_increment  NOT NULL ,
        nomImage    Varchar (25) NOT NULL ,
        tailleImage Int NOT NULL ,
        resolution  Varchar (25) NOT NULL ,
        PRIMARY KEY (idImage)
);


#------------------------------------------------------------
# Table: VIDEOS
#------------------------------------------------------------

CREATE TABLE VIDEOS(
        idVideo     int (11) Auto_increment  NOT NULL ,
        nomVideo    Varchar (25) NOT NULL ,
        tailleVideo Int NOT NULL ,
        duree       Time NOT NULL ,
        PRIMARY KEY (idVideo )
);


#------------------------------------------------------------
# Table: ORGANISATEUR
#------------------------------------------------------------

CREATE TABLE ORGANISATEUR(
        idOrg int (11) Auto_increment  NOT NULL ,
        idU   Int NOT NULL ,
        PRIMARY KEY (idOrg )
);


#------------------------------------------------------------
# Table: Participe
#------------------------------------------------------------

CREATE TABLE Participe(
        estSAM         Bool NOT NULL ,
        idGroupeSoiree Int NOT NULL ,
        idU            Int NOT NULL ,
        PRIMARY KEY (idGroupeSoiree ,idU)
);


#------------------------------------------------------------
# Table: Propose
#------------------------------------------------------------

CREATE TABLE Propose(
        idForma Int NOT NULL ,
        idOrg   Int NOT NULL ,
        PRIMARY KEY (idForma ,idOrg )
);


#------------------------------------------------------------
# Table: PossedeImages
#------------------------------------------------------------

CREATE TABLE PossedeImages(
        idForma Int NOT NULL ,
        idImage Int NOT NULL ,
        PRIMARY KEY (idForma ,idImage )
);


#------------------------------------------------------------
# Table: PossedeVideos
#------------------------------------------------------------

CREATE TABLE PossedeVideos(
        idForma Int NOT NULL ,
        idVideo Int NOT NULL ,
        PRIMARY KEY (idForma ,idVideo )
);


#------------------------------------------------------------
# Table: Poser_Question
#------------------------------------------------------------

CREATE TABLE Poser_Question(
        Question Varchar (250) NOT NULL ,
        idU      Int NOT NULL ,
        idForma  Int NOT NULL ,
        PRIMARY KEY (idU ,idForma )
);


#------------------------------------------------------------
# Table: Renseigner
#------------------------------------------------------------

CREATE TABLE Renseigner(
        idQualite Int NOT NULL ,
        idU       Int NOT NULL ,
        PRIMARY KEY (idQualite ,idU )
);


#------------------------------------------------------------
# Table: Est_present
#------------------------------------------------------------

CREATE TABLE Est_present(
        idEvent Int NOT NULL ,
        idU     Int NOT NULL ,
        PRIMARY KEY (idEvent ,idU )
);

ALTER TABLE EVENEMENT ADD CONSTRAINT FK_EVENEMENT_IDLocalisation FOREIGN KEY (idLocalisation) REFERENCES LOCALISATION(idLocalisation);
ALTER TABLE ORGANISATEUR ADD CONSTRAINT FK_ORGANISATEUR_idU FOREIGN KEY (idU) REFERENCES MEMBRE(idU);
ALTER TABLE Participe ADD CONSTRAINT FK_Participe_IDGroupeSoiree FOREIGN KEY (idGroupeSoiree) REFERENCES GROUPESOIREE(idGroupeSoiree);
ALTER TABLE Participe ADD CONSTRAINT FK_Participe_idU FOREIGN KEY (idU) REFERENCES MEMBRE(idU);
ALTER TABLE Propose ADD CONSTRAINT FK_Propose_IDForma FOREIGN KEY (idForma) REFERENCES FORMATIONS(idForma);
ALTER TABLE Propose ADD CONSTRAINT FK_Propose_idOrg FOREIGN KEY (idOrg) REFERENCES ORGANISATEUR(idOrg);
ALTER TABLE PossedeImages ADD CONSTRAINT FK_PossedeImages_IDForma FOREIGN KEY (idForma) REFERENCES FORMATIONS(idForma);
ALTER TABLE PossedeImages ADD CONSTRAINT FK_PossedeImages_IDImage FOREIGN KEY (idImage) REFERENCES IMAGES(idImage);
ALTER TABLE PossedeVideos ADD CONSTRAINT FK_PossedeVideos_IDForma FOREIGN KEY (idForma) REFERENCES FORMATIONS(idForma);
ALTER TABLE PossedeVideos ADD CONSTRAINT FK_PossedeVideos_IDVideo FOREIGN KEY (idVideo) REFERENCES VIDEOS(idVideo);
ALTER TABLE Poser_Question ADD CONSTRAINT FK_Poser_Question_idU FOREIGN KEY (idU) REFERENCES MEMBRE(idU);
ALTER TABLE Poser_Question ADD CONSTRAINT FK_Poser_Question_IDForma FOREIGN KEY (idForma) REFERENCES FORMATIONS(idForma);
ALTER TABLE Renseigner ADD CONSTRAINT FK_renseigner_IDQualite FOREIGN KEY (idQualite) REFERENCES QUALITE_ROUTE(idQualite);
ALTER TABLE Renseigner ADD CONSTRAINT FK_renseigner_idU FOREIGN KEY (idU) REFERENCES MEMBRE(idU);
ALTER TABLE Est_present ADD CONSTRAINT FK_Est_present_IDEvent FOREIGN KEY (idEvent) REFERENCES EVENEMENT(idEvent);
ALTER TABLE Est_present ADD CONSTRAINT FK_Est_present_idU FOREIGN KEY (idU) REFERENCES MEMBRE(idU);
