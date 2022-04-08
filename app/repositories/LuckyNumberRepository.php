<?php
declare(strict_types=1);
namespace App\repositories;

use App\interfaces\ILuckyNumberRepository;

class LuckyNumberRepository implements ILuckyNumberRepository
{
    public function isNumberUsed(int $lucky_number): bool
    {
        return true;
    }

    public function addLuckyNumber(int $lucky_number): bool
    {
        return true;
    }
    public function isDBFull(): bool
    {
        return true;
    }
}
