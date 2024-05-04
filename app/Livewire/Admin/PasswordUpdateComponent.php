<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PasswordUpdateComponent extends Component
{
    use LivewireAlert;

    public $currentPassword = '';
    public $newPassword = '';
    public $confirmPassword = '';
    public $checkPassword = false;

    public function updatedCurrentPassword()
    {
        if (Hash::check($this->currentPassword, Auth::guard('admin')->user()->password)){
            $this->checkPassword = true;
        }else{
            $this->checkPassword = false;
        }
        }
    public function updatePassword()
    {
        $this->validate([
            'newPassword' => ['required', 'min:8', 'same:confirmPassword'],
        ]);
        if (Hash::check($this->currentPassword, Auth::guard('admin')->user()->password)){
            Auth::guard('admin')->user()->update(['password'=>Hash::make($this->newPassword)]);
            $this->alert('success', __('Password updated successfully'));
            $this->reset();
        }else {

            $this->alert('error', __('Current password is wrong'));
        }

    }
    public function render()
    {
        $user = Auth::guard('admin')->user();
        return view('livewire.admin.password-update-component', compact('user'));
    }
}
