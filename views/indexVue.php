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
  	 <div class="selectbook d-flex flex-column justify-content-center">
         <h2 class="align-self-center">Livres</h2>
         <div class="chose w-50 align-self-center mt-3">
         	  <select  id="selectbook" name="selectbook" class="col-9" onchange="this.form.submit()">
			 	 		<?php if (isset($_POST['selectbook'])){ ?>
						  <option selected ><?php echo $_POST['selectbook'] ?> </option>
			 	 		<?php } 
			 	 	else{
			 	 		?>
						  <option disabled>Choisissez </option>
			 	 		<?php
			 	 		} ?>
					  <option value="all"> tous les livres</option>
					  <option value="novel">Roman</option>
					  <option value="hobbies">loisirs</option>
					  <option value="comic">BD</option>
					 
		      </select>
         </div>


  	 	
  	 </div>
  	 <div class="detailsbook">
  	 	
  	 </div>

  </div>
</div>
   


 <?php
   include("template/footer.php")
  ?>
