
/* ========== DATABASE ========== */ 
DROP DATABASE IF EXISTS Zoo;
CREATE DATABASE IF NOT EXISTS Zoo;


USE Zoo;

CREATE TABLE IF NOT EXISTS `role`(
    role_id INT NOT NULL AUTO_INCREMENT,
    role_label VARCHAR(255) NOT NULL,
    PRIMARY KEY(role_id)
);

/* ========== TABLES ========== */ 
CREATE TABLE IF NOT EXISTS user (
    username VARCHAR(255) NOT NULL, 
    password VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    PRIMARY KEY (username),
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);


CREATE TABLE IF NOT EXISTS `service`(
    service_id INT NOT NULL AUTO_INCREMENT,
    service_name VARCHAR(255) NOT NULL,
    description TEXT(1000) NOT NULL,
    PRIMARY KEY(service_id)
);

CREATE TABLE IF NOT EXISTS `image`(
    image_id INT NOT NULL AUTO_INCREMENT,
    image_data BLOB,
    habitat_id INT,
    PRIMARY KEY(image_id)
);

CREATE TABLE IF NOT EXISTS `habitat`(
    habitat_id INT NOT NULL AUTO_INCREMENT,
    habitat_name VARCHAR(255) NOT NULL,
    description TEXT(1000) NOT NULL,
    habitat_comment VARCHAR(255),
    image_id INT,
    PRIMARY KEY(habitat_id)
);

CREATE TABLE IF NOT EXISTS `class`(
    class_id INT AUTO_INCREMENT NOT NULL,
    class_label VARCHAR(255),
    PRIMARY KEY (class_id)
);

CREATE TABLE IF NOT EXISTS `animal`(
    animal_id INT NOT NULL AUTO_INCREMENT,
    animal_race VARCHAR(255) NOT NULL,
    animal_condition VARCHAR(255),
    food VARCHAR(255),
    food_weight VARCHAR(255),
    food_date_time INT,
    veterinary_opinion_id INT,
    habitat_id INT,
    class_id INT,
    PRIMARY KEY(animal_id),
    FOREIGN KEY(habitat_id) REFERENCES habitat(habitat_id),
    FOREIGN KEY(class_id) REFERENCES class(class_id)
);

CREATE TABLE IF NOT EXISTS `veterinary_opinion`(
    veterinary_opinion_id INT NOT NULL AUTO_INCREMENT,
    date INT NOT NULL,
    recommended_food VARCHAR(255) NOT NULL,
    recommended_food_weight VARCHAR(255) NOT NULL,
    animal_condition_details VARCHAR(255),
    username VARCHAR(255),
    animal_id INT,
    PRIMARY KEY(veterinary_opinion_id),
    FOREIGN KEY(username) REFERENCES user(username),
    FOREIGN KEY(animal_id) REFERENCES animal(animal_id)
);

CREATE TABLE IF NOT EXISTS `opinion`(
    opinion_id INT NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(50),
    comment VARCHAR(255),
    isVisible BIT NOT NULL DEFAULT 0,
    PRIMARY KEY(opinion_id)
);

CREATE TABLE IF NOT EXISTS `opening_time`(
    opening_time_id INT NOT NULL AUTO_INCREMENT,
    monday VARCHAR(255),
    tuesday VARCHAR(255),
    wednesday VARCHAR(255),
    thursday VARCHAR(255),
    friday VARCHAR(255),
    saturday VARCHAR(255),
    sunday VARCHAR(255),
    PRIMARY KEY(opening_time_id)
);

/* ========== ALTER TABLES ========== */ 
ALTER TABLE image
ADD FOREIGN KEY(habitat_id) REFERENCES habitat(habitat_id);

ALTER TABLE habitat
ADD FOREIGN KEY(image_id) REFERENCES image(image_id);

ALTER TABLE animal
ADD FOREIGN KEY(veterinary_opinion_id) REFERENCES veterinary_opinion(veterinary_opinion_id);

