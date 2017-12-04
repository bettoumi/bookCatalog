
<div class="modal fade" id="borroweddetail<?php echo $book->id(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">emprunter un livre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="" method="post">
                <input type="hidden" name="idbook" value="<?php echo $book->id();?>">
                <select class="form-control" name="userid">
                 <?php foreach ($users as $user) {
                  ?>
                    <option value="<?php echo $user->id(); ?>"><?php echo $user->name(); ?></option>

                  <?php 
                 }
                 ?>
                 <input type="submit"  class="btn "  id="button4" name="toBorrowed" value="preter">
                  
         </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>