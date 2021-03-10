<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'products' => new ProductResource($this->product),
            'total' => $this->total,
            'created' => Carbon::parse($this->created_at)->format('D, d M Y H:i'),
            'updated' => Carbon::parse($this->updated_at)->format('D, d M Y H:i'),
        ];
    }
}
