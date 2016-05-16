<?php
namespace App\Domain\Teacher;

class Teacher
{
	protected $id;

	protected $name;


 
    /**
    * Gets the value of id.
    *
    * @return mixed
    */
    public function getId()
    {
        return $this->id;
    }
 
 
    /**
    * Gets the value of name.
    *
    * @return mixed
    */
    public function getName()
    {
        return $this->name;
    }
 
    /**
    * Sets the value of name.
    *
    * @param mixed $name the name
    *
    * @return self
    */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function whitelist()
    {
    	return [
    		'name'
    	];
    }
}