/* ========== ALTER TABLES ========== */ 

INSERT INTO service (service_name, description)
VALUES 
("Petit tours en train", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error"),
("Visite guidée", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error"),
("restaurants", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error"),
("Dormir au Zoo", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error");

INSERT INTO habitat (habitat_name, description)
VALUES 
("Desert", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error"),
("Forêt tropicale", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error"),
("Savane", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error"),
("Zone polaire", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error"),
("Milieu marin", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error"),
("Montagne", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore , optio officia error.Illum quas ut molestiae labore , optio officia error");

INSERT INTO class (class_label)
VALUES 
("mammifères"),
("oiseaux"),
("reptiles"),
("poissons"),
("amphibiens");

INSERT INTO animal (animal_race, animal_condition, habitat_id, class_id)
VALUES 
("Lézard", "Bon état", 1 , 3 ),
("Chameau", "Bon état", 1 , 1 ),
("Cobra égyptien", "Bon état", 1 , 3 ),
("Ara rouge", "Bon état", 2 , 2 ),
("grenouille", "Bon état", 2 , 5 ),
("puma", "Bon état", 2 , 1 ),
("serpent", "très bon état", 2, 3),
("Croco", "très bon état", 2, 3),
("zebre", "moyen", 3, 1),
("elephant", "mauvais etat", 3, 1),
("tigre", "moyen", 3, 1),
("Lion", "très bon état", 3, 1),
("Ours polaire", "Bon état", 4 , 1 ),
("gloutons", "Bon état", 4 , 1 ),
("baleine bleue", "Bon état", 4 , 1 ),
("Tortue", "moyen", 5, 3),
("Requin Blanc", "Bon état", 5 , 4 ),
("Piranha", "Bon état", 5 , 4 ),
("flamant rose", "mauvais etat", 5, 2),
("faucon", "plus ou moins état", 6, 2),
("Aigle", "mauvais etat", 6, 2);


INSERT INTO role (role_label)
VALUES 
("admin"),
("veterinaire"),
("employé");

INSERT INTO user (username, password, last_name, first_name, role_id)
VALUES 
("José.arcad@mail.com", "A7bcZ/n?Wn4z", "Arcad", "José", 1),
("Denis.Avenall@mail.com", "test", "Avenall", "Denis", 2),
("Julie.Varieur@mail.com", "test", "Varieur", "Julie", 3),
("Pont.Dupont@mail.com", "test", "Dupont", "Pont", 3),
("Mario.Montagne@mail.com", "test", "Montagne", "Mario", 2),
("Victoire.Bernier@mail.com", "test", "Bernier", "Victoire", 3),
("Mandel.Cressac@mail.com", "test", "Cressac", "Mandel", 2),
("Geneviève.Lamontagne@mail.com", "test", "Lamontagne", "Geneviève", 3),
("Émile.Gagné@mail.com", "test", "Gagné", "Émile", 3);

INSERT INTO opening_time (monday, tuesday, wednesday, thursday, friday, saturday, sunday)
VALUES 
("9H - 18H", "9H - 18H", "9H - 18H", "9H - 18H", "9H - 18H", "9H - 18H", "9H - 18H" );

INSERT INTO veterinary_opinion (date, recommended_food, recommended_food_weight, animal_condition_details, username, animal_id)
VALUES 
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 1 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 2 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 3 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 4 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 5 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 6 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 7 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 8 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 9 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 10 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 11 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 12 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 13 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 14 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 15 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 16 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 17 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 18 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 19 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 20 ),
(1715904000, "viande rouge", "1kg/jour","En très bon état, de tous les point de vue.","Denis.Avenall@mail.com", 21 );

INSERT INTO opinion (pseudo,  comment, isVisible)
VALUES 
("Gérard", "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio", 0 ),
("Mathieu", "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio", 0 ),
("Luc", "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio", 0 ),
("Bertrand", "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio", 0 ),
("Bernard", "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio", 0 ),
("Vincent", "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio", 0 );