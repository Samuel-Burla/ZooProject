<?php
require_once __DIR__ . "/pdo.php";


/* ============= admin only =========== */

// function adminOnly(){
//     header('Location: /')
// }


/* ============= visitors opinion ============ */

function getVisitorsOpinion(PDO $pdo, INT $opinion_id): array
{
    $query = $pdo->prepare("SELECT * FROM opinion WHERE opinion_id=:opinion_id");
    $query->bindValue(":opinion_id", $opinion_id, PDO::PARAM_INT);
    $query->execute();

    $opinion = $query->fetchAll(PDO::FETCH_ASSOC);
    return $opinion;
}

function getVisitorsOpinions(PDO $pdo): array
{
    $query = $pdo->prepare("SELECT * FROM opinion");
    $query->execute();

    $opinions = $query->fetchAll(PDO::FETCH_ASSOC);
    return $opinions;
}

function validateVisitorsOpinions(PDO $pdo, INT $opinion_id)
{
    $query = $pdo->prepare("UPDATE opinion SET isVisible = 1 WHERE opinion_id=:opinion_id");
    $query->bindValue("opinion_id", $opinion_id, PDO::PARAM_INT);
    $query->execute();
}
function invalidateVisitorsOpinions(PDO $pdo, INT $opinion_id)
{
    $query = $pdo->prepare("UPDATE opinion SET isVisible = 0 WHERE opinion_id=:opinion_id");
    $query->bindValue("opinion_id", $opinion_id, PDO::PARAM_INT);
    $query->execute();
}

/* ============= Opening Time =========== */
function getOpeningTime(PDO $pdo): array
{
    $query = $pdo->prepare("SELECT * FROM opening_time");
    $query->execute();

    $opening_time = $query->fetch(PDO::FETCH_ASSOC);
    return $opening_time;
}

function updateOpeningTime(PDO $pdo, string $monday, string $tuesday, string $wednesday, string $thursday, string $friday, string $saturday, string $sunday)
{
    $sql = "UPDATE opening_time SET monday=:monday, tuesday=:tuesday, wednesday=:wednesday, thursday=:thursday, friday=:friday, saturday=:saturday, sunday=:sunday WHERE opening_time_id=1";
    $query = $pdo->prepare($sql);
    $query->bindValue(":monday", $monday, PDO::PARAM_STR);
    $query->bindValue(":tuesday", $tuesday, PDO::PARAM_STR);
    $query->bindValue(":wednesday", $wednesday, PDO::PARAM_STR);
    $query->bindValue(":thursday", $thursday, PDO::PARAM_STR);
    $query->bindValue(":friday", $friday, PDO::PARAM_STR);
    $query->bindValue(":saturday", $saturday, PDO::PARAM_STR);
    $query->bindValue(":sunday", $sunday, PDO::PARAM_STR);
    $query->execute();
}


/* ============= Comment ============ */
function addComment(PDO $pdo, string $pseudo, string $comment)
{
    $sql = "INSERT INTO opinion (pseudo, comment, isVisible	) VALUES (:pseudo, :comment, FALSE)";
    $query = $pdo->prepare($sql);
    $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
    $query->bindValue(":comment", $comment, PDO::PARAM_STR);
    $query->execute();
}

/* ============= Services =========== */
function getServices(PDO $pdo): array
{
    $query = $pdo->prepare("SELECT * FROM service");
    $query->execute();

    $services = $query->fetchAll(PDO::FETCH_ASSOC);
    return $services;
}

function getService(PDO $pdo, int $service_id): array
{
    $query = $pdo->prepare("SELECT * FROM service WHERE service_id=:service_id");
    $query->bindValue(":service_id", $service_id, PDO::PARAM_INT);
    $query->execute();

    $service = $query->fetch(PDO::FETCH_ASSOC);
    return $service;
}

