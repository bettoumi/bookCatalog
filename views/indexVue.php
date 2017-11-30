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
  <div class="allbook col-12 col-md-3 col-lg-3 ">
                             <!--  Select category of books -->
  	 <!-- <div class="selectbook d-flex flex-column justify-content-center">
         <h2 class="align-self-center">Livres</h2>
         <div class="chose w-50 align-self-center mt-3 offset-3">
         	  <select  id="selectbook" name="selectbook" class="col-6 " onchange="this.form.submit()">
			 	 		<?php// if (isset($_POST['selectbook'])){ ?>
						  <option selected ><?php// echo $_POST['selectbook'] ?> </option>
			 	 		<//?php} //else  { 
			 	 
			 	 		?>
						  <option disabled>Choisissez </option>
			 	 		<?php
			 	 		//}?>
					  <option value="all"> tous les livres</option>
					  <option value="novel">Roman</option>
					  <option value="hobbies">loisirs</option>
					  <option value="comic">BD</option>
					 
		      </select>
         </div>
 	 	
  	 </div> -->

  	                     <!--  Display   Books -->
  	 <div class="detailsbook row">
  	      <?php 
              foreach ($books as $book) {
              	     foreach ($pictures as $picture) {
              	     	
              	    
  	      ?>
  	 	<div class="card col" style="max-width: 15rem;">
		  <img class="card-img-top fluid " src="<?php echo $picture->src();?>" alt="">
		  <div class="card-block">
		    <h4 class="card-title"><?php echo $book->title();?></h4>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		    <a href="#" class="btn btn-primary">Détail</a>
		  </div>
		</div>


		  <?php
		}}

		  ?>
  	 </div>

  </div>
</div>
   


 <?php
   include("template/footer.php")
  ?>
