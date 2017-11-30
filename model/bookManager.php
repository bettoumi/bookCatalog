<?php
class BookManager
{

   protected $db;


   /**
    * Construct of manager
    */
   
   public function __construct($db)
	{
		$this->setDb($db);
	}

	/**
	 *  stDb
	 */

   public function setDb($db)
  {
    $this->db=$db;
   }
  


   /**
    * Add book in data base
    * @param  Book $b
    */
    public function addBook(Book $b, $idpicture)
   {   
          
       // var_dump($b);
       var_dump($b->title());
       var_dump($b->author());
       var_dump($b->category());
       var_dump($b->abstractb());
       var_dump($idpicture);



        $req=$this->db->prepare('INSERT INTO books(title, author, category, abstractb, realiseDate, id_picture) VALUES(:title, :author,  :category, :abstractb, :realiseDate, :id_picture)');
       

        $req->bindValue('title', $b->title(), PDO::PARAM_STR );
        $req->bindValue('author', $b->author(), PDO::PARAM_STR);
       
        $req->bindValue('category', $b->category(),PDO::PARAM_STR);
        $req->bindValue('abstractb', $b->abstractb(),PDO::PARAM_STR);
        $req->bindValue('realiseDate', $b->realiseDate());
        $req->bindValue('id_picture', $idpicture, PDO::PARAM_INT);
        $req->execute();
        //return $this->db->lastInsertId();
    

  }  /**
    * Add image in data base
    * @param  Picture $P
    * @return last id (integer)
    */
    public function addPicture(Picture $p)
   {   
          

      	$req=$this->db->prepare('INSERT INTO bookPicture(src) VALUES(:src)');

      	$req->bindValue('src', $p->src(), PDO::PARAM_STR );
      	$req->execute();
        return $this->db->lastInsertId();
    

  }  

  /**
   * Select book from data base
   * return $books array of Book
   */

  public function selecAllBook() 
   {
     
 
       $books=[];
       $pictures=[];
       $req=$this->db->query("SELECT B.id, B.title, B.author, B.realiseDate, B.category, B.abstractb, B.availability, BP.src  FROM books  AS B INNER JOIN bookPicture AS BP  ON B.id_picture=BP.id") ;
     
        $allBooks=$req->fetchAll(PDO::FETCH_ASSOC);
          
          
       
         return  $allBooks;

          
        
    
    }

  /**
   * Delete book from database
   */
   

  public  function deleteBook( $id)
   {
       
     $req= $this->db->prepare('DELETE  FROM books WHERE  id=:id');
     $req->execute([
      'id'=>$id] );
   
   }


/**
 * [selectBooks ]
 * @param  [integer] $id 
 * @return [book]       
 */
 public function selectBook($id) 
  {
    
        $id=(int)$id;
  
         $req=$this->db->prepare('SELECT B.id, B.title, B.author, B.realiseDate, B.category, B.abstractb, B.availability, BP.src  FROM books  AS B INNER JOIN bookPicture AS BP  ON B.id_picture=BP.id WHERE id=:id');
         $req->bindValue('id', $id, PDO::PARAM_INT);
         $req->execute();
         $resul=$req->fetch(PDO::FETCH_ASSOC);
          $categ=ucfirst($resul['category']);
          $image=new Picture($resul['src']);
         // var_dump($resul);
         
                return new $categ($resul);
      
           
 
  } 

/**
 * updte book 
 * @param  book $b [
 * 
 */

 public function updateBook(Book $b)
 {
   
    $req=$this->db->prepare('UPDATE books SET  state=:state WHERE id=:id') ;

      $req->bindValue('id', $b->id(), PDO::PARAM_INT );
      $req->bindValue('state', $b->state(), PDO::PARAM_STR );
      $req->execute();

 }








}