function addService(PDO $pdo, string $serviceName, string $serviceDescription)
{
    $sql = "INSERT INTO service (service_name, description) VALUES (:serviceName, :serviceDescription)";
    $query = $pdo->prepare($sql);
    $query->bindValue(":serviceName", $serviceName, PDO::PARAM_STR);
    $query->bindValue(":serviceDescription", $serviceDescription, PDO::PARAM_STR);
    $query->execute();
}

function updateService(PDO $pdo, string $serviceName, string $serviceDescription, int $service_id)
{
    $sql = "UPDATE service SET service_name=:serviceName, description=:serviceDescription WHERE service_id=:service_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":serviceName", $serviceName, PDO::PARAM_STR);
    $query->bindValue(":serviceDescription", $serviceDescription, PDO::PARAM_STR);
    $query->bindValue(":service_id", $service_id, PDO::PARAM_INT);
    $query->execute();
}

function deleteService(PDO $pdo, int $service_id)
{
    $sql = "DELETE FROM service WHERE service_id=:service_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":service_id", $service_id, PDO::PARAM_INT);
    $query->execute();
}

/* ============= Habitats =========== */
function getHabitats(PDO $pdo): array
{
    $query = $pdo->prepare("SELECT * FROM habitat");
    $query->execute();

    $habitats = $query->fetchAll(PDO::FETCH_ASSOC);
    return $habitats;
}

function getHabitat(PDO $pdo, int|null $habitat_id): array|bool
{
    $query = $pdo->prepare("SELECT * FROM habitat WHERE habitat_id=:habitat_id");
    $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
    $query->execute();

    $habitat = $query->fetch(PDO::FETCH_ASSOC);
    return $habitat;
}

function addHabitat(PDO $pdo, string $habitat_name, string $description)
{
    $sql = "INSERT INTO habitat (habitat_name, description) VALUES (:habitat_name, :description)";
    $query = $pdo->prepare($sql);
    $query->bindValue(":habitat_name", $habitat_name, PDO::PARAM_STR);
    $query->bindValue(":description", $description, PDO::PARAM_STR);
    $query->execute();
}

function updateHabitat(PDO $pdo, string $habitat_name, string $description, int $habitat_id)
{
    $sql = "UPDATE habitat SET habitat_name=:habitat_name, description=:description WHERE habitat_id=:habitat_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":habitat_name", $habitat_name, PDO::PARAM_STR);
    $query->bindValue(":description", $description, PDO::PARAM_STR);
    $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
    $query->execute();
}

function deleteHabitat(PDO $pdo, int $habitat_id)
{
    $sql = "DELETE FROM habitat WHERE habitat_id=:habitat_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
    $query->execute();
}


/* ============= Animals =========== */
function getAnimals(PDO $pdo): array
{
    $query = $pdo->prepare("SELECT * FROM animal JOIN class ON animal.class_id=class.class_id JOIN habitat ON animal.habitat_id=habitat.habitat_id");
    $query->execute();

    $animals = $query->fetchAll(PDO::FETCH_ASSOC);
    return $animals;
}
function getAnimalsByHabitat(PDO $pdo, int $habitat_id): array
{
    $sql = "SELECT * FROM animal WHERE habitat_id=:habitat_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":habitat_id", $habitat_id);
    $query->execute();

    $animals = $query->fetchAll(PDO::FETCH_ASSOC);
    return $animals;
}

function getAnimal(PDO $pdo, int $animal_id): array
{
    $query = $pdo->prepare("SELECT * FROM animal JOIN class ON animal.class_id=class.class_id JOIN habitat ON animal.habitat_id=habitat.habitat_id WHERE animal_id=:animal_id");
    $query->bindValue(":animal_id", $animal_id);
    $query->execute();

    $animal = $query->fetch(PDO::FETCH_ASSOC);
    return $animal;
}

// function getAnimal_by_id(PDO $pdo, int $animal_id) : array
// {
//     $sql = "SELECT * FROM animal WHERE animal_id=:animal_id";
//     $query = $pdo-> prepare($sql);
//     $query->bindValue(":animal_id", $animal_id, PDO::PARAM_INT);
//     $query -> execute();

