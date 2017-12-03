<?php
  include("template/header.php")
 ?>

 <div class="principalsection row mt-5">

    <!-- Form add of book -->
  <div class="addbook col-12 col-md-3 col-lg-3">
      <?php
        include("includes/addbook.php")   	
      ?>
   </div>
      <!-- display all of book -->
  <div class="allbook col-12 col-md-9 col-lg-9  pb-5 mb-5">

                             <!--  Select category of books -->
  	  <div class="selectbook d-flex flex-column justify-content-center mb-5">
         <h2 class="align-self-center">Livres</h2>
         <div class="chose w-50 align-self-center mt-3 offset-3">
             <form method="post" action="">
         	  <select  id="selectbook" name="selectbook" class="col-6 " onchange="this.form.submit()">
			 	 		<?php  if (isset($_POST['selectbook'])){ ?>
						  <option selected disabled ><?php echo $_POST['selectbook']; ?> </option>
			 	 		<?php } else  { 
			 	 
			 	 		?>
						  <option disabled> Choisissez </option>
			 	 		<?php
			 	 		  }?>
					  <option value="all"> tous les livres</option>
					  <option value="novel">Roman</option>
					  <option value="hobbies">loisirs</option>
					  <option value="comic">BD</option>
					 
		      </select>
          </form>
         </div>
 	 	
  	 </div> 
 
  	                     <!--  Display   Books -->
  	 <div class="detailsbook row justify-content-around mb-5">
  	      <?php 
              foreach ($books as $book) {
              	     
              	            
              	    
  	      ?>
  	 	<div class="card  col" style="max-width:15rem ; height: 350px;">
		  <img class="card-img-top img-fluid h-70" style="max-width:10rem" src="<?php echo $book->picture()->src() ;?>" alt="">
		  <div class="card-block" id="text-card">
		    <h4 class="card-title">Titre: <?php echo $book->title();?></h4>
		    <p class="card-text">Auteur:  <?php echo $book->author();?></p>
        <p class="card-text">Catégorie: <?php echo $book->category();?></p>
		    <!-- <p class="card-text">disponibilité: <?php// echo $book->availability();?></p> -->

        <?php if(! $book->borrowed()) 
            {  ?><p class="card-text">disponibilité:<strong>non disponible</strong></p> 
            <?php }
               else { ?>
              <form action="" method="post">
                <input type="hidden" name="idbook" value="<?php echo $book->id();?>">
                  <input type="submit"  class="btn"  id="button4" name="toBorrowed" value="preter">
             </form>
             <?php
             }
             ?>
            
		    <a href="bookDetail.php?id=<?php echo $book->id(); ?> " class="btn" id="button3">Détail</a>
		    
		  </div>
		</div>


		  <?php
		}

		  ?>
  	 </div>

  </div>
</div>
   


 <?php
   include("template/footer.php")
  ?>
