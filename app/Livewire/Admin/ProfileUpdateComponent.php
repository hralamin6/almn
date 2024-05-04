<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProfileUpdateComponent extends Component
{
    use LivewireAlert;

    public $name,$email,  $mobile, $status, $type, $user;

    public function mount()
    {
        $user = Auth::guard('admin')->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->status = $user->status;
        $this->type = $user->type;
        $this->user = $user;

    }
    public function updateProfile()
    {
        $data = $this->validate([
            'name' => ['required', 'min:2', 'max:33'],
            'mobile' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'status' => ['required'],
            'type' => ['required'],
            'email' => ['required', 'min:2', 'max:44', Rule::unique('users', 'email')->ignore($this->user->id)]
        ]);
            Auth::guard('admin')->user()->update($data);
            $this->alert('success', __('Profile updated successfully'));

    }
    public function render()
    {
        return view('livewire.admin.profile-update-component');
    }
}
