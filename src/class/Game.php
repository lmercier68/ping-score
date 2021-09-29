<?php
namespace Acs\PingScore\class;
 
class Game{
    
    protected int $nombreSet = 0;
    protected int $actual_game =0;
    protected array $players;
    protected GameSet $gameSet;
    protected bool $gameOver = false;

    public function __construct(Player $player1, Player $player2, int $nb_set)
    {
        $this->players[] = $player1;
        $this->players[] = $player2;
        $this->nombreSet = $nb_set;       
        $this->actualSet = 1;
        $this->gameSet = New GameSet( $player1, $player2, $this->actualSet);
    } 
    /**
    * increment les score du joueur passé en paramètre
    *
    * @param string $playerUID
    * @return array - tableau des scores 
    */
    public function incrementScorePlayer(Player $player) 
    {
        echo ('point marqué :' . $this->gameSet->getScore()->getScores()[$this->players[0]->GetUID()]." - ".$this->gameSet->getScore()->getScores()[$this->players[1]->GetUID()]."<br>");
        //incrementer le score du joueur
        $this->gameSet->GetScore()->incrementScorePlayer($player);
        //verifier si un joueur a remporté le set
                //verifier si un joueur a remporté le set
                if($this->gameSet->checkSetWinner($player)){
                    $this->actualSet += 1;
                    $this->gameSet = new GameSet($this->players[0], $this->players[1],$this->actualSet);
                    $player->addWonSet();
                    $this->checkEndGame($player);
                }
    }

    public function checkEndGame(Player $player)
    {
        if($player->getWonSet() >= $this->nombreSet){
            echo 'Le joueur ' . $player->getName(). " remporte le match";
            $this->gameOver =true;
            return true;
        }


        return false;
    }

    /**
     * Region :getter/setter
     *
     */

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
    public function getGameSet(){
        return $this->gameSet;
    }
    public function getNumberSet(){
        return $this->nombre_set;
    }
    public function getGameOver(){
        return $this->gameOver;
    }
    /**
     * endRegion getter/setter
     * 
     */

}