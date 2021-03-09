<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'desc' => $this->desc,
            'price' => $this->price,
            'stock' => $this->stock,
            'stock' => $this->stock,
            'image' => $this->image,
            'size' => $this->size->name,
            'category' => $this->category->name,
            'created' => Carbon::parse($this->created_at)->format('D, d M Y H:i'),
            'updated' => Carbon::parse($this->updated_at)->format('D, d M Y H:i'),
        ];
    }
}
