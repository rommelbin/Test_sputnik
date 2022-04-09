<?php

namespace App\interfaces;


interface ILuckyTicketRepository
{
    public function addLuckyTicket(int $lucky_ticket): void;
    public function isDBIIncomplete(): bool;
}
