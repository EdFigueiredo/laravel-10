<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'subject' => strtoupper($this->subject),
            'body' => $this->body,
            'stamp_created' => Carbon::make($this->created_at)->format('d-m-Y H:i:s'),
        ];
    }
}
