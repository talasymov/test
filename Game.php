<?php


namespace Game;


class Game
{
    private $player1;
    private $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    /**
     * @return string
     */
    public function battle()
    {
        $this->player1->generateValue();
        $this->player2->generateValue();

        $winner = $this->getWinner($this->player1, $this->player2);

        $winnerName = $winner === false ? "Draw" : $winner->getName();

        return "{$this->player1->getName()} - {$this->getHumanityValueName($this->player1->getValue())}, {$this->player2->getName()} - {$this->getHumanityValueName($this->player2->getValue())}, Winner - $winnerName \n";
    }

    /**
     * @param Player $player1
     * @param Player $player2
     * @return bool|Player
     */
    private function getWinner(Player $player1, Player $player2)
    {
        $valuePlayer1 = $player1->getValue();
        $valuePlayer2 = $player2->getValue();

        if ($valuePlayer1 === $valuePlayer2) {
            $winner = false;
        } else {
            $arr = [
                $valuePlayer1 => $player1,
                $valuePlayer2 => $player2
            ];

            if (array_key_exists(1, $arr) && array_key_exists(2, $arr)) {
                $winner = $arr[1];
            } else if (array_key_exists(1, $arr) && array_key_exists(3, $arr)) {
                $winner = $arr[3];
            } else {
                $winner = $arr[2];
            }
        }

        return $winner;
    }

    /**
     * @param $value
     * @return string
     */
    public function getHumanityValueName($value)
    {
        $humanityValueNames = [
            1 => "Paper",
            2 => "Rock",
            3 => "Scissors"
        ];

        return $humanityValueNames[$value] ?? 'Undefined';
    }
}