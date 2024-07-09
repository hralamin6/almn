<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PractiseComponent extends Component
{
    use LivewireAlert;
    public $is_single_page=1,$is_my_words=0, $is_mcq=1, $q_number=10, $q_time=30, $is_minus=0, $isWishlist=0, $isToWishlist=0, $isSave=0;

    public function mount()
    {

        if (session()->has('q_number')){
            $this->q_number = session()->get('q_number');
        }
        session()->has('is_single_page')? $this->is_single_page = session()->get('is_single_page'):'';
        session()->has('q_time')? $this->q_time = session()->get('q_time'):'';
        session()->has('is_minus')? $this->is_minus = session()->get('is_minus'):'';
        session()->has('is_mcq')? $this->is_mcq = session()->get('is_mcq'):'';
        session()->has('isWishlist')? $this->isWishlist = session()->get('isWishlist'):'';
        session()->has('isToWishlist')? $this->isToWishlist = session()->get('isToWishlist'):'';
        session()->has('isSave')? $this->isSave = session()->get('isSave'):'';
        session()->has('is_my_words')? $this->is_my_words = session()->get('is_my_words'):'';

//        $this->startPractise();
    }
    public function updated($f, $v)
    {
        $this->startPractise();
    }
    public function startPractise()
    {
        session()->put([
            'is_single_page'=> $this->is_single_page, 'q_number' => $this->q_number, 'q_time'=>$this->q_time,
            'is_minus'=>$this->is_minus, 'is_mcq'=>$this->is_mcq,
            'isWishlist'=>$this->isWishlist,
            'isToWishlist'=>$this->isToWishlist,
            'isSave'=>$this->isSave,
            'is_my_words'=>$this->is_my_words
        ]);
//        $this->alert('success', __('Successfully saved'));
    }
    public function render()
    {
        if (session()->has('message')){
            $this->alert('error', __('there is not enough words'));
        }
        return view('livewire.practise-component');
    }
}
