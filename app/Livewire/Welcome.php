<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{

    public string $welcomeText = "Welcome to the Backend of Livewire";
    public string $goodbyeText = "Goodbye to the Backend of Livewire";

    public string $currentText = "";

    public bool $toggleBool = true;

    public function render()
    {
        return view('livewire.welcome');
    }

    public function toggleTextInFrontend()
    {
        $this->toggleBool = !$this->toggleBool;
        $this->currentText = $this->toggleBool ? $this->welcomeText : $this->goodbyeText;
    }
}
