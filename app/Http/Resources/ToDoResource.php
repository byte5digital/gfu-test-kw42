<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ToDoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var \App\Models\ToDo $this */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'assignee' => new UserResource($this->user)
        ];
    }
}
