<?php
declare(strict_types=1);
namespace App\services;

use App\interfaces\ILuckyNumberService;

class LuckyNumberService implements ILuckyNumberService
{
    private int $min_number = 100000;
    private int $max_number = 999999;
    private mixed $lucky_ticket;
    private array $lucky_ticket_as_array;

    public function randNumber(): int
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
        return $this->divideNumber()->isLucky();
    }

    public function divideNumber(): LuckyNumberService
    {
        $this->lucky_ticket_as_array = array_chunk(str_split($this->lucky_ticket), 3);
        return $this;
    }

    public function compare(array $data): bool
    {
        return (bool)$data['answer'] === $this->checkLuckyTicket($data['luckyTicket']);
    }
}
