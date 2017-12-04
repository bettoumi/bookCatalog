

<?php
  include("template/header.php");

 ?>
     
 <div class="container-fluid mt-5">
 <div class="card mb-3" style="max-width:20rem ; height: 350px;"">
  <img class="card-img-top img-fluid" style="max-width:10rem" src="<?php echo $book->picture()->src(); ?>" alt="image livre">
  <div class="card-block">
    <h4 class="card-title"><?php echo $book->title();?></h4>
    <p class="card-text"><?php echo $book->author();?></p>
    <p class="card-text"><?php echo $book->category();?></p>
    
    <p class="card-text"><?php echo $book->abstractb();?></p>
     <?php if($book->borrowed()) 
             {   //var_dump($book->user());
              ?><p class="card-text"><strong class="nondispo"> non disponible</strong></p>
                     
               <p class="card-text">Emprunté par:<strong class="nomuser"><?php echo $book->user()->name() ;?></strong></p>
              


                  <p> <!-- change the state of book  -->
                  <form action=""  method="post">
                       <input type="hidden" name="idbook" value="<?php echo $book->id(); ?>">
                      <input type="submit" name="returnedBook" value="Retour de livre">
                  </form>
                  </p>
            <?php }
               else { 
                   ?>
                <p class="card-text"><strong class="nondispo"> disponible</strong></p> 
                <button type="button" class="btn"  id="button6" data-toggle="modal" data-target="#borrowedModal<?php echo $book->id(); ?>">

                          Emprunter
                 </button>

             
             <?php
                 require 'includes/borrowedBookModal.php' ;

               }
             ?>
          <p>  
		          <a href="index.php " class="btn" id="button3">retour</a>
		    </p>
    
  </div>
</div>

</div>
