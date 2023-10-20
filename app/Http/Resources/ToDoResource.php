<?php

namespace App\Http\Resources;

use App\Models\ToDo;
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
        /* @var ToDo $this */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'assignee' => match ($this->assignable_type) {
                'App\Models\User' => new UserResource($this->assignable),
                'App\Models\TeamMember' => new TeamMemberResource($this->assignable),
                default => null
            },
        ];
    }
}
