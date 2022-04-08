<?php

namespace App\interfaces;

use App\services\LuckyNumberService;

interface ILuckyNumberService
{
    public function randNumber(): int;
    public function isLucky(): bool;
    public function divideNumber(): LuckyNumberService;
    public function checkLuckyTicket(string $lucky_ticket): bool;
    public function compare(array $data): bool;
}
