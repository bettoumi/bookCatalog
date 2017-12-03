<?php
class BookCatalogManager
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
    public function addBook(Book $b)
   {   
          
      

        $req=$this->db->prepare('INSERT INTO books(title, author, category, abstractb, realiseDate, id_picture) VALUES(:title, :author,  :category, :abstractb, :realiseDate, :id_picture)');
       

        $req->bindValue('title', $b->title(), PDO::PARAM_STR );
        $req->bindValue('author', $b->author(), PDO::PARAM_STR);
       
        $req->bindValue('category', $b->category(),PDO::PARAM_STR);
        $req->bindValue('abstractb', $b->abstractb(),PDO::PARAM_STR);
        $req->bindValue('realiseDate', $b->realiseDate());
        $req->bindValue('id_picture', $b->id_picture(), PDO::PARAM_INT);
        $req->execute();
        //return $this->db->lastInsertId();
    

  } 



   /**
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
     
 
       $req=$this->db->query("SELECT B.id, B.title, B.author, B.realiseDate, B.category, B.abstractb, B.borrowed, B.id_picture, BP.src,  B.id_user, U.name  FROM books  AS B LEFT JOIN bookPicture AS BP  ON B.id_picture=BP.id
                  LEFT JOIN users AS U   ON B.id_user=U.id
        ") ;
     
        $allBooks=$req->fetchAll(PDO::FETCH_ASSOC);
          var_dump($allBooks);
          $books=[];
       //  $pictures=[];
         foreach ($allBooks as $book )
        {
                $categ=ucfirst($book['category']);
                  $book1= new $categ($book); 

                  $book1->setPicture(new Picture($book));
                  $book1->setUser(new User($book));
                
                 $books[]=$book1;

           }     
          
          
      
        return    $books;
    
  }
  // /**
  //  * Delete book from database
  //  */
   

  // public  function deleteBook( $id)
  //  {
       
  //    $req= $this->db->prepare('DELETE  FROM books WHERE  id=:id');
  //    $req->execute([
  //     'id'=>$id] );
   
  //  }


/**
 * [selectBooks ]
 * @param  [integer] $id 
 * @return [book]       
 */
 public function selectBook($info) 
  {
    
      if( is_int($info))
     {
        $id=(int)$info;
        $id=(int)$id;
         
  
         $req=$this->db->prepare('SELECT B.id, B.title, B.author, B.realiseDate, B.category, B.borrowed, B.abstractb, B.id_picture, BP.src  FROM books AS B INNER JOIN bookPicture AS BP ON B.id_picture=BP.id
                                
          WHERE B.id=:id');
         $req->bindValue('id', $id, PDO::PARAM_INT);
         $req->execute();

         $resul=$req->fetch(PDO::FETCH_ASSOC);
          
         $categ=ucfirst($resul['category']);
         $picture=new Picture($resul);
         $user=new User($resul);
         // var_dump($picture);
         $book= new $categ($resul);
         $book->setPicture($picture);
         $book->setUser($user);
          return $book;
         }

       else {
         
        
        $books=[];
        $req2=$this->db->prepare('SELECT B.id, B.title, B.author, B.realiseDate, B.category, B.borrowed, B.abstractb, B.id_picture, BP.src  FROM books AS B INNER JOIN bookPicture AS BP ON B.id_picture=BP.id WHERE B.category=:category') ;
        $req2->bindValue('category', $info, PDO::PARAM_STR);
       $req2->execute();
      $resul=$req2->fetchALL(PDO::FETCH_ASSOC);
        // var_dump($resul);
               
        // var_dump($resul);
        foreach ($resul as $book ) {
            $categ=ucfirst($book['category']);
                 $book1= new $categ($book); 

                  $book1->setPicture(new Picture($book));
                  $book1->setUser(new User($book));
                  $books[]=$book1;
        }
         
          return $books;
        }  

           
          


            
 
  } 


  /**
 * [selectPicture ]
 * @param  [integer] $id 
 * @return [Picture]       
 */
 public function selectPicture($id) 
  {
    
        $id=(int)$id;
        //var_dump($id);
  
         $req=$this->db->prepare('SELECT id, src FROM bookPicture  WHERE id=:id');
         $req->bindValue('id', $id, PDO::PARAM_INT);
         $req->execute();
         $resul=$req->fetch(PDO::FETCH_ASSOC);
       
          $image=new Picture($resul);
             
         
                return $image;
             
 
  } 

/**
 * updte book 
 * @param  book $b [
 * 
 */

 public function updateBook(Book $b)
 {
   
    $req=$this->db->prepare('UPDATE books SET  borrowed=:borrowed WHERE id=:id') ;

      $req->bindValue('id', $b->id(), PDO::PARAM_INT );
      $req->bindValue('borrowed', $b->borrowed(), PDO::PARAM_STR );
      $req->execute();

 }



//   Method of user class
// --------------------------------------------------------------------------  
   
    /**
    * Add user in data base
    * @param  User  $U
    */
    public function addUser(User $u)
   {   
          
       if(!$this->existUser($u))

       {  var_dump($u);
        $req=$this->db->prepare('INSERT INTO users(name, adresse) VALUES(:name, :adresse)');

        $req->bindValue('name', $u->name(), PDO::PARAM_STR );
        $req->bindValue('adresse', $u->adresse(), PDO::PARAM_STR);
        $req->execute();
       
      }

  }


   /**
    * techeque  user  exist in data base
    * @param  User  $U
    */
  public function existUser(User $u)
{
  $req=$this->db->prepare('SELECT COUNT(*)  FROM  users WHERE name =:name and adresse=:adresse');
    $req->execute([
      'name'=> $u->name(),
      'adresse'=> $u->adresse()]
      );
    
    return $req->fetchColumn()>0;
   
}



 public function allUser() 
   {
     
 
       $req=$this->db->query("SELECT id, name, adresse FROM users  ") ;
         
       $allusers=$req->fetchAll(PDO::FETCH_ASSOC);
          $users=[];
      
         foreach ($allusers as $user )
        {
                  
                  $users[]= new User($user);
         

        }     
                 
      
        return    $users;
    
  }


  
                  




}