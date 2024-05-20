<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PractiseComponent extends Component
{
    use LivewireAlert;
    public $is_single_page=0,$is_mcq=1, $q_number=10, $q_time=30, $is_minus=0;

    public function mount()
    {

        if (session()->has('q_number')){
            $this->q_number = session()->get('q_number');
        }
        session()->has('is_single_page')? $this->is_single_page = session()->get('is_single_page'):'';
        session()->has('q_time')? $this->q_time = session()->get('q_time'):'';
        session()->has('is_minus')? $this->is_minus = session()->get('is_minus'):'';
        session()->has('is_mcq')? $this->is_mcq = session()->get('is_mcq'):'';
//        $this->startPractise();
    }
    public function updated($f, $v)
    {
        $this->startPractise();
    }
    public function startPractise()
    {
        session()->put(['is_single_page'=> $this->is_single_page, 'q_number' => $this->q_number, 'q_time'=>$this->q_time, 'is_minus'=>$this->is_minus, 'is_mcq'=>$this->is_mcq]);
        $this->alert('success', __('Successfully saved'));
    }
    public function render()
    {
        return view('livewire.practise-component');
    }
}
