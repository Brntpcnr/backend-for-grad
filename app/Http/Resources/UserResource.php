<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        [
            'id' => $this->id,
            'role_id' => $this->role_id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'email_verified_at'=> $this ->email_verified_at,
            'password'=> $this->password,
            'remember_token'=> $this ->remember_token,
            'settings' => $this->settings,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
