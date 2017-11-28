<?php

class Book
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
   * @var state type= string
   */
      protected $state;
   



   /**
   * @var realiseDate type= date
   */
   protected $realiseDate;


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
  public function state(){ return $this->state;}
  public function realiseDate(){ return $this->realiseDate;}
  
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
     * Set author
     *
     * @param \string $id
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
     * Set state
     *
     * @param \string $state
     *
     */
    public function setState($state) 
   {
		    
		    if(is_string($state) and  in_array($state, ["availabe", "borrowed"] )) 
		    {
		    	$this->state=$state;
		    }  
		    else {
		          trigger_error('state invalide ', E_USER_WARNING);
		          return;
		     }
    }

   
 

   



}