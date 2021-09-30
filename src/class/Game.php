<?php
namespace Acs\PingScore\class;
 
class Game{
    
    protected int $nombreSet = 0;
    protected int $actualSet =0;
    protected array $players;
    protected array $gameSets;
    protected bool $gameOver = false;
    protected GameSet $gameSet;

    public function __construct(Player $player1, Player $player2, int $nb_set)
    {
        $this->players[] = $player1;
        $this->players[] = $player2;
        $this->nombreSet = $nb_set;   
        $this->gameSet = New GameSet($this, $player1, $player2, $this->actualSet);
        $this->gameSets[]= $this->gameSet;
    } 

    public function checkEndGame(Player $player)
    {
      
        if($player->getWonSet() >= $this->nombreSet){
            echo 'Le joueur ' . $player->getName(). " remporte le match";
            $this->gameOver =true;
            return true;
        }
        $this->actualSet +=1;
        return false;
    }

    /**
     * Region :getter/setter
     *
     */
    public function addGameSet(GameSet $gameSet)
    {
        $this->gameSets[] = $gameSet;
    }
    public function getScore(string $playerUID) : int
    {
        return $this->score[$playerUID];
    }
    public function getPlayer1()
    {
        return $this->player1;
    }
    public function getPlayer2(){
        return $this->player2;
    }
    public function getActualSet(){
        return $this->actualSet;
    }
    public function setGamelSet(GameSet $gameSet){
        $this->gameSet = $gameSet;
    }
    public function getGameSet(){
        return $this->gameSet;
    }
    public function getNumberSet(){
        return $this->nombre_set;
    }
    public function isGameOver(){
        return $this->gameOver;
    }
    /**
     * endRegion getter/setter
     * 
     */

}