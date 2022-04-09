<?php
declare(strict_types=1);

namespace App\services;

use App\interfaces\ILuckyTicketService;
use App\repositories\LuckyTicketRepository;

class LuckyTicketService implements ILuckyTicketService
{
    private int $min_number = 100000;
    private int $max_number = 999999;
    private mixed $lucky_ticket;
    private array $lucky_ticket_as_array;
    private LuckyTicketRepository $luckyTicketRepository;

    public function __construct(LuckyTicketRepository $luckyTicketRepository)
    {
        $this->luckyTicketRepository = $luckyTicketRepository;
    }

    public function randTicket(): int
    {
        return rand($this->min_number, $this->max_number);
    }

    public function isLucky(): bool
    {
        return array_sum($this->lucky_ticket_as_array[0]) === array_sum($this->lucky_ticket_as_array[1]);
    }

    public function checkLuckyTicket(string $lucky_ticket): bool
    {
        $this->lucky_ticket = $lucky_ticket;
        if ($this->divideNumber()->isLucky())
            $this->luckyTicketRepository->addLuckyTicket((int)$this->lucky_ticket);

        return $this->divideNumber()->isLucky();
    }

    public function divideNumber(): LuckyTicketService
    {
        $this->lucky_ticket_as_array = array_chunk(str_split($this->lucky_ticket), 3);
        return $this;
    }

    public function compare(array $data): bool
    {
        return (bool)$data['answer'] === $this->checkLuckyTicket($data['luckyTicket']);
    }
}
