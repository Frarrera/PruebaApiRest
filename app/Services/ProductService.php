<?php
namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Transaction;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ProductService extends Service {

    private $transactionService;

    public function __construct($request)
    {
        parent::__construct($request);
        $this->transactionService = new TransactionService($request);
    }

    public function ListAll()
    {
        try{
            $product = Product::InStock()->get();
            if ($this->request->filled('show_products_without_stock')) {
                $product = Product::get();
            }
            return $this->showAll( ProductResource::collection($product)->toArray($this->request));
        }catch(Exception $ex){
            dd($ex);
        }
       
    }

    public function Show($id) {
        try {
            $product = Product::findOrFail($id);
            return ProductResource::make($product);
        } catch (ModelNotFoundException $ex) {
            return $this->showError("No se encontro el producto", [], 404);
        } catch (Exception $ex) {
            return $this->showError($ex->getMessage(), [], 500);
        }
    }

    /**
     * Crea un producto para el usuario en sesion y los parametros obtenidos del request actual
     */
    public function Create() {
        try{
            $product = new Product();
            DB::transaction(function() use(&$product){
                $product->fill($this->request->only(['name', 'description', 'quantity']));
                $product->user_id = $this->request->user()->id;
                $product->saveOrFail();
            });
            return $this->showOne([
                'message' => 'Producto creado correctamente',
                'product' => ProductResource::make($product)
            ]);
        }catch(Exception $ex) {
            return $this->ShowOne([
                'message' => $ex->getMessage()
            ]);
        }
    }

    /***
     * 
     */
    public function Buy(int $id) {
        try{
            $quantity = $this->request->input('quantity');
            DB::transaction(function () use($id,$quantity) {
                $product = Product::findOrFail($id);
                $this->transactionService->Create($id);
                $product->quantity -= $quantity;
                $product->save(); 
            });
            return $this->showOne([
                'message' => 'Compra completada con exito'
            ]);
        }catch(ModelNotFoundException $ex){
            return $this->showOne([
                'message' => $ex->getMessage()
            ]);
        }
    }
}