<?php

 abstract class  Book
{
   

  /**
   * @var id type= integer
   */
   protected $id;



   /**
   * @var title type= string
   */
   protected $title;

   /**
   * @var author type= string
   */
   protected $author;

   /**
   * @var category type= string
   */
   protected $category;


   /**
   * @var availability type= string
   */
      protected $availability;
   



   /**
   * @var realiseDate type= date
   */
   protected $realiseDate;

    /**
     * @var $abstract
     */

    protected $abstractb;

      /**
     * @var $id_picture
     */

     protected $id_picture;
      
     /**
     * @var  Picture picture
     */

    protected $picture;


     /**
     * @var $id_user
     */

    protected $id_user;
   
    /**
      * @var User $user
     */

     protected $user;



      

     /*
        Construct of book
      */
    public function __construct(array $infoBook)
  {

  	  $this->hydrater($infoBook);
      $this->category=lcfirst(static::class);
  }

/**
 * Geter
 * 
 */
  public function id(){ return $this->id;}
  public function title(){ return $this->title;}
  public function author(){ return $this->author;}
  public function category(){ return $this->category;}
  public function availability(){ return $this->availability;}
  public function realiseDate(){ return $this->realiseDate;}
  public function abstractb(){ return $this->abstractb;}
  public function id_picture(){ return $this->id_picture;}
  public function picture(){ return $this->picture;}
  public function id_user(){ return $this->id_user;}
  public function user(){ return $this->user;}

  
 /**
     * Set id
     *
     * @param \integer $id
     *
     */
    public function setId($id) 
   {
		    $id=(int)$id;
		    if($id>0) 
		    {
		    	$this->id=$id;
		    }  
		    else {
		          trigger_error('id invalide ', E_USER_WARNING);
		          return;
		     }
    }

  
    /**
     * Set title
     *
     * @param \string $title
     *
     */
    public function setTitle($title) 
   {
		    
		    if(is_string($title)) 
		    {
		    	$this->title=$title;
		    }  
		    else {
		          trigger_error('titre invalide ', E_USER_WARNING);
		          return;
		     }
    }/**
     * Set abstarctb
     *
     * @param \string $abstractb
     *
     */
    public function setAbstractb($abstractb) 
   {
		    
		    if(is_string($abstractb)) 
		    {
		    	$this->abstractb=$abstractb;
		    }  
		    else {
		          trigger_error('resumé invalide ', E_USER_WARNING);
		          return;
		     }
    }
/**
     * Set author
     *
     * @param \string $title
     *
     */
    public function setAuthor($author) 
   {
		    
		    if(is_string($author)) 
		    {
		    	$this->author=$author;
		    }  
		    else {
		          trigger_error('nom de auteur  invalide ', E_USER_WARNING);
		          return;
		     }
    }
    /**
     * Set category
     *
     * @param \string $category
     *
     */
    public function setCategory($category) 
   {
		    
		    if(is_string($category)) 
		    {
		    	$this->category=$category;
		    }  
		    else {
		          trigger_error('category invalide ', E_USER_WARNING);
		          return;
		     }
    }
   
 /**
     * Set availability
     *
     * @param \string $state
     *
     */
    public function setAvailability($availability) 
   {
		  if(is_numeric($availability))  
		  {  if($availability==0) 
		    {
		    	$this->availability=true;
		    } 
		    else{
		    	  $this->availability=false;
		    } 

		}
		    else {
		          trigger_error('disponibilité invalide ', E_USER_WARNING);
		          return;
		     }

    }

    /**
     * Set realiseDate
     *
     * @param \string $realiseDate
     *
     */
    public function setRealiseDate($realiseDate) 
   {
		    
		   $this->realiseDate= $realiseDate;
		    	
		   
    }
    /**
     * Set id_picture
     *
     * @param \int $id_picture
     *
     */
    public function setId_picture($id_picture) 
   {
          $id_picture=(int)$id_picture;

		    if(is_int($id_picture))
		   {$this->id_picture= $id_picture;}
		     else {
		          trigger_error('id_picture invalide ', E_USER_WARNING);
		          return;
		     }	
		   
    }
    /**
     * Set _picture
     *
     * @param \Picture $picture
     *
     */
    public function setPicture(Picture $picture) 
   {
          

		    
		   $this->picture= $picture;
		     
		   
    } 

    public function setId_user($id_user) 
   {
          $id_user=(int)$id_user;

		    if(is_int($id_user))
		   {$this->id_user= $id_user;}
		     else {
		          trigger_error('id_user invalide ', E_USER_WARNING);
		          return;
		     }	
		   
    }

    /**
     * Set picture
     *
     * @param \User $user
     *
     */
    public function setUser(User $user) 
   {
          
		    
		   $this->user= $user;
		     
		   
    }
   
    /**
     * Hydrater
     *
     * @param \array infoBook
     *
     */
 
public function hydrater(array $infoBook)
{
	foreach ($infoBook as $book=> $value)
	 {
		$setters='set'.ucfirst($book);
		if(method_exists($this, $setters))
		{
			$this->$setters($value);
		}

	}
}




}