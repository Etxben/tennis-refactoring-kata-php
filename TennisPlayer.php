<?php

class TennisPlayer
{

    private const SCORE_LOVE = "Love";
    private const SCORE_FIFTEEN = "Fifteen";
    private const SCORE_THIRTY = "Thirty";
    private const SCORE_FORTY = "Forty";
    private const ZERO_POINTS = 0;
    private const ONE_POINT = 1;
    private const TWO_POINTS = 2;
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
        if ($this->isLove())
        {
            return self::SCORE_LOVE;
        }

        if ($this->isFifteen())
        {
            return self::SCORE_FIFTEEN;
        }

        if ($this->isThirty()) {
            return self::SCORE_THIRTY;
        }
        return self::SCORE_FORTY;
    }

    private function isLove(): bool
    {
        return $this->score == self::ZERO_POINTS;
    }

    private function isFifteen(): bool
    {
        return $this->score == self::ONE_POINT;
    }

    private function isThirty(): bool
    {
        return $this->score == self::TWO_POINTS;
    }

    public function AreTied(TennisPlayer $player): bool
    {
        return $this->getDifferenceBetweenScores($player) == self::ZERO_POINTS;
    }

    public function hasAdvantage(TennisPlayer $player): bool
    {
        return $this->getDifferenceBetweenScores($player) == self::ONE_POINT;
    }

    public function winTheSet(TennisPlayer $player) : bool
    {
        return $this->getDifferenceBetweenScores($player) >= self::TWO_POINTS;
    }

    private function getDifferenceBetweenScores(TennisPlayer $player): int
    {
        return $this->score - $player->getScore();
    }

    public function isScoreMoreThanForty(): bool
    {
        return $this->score >= self::FOUR_POINTS;
    }

    public function isScoreForty(): bool
    {
        return strcmp($this->getTextScore(), self::SCORE_FORTY) == 0;
    }
}
