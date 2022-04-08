<?php

namespace App\interfaces;


interface ILuckyNumberRepository
{
    public function isNumberUsed(int $lucky_number): bool;
    public function addLuckyNumber(int $lucky_number): bool;
    public function isDBFull(): bool;
}
