<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\interfaces\ILuckyNumberRepository;
use App\interfaces\ILuckyNumberService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private ILuckyNumberRepository $luckyNumberRepository;
    private ILuckyNumberService $luckyNumberService;

    public function __construct(ILuckyNumberRepository $luckyNumberRepository, ILuckyNumberService $luckyNumberService)
    {
        $this->luckyNumberRepository = $luckyNumberRepository;
        $this->luckyNumberService = $luckyNumberService;
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index ()
    {
        $number = $this->luckyNumberService->randNumber();
        return view('index', ['number' => $number]);
    }

    public function checkAnswer(Request $request) {
        $result =  $this->luckyNumberService->compare($request->all(['answer', 'luckyTicket']));
        $new_number = $this->luckyNumberService->randNumber();
        return view('index', ['number' => $new_number, 'result' => $result]);
    }
}
