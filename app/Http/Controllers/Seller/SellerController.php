<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\SellerService;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    private $service;

    public function __construct(Request $request)
    {
        $this->service = new SellerService($request);
    }

    public function Index(){
        return $this->service->ListAll();
    }

    public function Show($id)
    {
        return $this->service->Show($id);
    }

    public function AddProduct(ProductRequest $request)
    {
        return $this->service->CreateProduct();   
    }
}
