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





$id=htmlspecialchars($_GET['id']);



 $book= $bookManager->selectBook((int)$id);
 
 /**
 * Recive all users from data base
 * 
 */
$users=$bookManager-> allUsers() ;
// var_dump($book);



 /*
   	        update book if it is borrowed
    */
   	  if( isset($_POST['toBorrowed']) AND  isset($_POST['idbook']) AND !empty($_POST['idbook'] ) and isset($_POST['userid']) AND !empty($_POST['userid'] ))
     	
          {
           
             
             $book=$bookManager->selectBook((int)htmlspecialchars($_POST['idbook']));

             $book->setBorrowed(1);
             $book->setId_user((int)htmlspecialchars($_POST['userid']));

             $bookManager->updateBook($book);

          }

            /**
           	 * update book if it is returned
           	 */
        
        if ( isset($_POST['returnedBook']) AND  isset($_POST['idbook']) AND !empty($_POST['idbook'] ))
     	              
          			 { 
                		$book=$bookManager->selectBook((int)htmlspecialchars($_POST['idbook']));
                          
             			$book->setBorrowed(0);
             			$book->setId_user(NULL);
             			 // var_dump($book);
             			$bookManager->updateBook($book);

                          
                          
                   }
           	   
           




include "../views/bookDetailvue.php";