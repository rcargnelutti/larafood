<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name' => $this->name,
            'id' => $this->id,
            'plan_id' => $this->plan_id,
            'cnpj' => $this->cnpj,
            'name' => $this->name,
            'url' => $this->url,
            'email' => $this->email,
            'logo' => $this->logo,
            'active' => $this->active,
            'subscription' => $this->subscription,
            'expires_at' => $this->expires_at,
            'subscription_id' => $this->subscription_id,
            'subscription_active' => $this->subscription_active,
            'subscription_active_boolean' => $this->subscription_active == 0?false:true,
            'subscription_suspended' => $this->subscription_suspended,
            'created_at' => $this->created_at->format('d/m/Y'),
            'image' => $this->logo ? url("storage/{$this->logo}") : '',
            //'updated_at' => $this->updated_at,
        ];
    }
}
