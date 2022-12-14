<?php

class TennisPlayer{

    private const LOVE = "Love";
    private const FIFTEEN = "Fifteen";
    private const THIRTY = "Thirty";
    private const FORTY = "Forty";
    private const FOUR_POINTS = 4;

    private int $score;
    public readonly string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->score = 0;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function addOneToScore(): void
    {
        $this->score++;
    }

    public function getTextScore(): string
    {
        if ($this->score == 0)
        {
            return self::LOVE;
        }

        if ($this->score == 1)
        {
            return self::FIFTEEN;
        }

        if ($this->score == 2) {
            return self::THIRTY;
        }
        return self::FORTY;
    }

    public function AreTied(TennisPlayer $player): bool
    {
        return $this->getDifferenceBetweenScores($player) == 0;
    }

    public function hasAdvantage(TennisPlayer $player): bool
    {
        return $this->getDifferenceBetweenScores($player) == 1;
    }

    public function WinTheSet(TennisPlayer $player) : bool
    {
        return $this->getDifferenceBetweenScores($player) >= 2;
    }

    private function getDifferenceBetweenScores(TennisPlayer $player): int
    {
        return $this->score - $player->getScore();
    }

    public function IsScoreMoreThanForty(): bool
    {
        return $this->score >= self::FOUR_POINTS;
    }

    public function IsScoreForty(): bool
    {
        return strcmp($this->getTextScore(), self::FORTY) == 0;
    }
}