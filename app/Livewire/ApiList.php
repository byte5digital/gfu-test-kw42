<?php

namespace App\Livewire;

use Livewire\Component;

class ApiList extends Component
{
    public array $results = [];

    public function render()
    {
        return view('livewire.api-list');
    }

    public function fetchApi()
    {
        $this->results = \Http::withoutVerifying()
            ->get('https://the-one-api.dev/v2/book')
            ->json();

    }
}
