<?php

namespace App\Services;

use App\Http\Resources\BuyerResource;
use App\Models\Buyer;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BuyerService extends Service {

    public function ListAll()
    {
        $buyers = Buyer::get();
        return $this->showAll(BuyerResource::collection($buyers)->toArray($this->request));
    }

    public function Show($id) {
        try{
            $buyer = Buyer::with('transactions.product')->findOrFail($id);
            return $this->showOne(BuyerResource::make($buyer));
        }catch(ModelNotFoundException $ex){
            return $this->showOne([
                'message' => $ex->getMessage()
            ], 404);
        }catch(Exception $ex){
             return $this->showError($ex->getMessage(),[
                'message' => $ex->getMessage()
             ],500);
        }
    }
}