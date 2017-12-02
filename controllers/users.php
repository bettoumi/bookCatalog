<?php

require '../model/dbconnexion/dbconnexion.php';
require '../model/bookManager.php';
$bd=connex_bdd();
$bookManager= new BookCatalogManager($bd);

 function loadclass($class)
{
   require '../entities/'.$class.'.php';
}
spl_autoload_register('loadclass');

/**
 * Add  user in data base
 * 
 */
  if( isset($_POST['adduser']) AND  isset($_POST['name']) AND !empty($_POST['name'] ) AND
         isset($_POST['adresse']) AND !empty($_POST['adresse'] ))
         

    {

    	  // var_dump($_POST);
       $infoUser=['name'=>htmlspecialchars($_POST['name']),
                   'adresse'=>htmlspecialchars($_POST['adresse'])

       ];

         $user= new User($infoUser);
         
       $bookManager->addUser($user);

    }




/**
 * All users from data base
 */

$users= $bookManager->allUser() ;




include "../views/usersvue.php";
