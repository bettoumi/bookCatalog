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



/**
 *   add book in data base 
 *
 
 ** 
 */   


      if( isset($_POST['addbook']) AND  isset($_POST['title']) AND !empty($_POST['title'] ) AND
         isset($_POST['author']) AND !empty($_POST['author'] ) AND
         isset($_POST['realiseDate']) AND !empty($_POST['realiseDate'] ) AND
         isset($_POST['category']) AND !empty($_POST['category'] ) AND
         
         isset($_POST['abstract']) AND !empty($_POST['abstract'] )
         
        
  	  	)

      {              
	     
            
	       
	        /**
	         * Image information
	         */
	   


             
     if ($_FILES['bookimage']['error'] > 0) {$erreur = "Erreur lors du transfert";}
     
     
      else { 
    			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

  				$target_dir = "../assets/img/";
  			
  			   $target_file = $target_dir . basename($_FILES['bookimage']['name']);
  			   $name_file=$_FILES['bookimage']['name'];
  			   $extension_upload = strtolower(  substr(  strrchr($_FILES['bookimage']['name'], '.')  ,1)  );
             
              if ( !in_array($extension_upload,$extensions_valides) ) echo "Extension incorrecte";
 
              else {    $resultat = move_uploaded_file($_FILES['bookimage']['tmp_name'], $target_file);   
                         if ($resultat){ echo "Transfert réussi";}
                              else {echo "le tranfert ne pas fait";}
                      }
           }           
   
				 //ADD INFORMATION IMAGE IN THE TABLE      
				 //------------------------------------------------- 
   
                  $src = $target_dir. $name_file;
                                                             
         
 
                 $infopicture=['src'=>$src
                                ]; 
                  $picture= new Picture($infopicture);
                  $id_picture=$Bookmanager->addPicture($picture);

                 $nameclass=ucfirst(htmlspecialchars($_POST['category']));


	             $bookInfo=['title'=>htmlspecialchars($_POST['title']),
                 'author'=>htmlspecialchars($_POST['author']),
                 'realiseDate'=>htmlspecialchars($_POST['realiseDate']),
                 'category'=>htmlspecialchars($_POST['category']),
                  'abstractb'=>htmlspecialchars($_POST['abstract']),
					 'id_picture'=>$id_picture];




                 
				  $book=new $nameclass($bookInfo);
				  
			      $Bookmanager->addBook($book, $idpicture);
			   

   }  
			    
			    
			     


/**
 * Recive all book from dtat base
 * 
 */
  
    	$books= $Bookmanager->selecAllBook() ;
      // //ar_dump($allBooks);
      //  $allbooks=[];
      //  $pictures=[];
      //  foreach ($allBooksPictures as $bookPicture )
      //  {
      //          $categ=ucfirst($bookPicture['category']);
                     
      //          $allbooks[]=new $categ($bookPicture);
      //          $pictures[]= new Picture($bookPicture);

           
      //   }
        // var_dump($allbooks);
        // var_dump($pictures);
        

        // var_dump($pictures);


    
   
          
   



include "../views/indexVue.php";

 ?>





