<?php

require '../model/dbconnexion/dbconnexion.php';
require '../model/bookManager.php';
$bd=connex_bdd();
$Bookmanager= new BookCatalogManager($bd);

 function loadclass($class)
{
   require '../entities/'.$class.'.php';
}
spl_autoload_register('loadclass');





$id=htmlspecialchars($_GET['id']);



 $book= $Bookmanager->selectBook($id);
// var_dump($book);
  




include "../views/bookDetailvue.php";