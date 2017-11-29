   <!--  Add Book form -->

<div class="d-flex flex-column justify-content-center">
	 <a class="btn    align-self-center mb-2" data-toggle="collapse" href="#collapseExample" id="buton" aria-expanded="false" aria-controls="collapseExample">Ajouter un livre
	 </a>

 <div class="collapse " id="collapseExample">
  <div class="card card-block" id="addbolc">
    
  <div class="container-fluid">
  <form class="add-form" action="" method="">
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
    <div class="form-group row">
      <label for="state" class="col-sm-2 col-form-label">State</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  name="state" id="state" placeholder="">
      </div>
    </div>
    <div class="form-group row">
      <label for="realiseDate" class="col-sm-2 col-form-label">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control"  name="realiseDate" id="realiseDate" placeholder="">
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
    </div><div class="form-group row">
      <label for="picture" class="col-sm-2 col-form-label ">Image</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="image"  name="picture" placeholder="">
      </div>
    </div>
     
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn " id="buton2">Ajouter</button>
      </div>
    </div>
  </form>
</div>



  </div>
</div>
</div>