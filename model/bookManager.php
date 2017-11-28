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
    * Add book in data base
    * @param  Book $b
    */
    public function addBook(Book $b)
   {   
          

      	$req=$this->db->prepare('INSERT INTO books(title, author,  category, abstract, realiseDate) VALUES(:title, :author,  :category, :abstract, :realiseDate)');

      	$req->bindValue('title', $b->title(), PDO::PARAM_STR );
      	$req->bindValue('author', $b->author(), PDO::PARAM_STR);
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
       $req=$this->db->query('SELECT id, title, author,  category, abstract, realiseDate   FROM books') ;
        $allBooks=$req->fetchAll(PDO::FETCH_ASSOC);
          

        foreach ($allBooks as $book )
         {
               $categ=ucfirst($book['type']);
    		             
               $books[]=new $categ($book);
           
          }
          
          return $books;
    
    }
    









}