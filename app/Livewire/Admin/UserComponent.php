<?php

namespace App\Livewire\Admin;

use App\Models\Setup;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use misterspelik\LaravelPdf\Facades\Pdf;

class UserComponent extends Component
{

    use WithPagination;
    use LivewireAlert;
    public $selectedRows = [];
    public $selectPageRows = false;
    public $itemPerPage=1000;
    public $orderBy = 'id';
    public $searchBy = 'name';
    public $orderDirection = 'asc';
    public $search = '';
    public $itemStatus;
    protected $queryString = [
        'search' => ['except' => ''],
        'itemStatus' => ['except' => null],
    ];

    public $user;
    public $name,$email,  $phone, $address, $bio, $status='active', $type='user', $facebook, $twitter, $instagram, $password, $confirmPassword;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedItemPerPage()
    {
        $this->resetPage();
    }
    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->data->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset('selectedRows', 'selectPageRows');
        }
    }
    public function changeStatus(User $user)
    {
        $user->status=='active'?$user->update(['status'=>'inactive']):$user->update(['status'=>'active']);
        $this->alert('success', __('Data updated successfully'));
    }
    public function saveData()
    {
        $data = $this->validate([
            'name' => ['required', 'min:2', 'max:33'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'status' => ['required'],
            'type' => ['required'],
            'bio' => ['nullable', 'min:10'],
            'address' => ['nullable', 'min:10'],
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable',  'url'],
            'instagram' => ['nullable', 'url'],
            'password' => ['required', 'min:8', 'same:confirmPassword'],
            'email' => ['required', 'min:2', 'max:44', Rule::unique('users', 'email')]
        ]);
        $data['password'] = Hash::make($this->password);

        $data = User::create($data);
        $this->reset('name', 'email', 'phone', 'bio', 'address', 'status', 'type', 'facebook', 'twitter', 'instagram', 'password', 'confirmPassword');
//        $this->goToPage($this->getDataProperty()->lastPage());
//        $this->emit('dataAdded', ['dataId' => 'item-id-'.$data->id]);
        $this->alert('success', __('Data updated successfully'));

    }
    public function loadData(User $user)
    {
        $this->reset('name', 'email', 'phone', 'bio', 'address', 'status', 'type', 'facebook', 'twitter', 'instagram', 'password', 'confirmPassword');
//        $this->emit('openEditModal');
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->bio = $user->bio;
        $this->address = $user->address;
        $this->status = $user->status;
        $this->type = $user->type;
        $this->facebook = $user->facebook;
        $this->instagram = $user->instagram;
        $this->twitter = $user->twitter;
        $this->user = $user;
    }
    public function editData()
    {
        $data = $this->validate([
            'name' => ['required', 'min:2', 'max:33'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'status' => ['required'],
            'type' => ['required'],
            'bio' => ['nullable', 'min:10'],
            'address' => ['nullable', 'min:10'],
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable',  'url'],
            'instagram' => ['nullable', 'url'],
            'password' => ['nullable', 'min:8', 'same:confirmPassword'],
            'email' => ['required', 'min:2', 'max:44', Rule::unique('users', 'email')->ignore($this->user['id'])]
        ]);
//                dd($data['password']);
        $data['password'] = $data['password']==null? $this->user->password:Hash::make($data['password']);

        $this->user->update($data);
//        $this->emit('dataAdded', ['dataId' => 'item-id-'.$this->user->id]);
        $this->alert('success', __('Data updated successfully'));
        $this->reset('name', 'email', 'phone', 'bio', 'address', 'status', 'type', 'facebook', 'twitter', 'instagram', 'password', 'confirmPassword');
    }
    public function getDataProperty()
    {
        return User::where($this->searchBy, 'like', '%'.$this->search.'%')
            ->orderBy($this->orderBy, $this->orderDirection)
            ->when($this->itemStatus, function ($query) {
                return $query->where('status', $this->itemStatus);
            })
            ->paginate($this->itemPerPage)->withQueryString();
    }
    public function generate_pdf()
    {
        return response()->streamDownload(function () {
            $items= $this->data;
            $setup = Setup::first();
            $pdf = Pdf::loadView('pdf.users', compact('items', 'setup'));
            return $pdf->stream('users.pdf');
        }, 'users.pdf');
    }
    public function deleteMultiple()
    {
        User::whereIn('id', $this->selectedRows)->delete();
        $this->selectPageRows = false;
        $this->selectedRows = [];
        $this->alert('success', __('Data deleted successfully'));
    }
    public function deleteSingle(User $user)
    {
        $user->delete();
        $this->alert('success', __('Data deleted successfully'));
    }
    public function orderByDirection($field)
    {
        $this->orderBy = $field;
        $this->orderDirection==='asc'? $this->orderDirection='desc': $this->orderDirection='asc';
    }
    public function render()
    {
        $this->authorize('isAdmin');
        $items = $this->data;

        return view('livewire.admin.user-component', compact('items'));
    }
}
