<?php
declare(strict_types=1);

namespace App\repositories;

use App\interfaces\ILuckyTicketRepository;
use App\Models\LuckyTicket;

class LuckyTicketRepository implements ILuckyTicketRepository
{
    private int $max_size_of_lucky_tickets_table = 100;


    public function addLuckyTicket(int $lucky_ticket): void
    {
        if ($this->isDBIIncomplete())
            LuckyTicket::firstOrCreate(['ticket' => $lucky_ticket]);
    }


    public function isDBIIncomplete(): bool
    {
        return LuckyTicket::count() < $this->max_size_of_lucky_tickets_table;
    }
}
