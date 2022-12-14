<?php

class TennisGame1 implements TennisGame
{
    private const LOVE = "Love";
    private const FIFTEEN = "Fifteen";
    private const THIRTY = "Thirty";
    private const FORTY = "Forty";
    private const ALL = "-All";
    private const DEUCE = "Deuce";

    private int $player1Score = 0;
    private int $player2Score = 0;
    private string $player1Name = '';
    private string $player2Name = '';

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function wonPoint($playerName) : void
    {
        if ('player1' == $playerName) {
            $this->player1Score++;
        } else {
            $this->player2Score++;
        }
    }

    public function getScore() : string
    {
        $score = "";
        if ($this->areThePlayersTied()) {
            $score = $this->getTextOfScore($this->player1Score);
            if ($score == self::FORTY)
            {
                return self::DEUCE;
            }
            return $score . self::ALL;
        }

        if ($this->hasAPlayerAScoreMoreThan3()) {
            $minusResult = $this->player1Score - $this->player2Score;
            if ($minusResult == 1) {
                $score = "Advantage player1";
            } elseif ($minusResult == -1) {
                $score = "Advantage player2";
            } elseif ($minusResult >= 2) {
                $score = "Win for player1";
            } else {
                $score = "Win for player2";
            }
            return $score;
        }

        return
            $this->getTextOfScore($this->player1Score) . '-' .
            $this->getTextOfScore($this->player2Score);
    }

    private function getTextOfScore(int $tempScore): string
    {
        if ($tempScore == 0)
        {
            return self::LOVE;
        }

        if ($tempScore == 1)
        {
            return self::FIFTEEN;
        }

        if ($tempScore == 2) {
            return self::THIRTY;
        }
        return self::FORTY;
    }

    private function areThePlayersTied(): bool
    {
        return $this->player1Score == $this->player2Score;
    }

    private function hasAPlayerAScoreMoreThan3(): bool
    {
        return $this->player1Score >= 4 || $this->player2Score >= 4;
    }
}

