<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "mail" => $this->mail,
            "created_at" => Carbon::make($this->created_at)->format('Y-m-d'),
            "updated_at" => Carbon::make($this->updated_at)->format('Y-m-d'),
        ];
    }
}
