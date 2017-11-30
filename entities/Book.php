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