<?php
namespace App\Services;

use App\Http\Resources\SellerResource;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SellerService extends Service
{
    private $product;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->product = new ProductService($request);
    }

    public function ListAll()
    {
        $sellers = Seller::all();
        return $this->showAll(SellerResource::collection($sellers)->toArray(null));
    }

    public function Show($id)
    {
        try{
            $seller = Seller::with('products')->findOrFail($id);
            return $this->showOne(SellerResource::make($seller));
        }catch(ModelNotFoundException $ex){
            return $this->showError($ex->getMessage(),[],404);
        }
    }

    public function CreateProduct(){
        return $this->product->Create();
    }
}