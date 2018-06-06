<?php

require 'vendor/autoload.php';
require 'TestODM.php';

use JPC\MongoDB\ODM\Factory\DocumentManagerFactory;
$factory= new DocumentManagerFactory();
$documentManager=$factory->createDocumentManager("mongodb+srv://@minichat.mongodb.net/test?retryWrites=true","minichat");

/**
 * pour récupérer les infos de la bdd
 * on appliquera les fonctions find(), findAll()... de DocumentManager
 * sur $repository
 */
$repository = $documentManager->getRepository("TestODM");

$obj= new TestODM();
$obj->setFirstName("Zpu");
$obj->setLastName("Zpu");
var_dump($obj);
//on persiste l'objet pour que mongoDB sache que c'est à lui de le gérer
$documentManager->persist($obj);

$obj2= new TestODM();
$obj2->setFirstName("cess");
$obj2->setLastName("cess");
$documentManager->persist($obj2);
var_dump($obj2);
//on enregistre flush()
$documentManager->flush();
//on supprime l'objet $obj
$documentManager->remove($obj);
//on enregistre flush()
$documentManager->flush();

// on affiche tous les documents de la collection grâce à la fonction
//findAll() de la classe DocumentManager Factory
var_dump($repository->findAll());
