<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Services\BuyerService;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    //
    private $service;

    public function __construct(Request $request)
    {
        $this->service = new BuyerService($request);
    }

    public function Index() {
        return $this->service->ListAll();
    }

    public function Show($id) {
        return $this->service->Show($id);
    }
    
}
