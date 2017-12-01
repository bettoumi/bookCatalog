

<?php
  include("template/header.php");

 ?>
     
 <div class="container-fluid mt-5">
 <div class="card mb-3" style="max-width:20rem ; height: 350px;"">
  <img class="card-img-top img-fluid" style="max-width:10rem" src="<?php echo $book->picture()->src(); ?>" alt="image livre">
  <div class="card-block">
    <h4 class="card-title"><?php echo $book->title();?></h4>
    <p class="card-text"><?php echo $book->abstractb();?></p>
    
  </div>
</div>

</div>
