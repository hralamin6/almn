<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Adminlogin extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        if (!Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }
        return $this->redirect(route('dashboard.home'), navigate: true);
//        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.adminlogin')->layout('components.layouts.authLogin');
    }
}
