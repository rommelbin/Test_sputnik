<?php

namespace App\interfaces;

use App\services\LuckyTicketService;

interface ILuckyTicketService
{
    public function randTicket(): int;
    public function isLucky(): bool;
    public function divideNumber(): LuckyTicketService;
    public function checkLuckyTicket(string $lucky_ticket): bool;
    public function compare(array $data): bool;
}
