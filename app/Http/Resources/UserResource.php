<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        switch ($this->role_id) {
            case 1:
                $role = 'admin';
                break;
            case 2:
                $role = 'user';
                break;

            default:
                $role = 'user';
                break;
        }
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role' => $role,
            'joined' => Carbon::parse($this->created_at)->format('D, d M Y H:i'),
        ];
    }
}
