<?php

namespace App\Livewire;

use Livewire\Component;

class HeaderComponent extends Component
{
    public function updatedLocale()
    {
        session()->put('locale', $this->locale);
        return redirect()->to(url()->previous());
    }
    public function render()
    {

        return view('livewire.header-component');
    }
}
