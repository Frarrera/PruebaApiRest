<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $props = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
        if($this->relationLoaded('products')){
            /**
             * Se agrego porque por alguna razon el whenLoaded siempre me mostraba la relacion aun que no se incluyera
             * con un with
             */
           $props['products'] = ProductResource::collection($this->whenLoaded('products', $this->products));
        }
        return $props;
    }
}
