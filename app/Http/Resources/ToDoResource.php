<?php

namespace App\Http\Resources;

use App\Data\EmployeeData;
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
            'assignee' => EmployeeData::fromModel($this->assignable)
        ];
    }
}
