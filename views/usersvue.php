<?php
  include("template/header.php")
 ?>
<div class="row mt-5">
<div class="adduser col-12  col-md-3  col-lg-3 ofsset-1">
  
  <?php include 'includes/adduser.php';
  ?>
	
</div>

  <div class="row  justify-content-around col-11 col-md-9 col-lg-9" id="userscard">

     <?php

           foreach ($users as $user) {
            	
            
     ?>
<div class="card card-inverse  ml-2 col mb-5" style="background-color: #111; border-color: #333; max-width:25rem">
  <div class="card-block">
    <h3 class="card-title"><?php echo $user->name(); ?></h3>
    <p class="card-text"><?php echo $user->adresse(); ?></p>
    
  </div>
</div>
  <?php

     }
  ?>
</div>

</div>

<?php
   include("template/footer.php")
  ?>
