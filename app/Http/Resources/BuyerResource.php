<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BuyerResource extends JsonResource
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
        if($this->relationLoaded('transactions')){
            $props['transactions'] = $this->whenLoaded('transactions', TransactionResource::collection( $this->transactions));
        }
        return $props;
    }
}
