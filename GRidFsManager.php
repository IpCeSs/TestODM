<?php
require 'vendor/autoload.php';
require 'GridFsTest.php';
use JPC\MongoDB\ODM\Factory\DocumentManagerFactory;

//On crée une nouvelle instance de DocumentManagerfactory
$factory= new DocumentManagerFactory();
//On applique la fonction createDocumentManager à notre nouvelle
//instance. Ce qui permet de connecter à la db et qui comprends l'instanciation
//d'un objet de la classe DocumentManager
$documentManager=$factory->createDocumentManager($mongouri, $dbname)
// instancition d'un nouvel objet de la classe GridFsTest
//dans lequel on insert des données grâce aux méthodes de la classe Document
// dont hérite notre classe GridFsTest
$doc= new GridFsTest();
$doc->setId("id");
//nom du fichier à enregistrer
$doc->setFilename("hello.txt");
//tye de fichier
$doc->setContentType("text/plain");
//setMeta est une fonction de la classe que nous avons créee
$doc->setMeta1("valeur_de_meta1");
$doc->setStream(fopen("hello.txt",'r'));

//on persit et sauve
$documentManager->persist($doc);
$documentManager->flush();




