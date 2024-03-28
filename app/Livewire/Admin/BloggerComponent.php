<?php

namespace App\Livewire\Admin;

use App\Models\Setup;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use misterspelik\LaravelPdf\Facades\Pdf;

class BloggerComponent extends Component
{
    use WithPagination;
//    use LivewireAlert;
//    public $brand;
//    public $name, $status='active';
    public $selectedRows = [];
    public $selectPageRows = false;
    public $itemPerPage;
    public $orderBy = 'id';
    public $searchBy = 'id';
    public $orderDirection = 'asc';
    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $listeners = ['deleteMultiple', 'deleteSingle'];
    public function getDataProperty()
    {
        return User::where($this->searchBy, 'like', '%'.$this->search.'%')->orderBy($this->orderBy, $this->orderDirection)->paginate($this->itemPerPage, ['id', 'name', 'status', 'created_at'])->withQueryString();
    }
    public function generate_pdf()
    {
        return response()->streamDownload(function () {
            $items= User::where('name', 'like', '%'.$this->search.'%')->where('type', 'user')->orderBy($this->orderBy, $this->orderDirection)->get();
            $setup = Setup::first();
            $pdf = Pdf::loadView('pdf.users', compact('items', 'setup'));
            return $pdf->stream('users.pdf');
        }, 'users.pdf');
    }
    public function render()
    {
        $items = $this->data;

        return view('livewire.admin.blogger-component', compact('items'));
    }
}