//     $animal = $query->fetch(PDO::FETCH_ASSOC);
//     return $animal;
// }

function addAnimal(PDO $pdo, string $animal_race, int $habitat_id, int $class_id)
{
    $sql = "INSERT INTO animal (animal_race, habitat_id, class_id) VALUES (:animal_race, :habitat_id, :class_id)";
    $query = $pdo->prepare($sql);
    $query->bindValue(":animal_race", $animal_race, PDO::PARAM_STR);
    $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
    $query->bindValue(":class_id", $class_id, PDO::PARAM_INT);
    $query->execute();
}

function updateAnimal(PDO $pdo, int $animal_id, string $animal_race, string $animal_condition, int $habitat_id, int $class_id)
{
    $sql = "UPDATE animal SET animal_race=:animal_race, animal_condition=:animal_condition, habitat_id=:habitat_id, class_id=:class_id WHERE animal_id=:animal_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":animal_id", $animal_id, PDO::PARAM_INT);
    $query->bindValue(":animal_race", $animal_race, PDO::PARAM_STR);
    $query->bindValue(":animal_condition", $animal_condition, PDO::PARAM_STR);
    $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
    $query->bindValue(":class_id", $class_id, PDO::PARAM_INT);
    $query->execute();
}
function updateAnimalFoodDetails(PDO $pdo, int $animal_id, string $food, string $food_weight, int $food_date_time)
{
    $sql = "UPDATE animal SET food=:food, food_weight=:food_weight, food_date_time=:food_date_time WHERE animal_id=:animal_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":animal_id", $animal_id, PDO::PARAM_INT);
    $query->bindValue(":food", $food, PDO::PARAM_STR);
    $query->bindValue(":food_weight", $food_weight, PDO::PARAM_STR);
    $query->bindValue(":food_date_time", $food_date_time, PDO::PARAM_INT);
    $query->execute();
}

function deleteAnimal(PDO $pdo, int $animal_id)
{
    $sql = "DELETE FROM animal WHERE animal_id=:animal_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":animal_id", $animal_id, PDO::PARAM_INT);
    $query->execute();
}


/* ============= Images =========== */
function addImage(PDO $pdo, $image_data, INT $habitat_id)
{
    $sql = "INSERT INTO image (image_data, habitat_id) VALUES (:image_data, :habitat_id)";
    $query = $pdo->prepare($sql);
    $query->bindValue(":image_data", $image_data);
    $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
    $query->execute();
}
// function getImages(PDO $pdo, INT $image_id, INT $habitat_id) : array
// {
//     $sql = "SELECT * image WHERE image_id=:image_id, habitat_id=:habitat_id)";
//     $query = $pdo->prepare($sql);
//     $query->bindValue(":image_data", $image_id);
//     $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
//     $query->execute();

//     $images = $query->fetchAll(PDO::FETCH_ASSOC);

//     return $images;
// }

// function getImages(PDO $pdo, INT $image_id): array
// {
//     $sql = "SELECT * FROM image WHERE image_id=:image_id";
//     $query = $pdo->prepare($sql);
//     $query->bindValue(":image_id", $image_id, PDO::PARAM_INT);
//     // if($habitat_id){

//     //     $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
//     // }
//     $query->execute();

//     $images = $query->fetchAll(PDO::FETCH_ASSOC);

//     return $images;
// }

