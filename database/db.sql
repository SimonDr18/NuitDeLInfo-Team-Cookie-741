#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: MEMBRE
#------------------------------------------------------------

CREATE TABLE MEMBRE(
        IDU           int (11) Auto_increment  NOT NULL ,
        Nom           Varchar (25) ,
        Prenom        Varchar (25) ,
        login         Varchar (42) ,
        Adresse_Email Varchar (100) NOT NULL ,
        MDP           Varchar (30) NOT NULL ,
        Age           Int NOT NULL ,
        Ville         Varchar (25) ,
        PRIMARY KEY (IDU )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: GROUPESOIREE
#------------------------------------------------------------

CREATE TABLE GROUPESOIREE(
        IDGroupeSoiree int (11) Auto_increment  NOT NULL ,
        Adresse        Varchar (100) ,
        DateDeb        Datetime NOT NULL ,
        DateFin        Datetime ,
        PRIMARY KEY (IDGroupeSoiree )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: EVENEMENT
#------------------------------------------------------------

CREATE TABLE EVENEMENT(
        IDEvent        int (11) Auto_increment  NOT NULL ,
        TitreEvent     Varchar (25) ,
        Type           Varchar (25) NOT NULL ,
        NbBlesse       Int ,
        IDLocalisation Int NOT NULL ,
        PRIMARY KEY (IDEvent )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: FORMATIONS
#------------------------------------------------------------

CREATE TABLE FORMATIONS(
        IDForma    int (11) Auto_increment  NOT NULL ,
        TitreForma Varchar (25) NOT NULL ,
        TypeFoma   Varchar (25) NOT NULL ,
        Contenu    Varchar (500) NOT NULL ,
        PRIMARY KEY (IDForma )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LOCALISATION
#------------------------------------------------------------

CREATE TABLE LOCALISATION(
        IDLocalisation int (11) Auto_increment  NOT NULL ,
        Latitude       Float NOT NULL ,
        Longitude      Float NOT NULL ,
        PRIMARY KEY (IDLocalisation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: QUALITE_ROUTE
#------------------------------------------------------------

CREATE TABLE QUALITE_ROUTE(
        IDQualite   int (11) Auto_increment  NOT NULL ,
        Etat_Route  Varchar (25) NOT NULL ,
        Departement Int NOT NULL ,
        NomRoute    Varchar (25) NOT NULL ,
        KIlometre   Float NOT NULL ,
        PRIMARY KEY (IDQualite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: IMAGES
#------------------------------------------------------------

CREATE TABLE IMAGES(
        IDImage     int (11) Auto_increment  NOT NULL ,
        NomImage    Varchar (25) NOT NULL ,
        TailleImage Int NOT NULL ,
        Resolution  Varchar (25) NOT NULL ,
        PRIMARY KEY (IDImage )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: VIDEOS
#------------------------------------------------------------

CREATE TABLE VIDEOS(
        IDVideo     int (11) Auto_increment  NOT NULL ,
        NomVideo    Varchar (25) NOT NULL ,
        TailleVideo Int NOT NULL ,
        Duree       Time NOT NULL ,
        PRIMARY KEY (IDVideo )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ORGANISATEUR
#------------------------------------------------------------

CREATE TABLE ORGANISATEUR(
        idOrg int (11) Auto_increment  NOT NULL ,
        IDU   Int NOT NULL ,
        PRIMARY KEY (idOrg )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participe
#------------------------------------------------------------

CREATE TABLE Participe(
        estSAM         Bool NOT NULL ,
        IDGroupeSoiree Int NOT NULL ,
        IDU            Int NOT NULL ,
        PRIMARY KEY (IDGroupeSoiree ,IDU )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Propose
#------------------------------------------------------------

CREATE TABLE Propose(
        IDForma Int NOT NULL ,
        idOrg   Int NOT NULL ,
        PRIMARY KEY (IDForma ,idOrg )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PossedeImages
#------------------------------------------------------------

CREATE TABLE PossedeImages(
        IDForma Int NOT NULL ,
        IDImage Int NOT NULL ,
        PRIMARY KEY (IDForma ,IDImage )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PossedeVideos
#------------------------------------------------------------

CREATE TABLE PossedeVideos(
        IDForma Int NOT NULL ,
        IDVideo Int NOT NULL ,
        PRIMARY KEY (IDForma ,IDVideo )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Poser_Question
#------------------------------------------------------------

CREATE TABLE Poser_Question(
        Question Varchar (250) NOT NULL ,
        IDU      Int NOT NULL ,
        IDForma  Int NOT NULL ,
        PRIMARY KEY (IDU ,IDForma )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: renseigner
#------------------------------------------------------------

CREATE TABLE renseigner(
        IDQualite Int NOT NULL ,
        IDU       Int NOT NULL ,
        PRIMARY KEY (IDQualite ,IDU )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Est_present
#------------------------------------------------------------

CREATE TABLE Est_present(
        IDEvent Int NOT NULL ,
        IDU     Int NOT NULL ,
        PRIMARY KEY (IDEvent ,IDU )
)ENGINE=InnoDB;

ALTER TABLE EVENEMENT ADD CONSTRAINT FK_EVENEMENT_IDLocalisation FOREIGN KEY (IDLocalisation) REFERENCES LOCALISATION(IDLocalisation);
ALTER TABLE ORGANISATEUR ADD CONSTRAINT FK_ORGANISATEUR_IDU FOREIGN KEY (IDU) REFERENCES MEMBRE(IDU);
ALTER TABLE Participe ADD CONSTRAINT FK_Participe_IDGroupeSoiree FOREIGN KEY (IDGroupeSoiree) REFERENCES GROUPESOIREE(IDGroupeSoiree);
ALTER TABLE Participe ADD CONSTRAINT FK_Participe_IDU FOREIGN KEY (IDU) REFERENCES MEMBRE(IDU);
ALTER TABLE Propose ADD CONSTRAINT FK_Propose_IDForma FOREIGN KEY (IDForma) REFERENCES FORMATIONS(IDForma);
ALTER TABLE Propose ADD CONSTRAINT FK_Propose_idOrg FOREIGN KEY (idOrg) REFERENCES ORGANISATEUR(idOrg);
ALTER TABLE PossedeImages ADD CONSTRAINT FK_PossedeImages_IDForma FOREIGN KEY (IDForma) REFERENCES FORMATIONS(IDForma);
ALTER TABLE PossedeImages ADD CONSTRAINT FK_PossedeImages_IDImage FOREIGN KEY (IDImage) REFERENCES IMAGES(IDImage);
ALTER TABLE PossedeVideos ADD CONSTRAINT FK_PossedeVideos_IDForma FOREIGN KEY (IDForma) REFERENCES FORMATIONS(IDForma);
ALTER TABLE PossedeVideos ADD CONSTRAINT FK_PossedeVideos_IDVideo FOREIGN KEY (IDVideo) REFERENCES VIDEOS(IDVideo);
ALTER TABLE Poser_Question ADD CONSTRAINT FK_Poser_Question_IDU FOREIGN KEY (IDU) REFERENCES MEMBRE(IDU);
ALTER TABLE Poser_Question ADD CONSTRAINT FK_Poser_Question_IDForma FOREIGN KEY (IDForma) REFERENCES FORMATIONS(IDForma);
ALTER TABLE renseigner ADD CONSTRAINT FK_renseigner_IDQualite FOREIGN KEY (IDQualite) REFERENCES QUALITE_ROUTE(IDQualite);
ALTER TABLE renseigner ADD CONSTRAINT FK_renseigner_IDU FOREIGN KEY (IDU) REFERENCES MEMBRE(IDU);
ALTER TABLE Est_present ADD CONSTRAINT FK_Est_present_IDEvent FOREIGN KEY (IDEvent) REFERENCES EVENEMENT(IDEvent);
ALTER TABLE Est_present ADD CONSTRAINT FK_Est_present_IDU FOREIGN KEY (IDU) REFERENCES MEMBRE(IDU);
