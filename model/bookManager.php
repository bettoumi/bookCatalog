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
	 *  stbd
	 */

   public function setDb($db)
  {
    $this->db=$db;
   }
  


   /**
    * Add book in data base
    * @param  Book $b
    */
    public function addBook(Book $b)
   {   
          

      	$req=$this->db->prepare('INSERT INTO books(title, author, state,  category, abstract, realiseDate) VALUES(:title, :author,  :category, :abstract, :realiseDate)');

      	$req->bindValue('title', $b->title(), PDO::PARAM_STR );
      	$req->bindValue('author', $b->author(), PDO::PARAM_STR);
      	$req->bindValue('state', $b->state(), PDO::PARAM_STR);
      	$req->bindValue('category', $b->category(),PDO::PARAM_STR);
      	$req->bindValue('abstract', $b->abstarct(),PDO::PARAM_STR);
      	$req->bindValue('realiseDate', $b->realiseDate());
      	$req->execute();
        //return $this->db->lastInsertId();
    

  }  

  /**
   * Select book from data base
   * return $books array of Book
   */

  public function selecAllBook() 
   {
     
 
       $books=[];
       $req=$this->db->query('SELECT id, title, author, state, category, abstract, realiseDate   FROM books') ;
        $allBooks=$req->fetchAll(PDO::FETCH_ASSOC);
          

        foreach ($allBooks as $book )
         {
               $categ=ucfirst($book['category']);
    		             
               $books[]=new $categ($book);
           
          }
          
          return $books;
    
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
  
         $req=$this->db->prepare('SELECT id, title, author, state, category, abstract, realiseDate FROM books WHERE id=:id');
         $req->bindValue('id', $id, PDO::PARAM_INT);
         $req->execute();
         $resul=$req->fetch(PDO::FETCH_ASSOC);
          $categ=ucfirst($resul['category']);
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