/* ============= User =========== */
function getUsers(PDO $pdo): array
{
    $sql = "SELECT * FROM user JOIN role ON user.role_id=role.role_id";
    $query = $pdo->prepare($sql);
    $query->execute();

    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getUser(PDO $pdo, string $username): array|bool
{
    $query = $pdo->prepare("SELECT * FROM user WHERE username=:username");
    $query->bindValue(":username", $username, PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);
    return $user;
}
function getUserAndRole(PDO $pdo, string|null $username): array|bool
{
    $sql = "SELECT * FROM user JOIN role ON user.role_id=role.role_id WHERE user.username=:username";
    $query = $pdo->prepare($sql);
    $query->bindValue("username", $username);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function addUser(PDO $pdo, string $first_name, string $last_name, string $username, string $password, int $role_id)
{
    $sql = "INSERT INTO user (first_name, last_name, username, password, role_id) VALUES (:first_name, :last_name, :username, :password, :role_id)";
    $query = $pdo->prepare($sql);

    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

    $query->bindValue(":first_name", $first_name, PDO::PARAM_STR);
    $query->bindValue(":last_name", $last_name, PDO::PARAM_STR);
    $query->bindValue(":username", $username, PDO::PARAM_STR);
    $query->bindValue(":password", $passwordHashed, PDO::PARAM_STR);
    $query->bindValue(":role_id", $role_id, PDO::PARAM_INT);
    $query->execute();
}

function updateUser(PDO $pdo, string $first_name, string $last_name, string $username, int $role_id)
{
    $sql = "UPDATE user SET first_name=:first_name, last_name=:last_name, role_id=:role_id WHERE username=:username";
    $query = $pdo->prepare($sql);
    $query->bindValue(":first_name", $first_name, PDO::PARAM_STR);
    $query->bindValue(":last_name", $last_name, PDO::PARAM_STR);
    $query->bindValue(":username", $username, PDO::PARAM_STR);
    $query->bindValue(":role_id", $role_id, PDO::PARAM_INT);
    $query->execute();
}

function deleteUser(PDO $pdo, string $username)
{
    $sql = "DELETE FROM user WHERE username=:username";
    $query = $pdo->prepare($sql);
    $query->bindValue(":username", $username, PDO::PARAM_STR);
    $query->execute();
}

function getImages(PDO $pdo, INT $image_id): array
{
    $sql = "SELECT * FROM image WHERE image_id=:image_id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":image_id", $image_id, PDO::PARAM_INT);
    // if($habitat_id){

    //     $query->bindValue(":habitat_id", $habitat_id, PDO::PARAM_INT);
    // }
    $query->execute();

    $images = $query->fetchAll(PDO::FETCH_ASSOC);

    return $images;
}

/* ============= Veterinarian opinion =========== */
function getVeterinarianOpinions(PDO $pdo): array
{
    $query = $pdo->prepare("SELECT * FROM veterinary_opinion");
    $query->execute();

    $veterinary_opinions = $query->fetchAll(PDO::FETCH_ASSOC);
    return $veterinary_opinions;
}

function getVeterinarianOpinion(PDO $pdo, int $animal_id): array
{
    $query = $pdo->prepare("SELECT * FROM veterinary_opinion WHERE animal_id=:animal_id");
    $query->bindValue(":animal_id", $animal_id, PDO::PARAM_INT);
    $query->execute();

    $veterinarianOpinion = $query->fetch(PDO::FETCH_ASSOC);
    return $veterinarianOpinion;
}

function addVeterinarianOpinion(PDO $pdo, string $recommended_food, string $recommended_food_weight, string $animal_condition_details, string $username, int $date, int $animal_id)
{
    $sql = "INSERT INTO veterinary_opinion (recommended_food, recommended_food_weight,animal_condition_details, username, date, animal_id ) VALUES (:recommended_food, :recommended_food_weight, :animal_condition_details, :username, :date, :animal_id)";
    $query = $pdo->prepare($sql);
    $query->bindValue(":recommended_food", $recommended_food, PDO::PARAM_STR);
    $query->bindValue(":recommended_food_weight", $recommended_food_weight, PDO::PARAM_STR);
    $query->bindValue(":animal_condition_details", $animal_condition_details, PDO::PARAM_STR);
    $query->bindValue(":username", $username, PDO::PARAM_STR);
    $query->bindValue(":date", $date, PDO::PARAM_INT);
    $query->bindValue(":animal_id", $animal_id, PDO::PARAM_INT);
    $query->execute();
}
