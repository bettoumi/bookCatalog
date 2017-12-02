   <!--  Add Book form -->

<div class="d-flex flex-column justify-content-center">
	 <h3 class="btn  align-self-center mb-2"  id="buton">Ajouter un livre
	 </h3>

 
  <div class="card card-block" id="addbolc">
    
 <div class="container-fluid">
  <form class="add-form" action="index.php" method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="title" class="col-sm-2 col-form-label">Titre</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  name="title" id="title">
      </div>
    </div>
    <div class="form-group row">
      <label for="author" class="col-sm-2 col-form-label">Auteur</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  name="author" id="author" placeholder="">
      </div>
    </div>
   <!--  <div class="form-group row">
      <label for="state" class="col-sm-2 col-form-label">State</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  name="state" id="state" placeholder="">
      </div>
    </div> -->
    <div class="form-group row">
      <label for="realiseDate" class="col-sm-2 col-form-label">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control"  name="realiseDate" id="realiseDate" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}">
      </div>
    </div>
    <div class="form-group row">
      <label for="category" class="col-sm-2 col-form-label pr-1">Categorie</label>
      <div class="col-sm-10">
         <select class="form-control" name="category">
			  <option value="novel">Roman</option>
			  <option value="comic">BD</option>
			  <option value="hobbies">loisirs</option>
			  
		 </select> 
      </div>
    </div>
    <div class="form-group row">
      <label for="abstract" class="col-sm-2 col-form-label ">Resumé</label>
      <div class="col-sm-10">
        <textarea class="form-control"  name="abstract" id="abstract" rows="2"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="bookimage" class="col-sm-2 col-form-label ">Image</label>
      <div class="col-sm-10">
          <input type="hidden" name="MAX_FILE_SIZE" value="6048576" />
          <!-- <input type="file" name="bookimage" id="mon_fichier" /> -->
        <input type="file" class="form-control" id="bookimage"  name="bookimage">
      </div>
    </div>
     
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <input type="submit" class="btn " name="addbook" id="buton2" value="Ajouter">
      </div>
    </div>
  </form>
</div>



  </div>
</div> 