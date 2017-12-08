CREATE TABLE MEMBRE(
        idU           int (11)  NOT NULL ,
        nom           Varchar (25) ,
        prenom        Varchar (25) ,
        login         Varchar (42) ,
        adresse_Email Varchar (100) NOT NULL ,
        mdp           Varchar (30) NOT NULL ,
        age           Int NOT NULL ,
        ville         Varchar (25) ,
        PRIMARY KEY (idU)
);

CREATE TABLE GROUPESOIREE(
        idGroupeSoiree int (11) NOT NULL ,
        adresse        Varchar (100) ,
        dateDeb        Datetime NOT NULL ,
        dateFin        Datetime ,
        PRIMARY KEY (idGroupeSoiree)
);

CREATE TABLE FORMATIONS(
        idForma    int (11) NOT NULL ,
        titreForma Varchar (25) NOT NULL ,
        typeFoma   Varchar (25) NOT NULL ,
        contenu    Varchar (500) NOT NULL ,
        PRIMARY KEY (idForma)
);

CREATE TABLE LOCALISATION(
        idLocalisation int (11) NOT NULL ,
        latitude       Float NOT NULL ,
        longitude      Float NOT NULL ,
        PRIMARY KEY (idLocalisation)
);

CREATE TABLE QUALITE_ROUTE(
        idQualite   int (11) NOT NULL ,
        Etat_Route  Varchar (25) NOT NULL ,
        Departement Int NOT NULL ,
        NomRoute    Varchar (25) NOT NULL ,
        kilometre   Float NOT NULL ,
        PRIMARY KEY (idQualite)
);

CREATE TABLE IMAGES(
        idImage     int (11) NOT NULL ,
        nomImage    Varchar (25) NOT NULL ,
        tailleImage Int NOT NULL ,
        resolution  Varchar (25) NOT NULL ,
        PRIMARY KEY (idImage)
);

CREATE TABLE VIDEOS(
        idVideo     int (11) NOT NULL ,
        nomVideo    Varchar (25) NOT NULL ,
        tailleVideo Int NOT NULL ,
        duree       Time NOT NULL ,
        PRIMARY KEY (idVideo)
);

CREATE TABLE EVENEMENT(
        idEvent        int (11) NOT NULL ,
        titreEvent     Varchar (25) ,
        type           Varchar (25) NOT NULL ,
        nbBlesse       Int ,
        idLocalisation Int NOT NULL ,
        PRIMARY KEY (idEvent),
        FOREIGN KEY (idLocalisation) REFERENCES LOCALISATION(idLocalisation)
);

CREATE TABLE ORGANISATEUR(
        idOrg int (11) NOT NULL ,
        idU   Int NOT NULL ,
        PRIMARY KEY (idOrg),
        FOREIGN KEY (idU) REFERENCES MEMBRE(idU)
);

CREATE TABLE Participe(
        estSAM         Bool NOT NULL ,
        idGroupeSoiree Int NOT NULL ,
        idU            Int NOT NULL ,
        PRIMARY KEY (idGroupeSoiree ,idU),
        FOREIGN KEY (idGroupeSoiree) REFERENCES GROUPESOIREE(idGroupeSoiree),
        FOREIGN KEY (idU) REFERENCES MEMBRE(idU)
);

CREATE TABLE Propose(
        idForma Int NOT NULL ,
        idOrg   Int NOT NULL ,
        PRIMARY KEY (idForma ,idOrg ),
        FOREIGN KEY (idForma) REFERENCES FORMATIONS(idForma),
        FOREIGN KEY (idOrg) REFERENCES ORGANISATEUR(idOrg)
);

CREATE TABLE PossedeImages(
        idForma Int NOT NULL ,
        idImage Int NOT NULL ,
        PRIMARY KEY (idForma ,idImage),
        FOREIGN KEY (idForma) REFERENCES FORMATIONS(idForma),
        FOREIGN KEY (idImage) REFERENCES IMAGES(idImage)
);

CREATE TABLE PossedeVideos(
        idForma Int NOT NULL ,
        idVideo Int NOT NULL ,
        PRIMARY KEY (idForma ,idVideo),
        FOREIGN KEY (idForma) REFERENCES FORMATIONS(idForma),
        FOREIGN KEY (idVideo) REFERENCES VIDEOS(idVideo)
);

CREATE TABLE Poser_Question(
        Question Varchar (250) NOT NULL ,
        idU      Int NOT NULL ,
        idForma  Int NOT NULL ,
        PRIMARY KEY (idU ,idForma),
        FOREIGN KEY (idU) REFERENCES MEMBRE(idU),
        FOREIGN KEY (idForma) REFERENCES FORMATIONS(idForma)
);

CREATE TABLE Renseigner(
        idQualite Int NOT NULL,
        idU       Int NOT NULL,
        PRIMARY KEY (idQualite ,idU),
        FOREIGN KEY (idQualite) REFERENCES QUALITE_ROUTE(idQualite),
        FOREIGN KEY (idU) REFERENCES MEMBRE(idU)
);

CREATE TABLE Est_present(
        idEvent Int NOT NULL,
        idU     Int NOT NULL,
        PRIMARY KEY (idEvent ,idU),
        FOREIGN KEY (idEvent) REFERENCES EVENEMENT(idEvent),
        FOREIGN KEY (idU) REFERENCES MEMBRE(idU)
);
