<?php
namespace Acs\PingScore\class;

class Player{

    protected string $name = "";
    protected string $UID = "";
    protected int $wonSet = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->UID = spl_object_hash($this);
        
    }
    /**
    * Region :getter/setter
    *
    */

    public function getName() : string
    {
        return $this->name;
    }
    public function getWonSet(){
        return $this->wonSet;
    }
    public function addWonSet(){
        $this->wonSet += 1;
    }
    public function getUID(){
        return $this->UID;
    }
    /**
     * endRegion getter/setter
     * 
     */
}