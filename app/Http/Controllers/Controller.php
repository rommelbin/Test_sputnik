<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\LuckyTicketValidationRequest;
use App\interfaces\ILuckyTicketRepository;
use App\interfaces\ILuckyTicketService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private ILuckyTicketRepository $luckyNumberRepository;
    private ILuckyTicketService $luckyNumberService;

    public function __construct(ILuckyTicketRepository $luckyNumberRepository, ILuckyTicketService $luckyNumberService)
    {
        $this->luckyNumberRepository = $luckyNumberRepository;
        $this->luckyNumberService = $luckyNumberService;
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index ()
    {
        $lucky_ticket = $this->luckyNumberService->randTicket();
        return view('index', ['lucky_ticket' => $lucky_ticket]);
    }

    public function checkAnswer(LuckyTicketValidationRequest $request) {
        $data = $request->validated();
        $result =  $this->luckyNumberService->compare($data);
        $new_ticket = $this->luckyNumberService->randTicket();
        return view('index', ['lucky_ticket' => $new_ticket, 'result' => $result]);
    }
}
