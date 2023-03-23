<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ChallengeResource;

class CTFResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'        => $this->name,
            'description' => $this->description,
            'date'        => $this->date,
            'players'     => $this->players ?? 0,
            'status'      => $this->status,
            'challenges'  => ChallengeResource::collection($this->challenges)
        ];
    }
}
