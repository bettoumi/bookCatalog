<?php

class Picture
{
   

  /**
   * @var id type= integer
   */
   protected $id;



   /**
   * @var src type= string
   */
   protected $src;


    /*
        Construct of picture
      */
    public function __construct(array $infoPicture)
  {

  	  $this->hydrater($infoPicture);
      
  }






   /**
 * Geter
 * 
 */
  public function id(){ return $this->id;}
  public function src(){ return $this->src;}


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
     * Set src
     *
     * @param \string $src
     *
     */
    public function setSrc($src) 
   {
		    
		    if(is_string($src)) 
		    {
		    	$this->src=$src;
		    }  
		    else {
		          trigger_error('src invalide ', E_USER_WARNING);
		          return;
		     }
    }



  /**
     * Hydrater
     *
     * @param \array infoPicture
     *
     */
 
public function hydrater(array $infoPicture)
{
	foreach ($infoPicture as $picture=> $value)
	 {
		$setters='set'.ucfirst($picture);
		if(method_exists($this, $setters))
		{
			$this->$setters($value);
		}

	}
}





}