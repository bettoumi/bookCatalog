<?php
class User
{
	/**
   * @var id type= integer
   */
   protected $id;



   /**
   * @var name type= string
   */
   protected $name;

   /**
   * @var adresse type= string
   */
   protected $adresse;


  /*
        Construct of User
      */
    public function __construct(array $infoUser)
  {

  	  $this->hydrater($infoUser);
     
  }





 /**
 * Geter
 * 
 */
  public function id(){ return $this->id;}
  public function name(){ return $this->name;}
  public function adresse(){ return $this->adresse;}

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
     * Set name
     *
     * @param \string $name
     *
     */
    public function setName($name) 
   {
		    
		    if(is_string($name)) 
		    {
		    	$this->name=$name;
		    }  
		    else {
		          trigger_error('nom utilisateur invalide ', E_USER_WARNING);
		          return;
		     }
    }

   /**
     * Set adresse
     *
     * @param \string $adresse
     *
     */
    public function setAdresse($adresse) 
   {
		    
		    if(is_string($adresse)) 
		    {
		    	$this->adresse=$adresse;
		    }  
		    else {
		          trigger_error('Adresse  invalide ', E_USER_WARNING);
		          return;
		     }
    }




    /**
     * Hydrater
     *
     * @param \array infoUser
     *
     */
 
public function hydrater(array $infoUser)
{
	foreach ($infoUser as $user=> $value)
	 {
		$setters='set'.ucfirst($user);
		if(method_exists($this, $setters))
		{
			$this->$setters($value);
		}

	}
}
   





}