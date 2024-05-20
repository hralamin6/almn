<?php

namespace App\Livewire;

use App\Exports\WordExport;
use App\Imports\WordImport;
use App\Models\Setup;
use App\Models\Word;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use misterspelik\LaravelPdf\Facades\Pdf;

class ArabicWordComponent extends Component
{

    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;
    public $selectedRows = [];
    public $selectPageRows = false;
    public $loadId = 0;
    public $itemPerPage=200;
    public $orderBy = 'id';
    public $searchBy = 'name';
    public $orderDirection = 'asc';
    public $search = '';
    public $itemStatus;
    public $photo;
    protected $queryString = [
        'search' => ['except' => ''],
        'itemStatus' => ['except' => null],
    ];

    public $word;
    public $name,$email,  $phone, $address, $bio, $status='active', $type='word', $facebook, $twitter, $instagram, $password, $confirmPassword;
    public $gender, $male_name, $female_name, $meaning, $pop;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function import(){
        $this->validate([
            'photo' => 'required|mimes:xls,csv, xlsx|max:1024', // 1MB Max
        ]);
        Excel::import(new WordImport(), $this->photo->store('photos'));
        $this->alert('success', 'Successfully imported');
    }
    public function export()
    {
        return Excel::download(new WordExport(), 'words.xls', \Maatwebsite\Excel\Excel::XLS);
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
    public function changeStatus(Word $word)
    {
        $word->status=='active'?$word->update(['status'=>'inactive']):$word->update(['status'=>'active']);
        $this->alert('success', __('Data updated successfully'));
    }
    public function addToWishlist(Word $word)
    {
        if (auth()->user()->words()->where('word_id',$word->id)->first()){

            auth()->user()->words()->detach($word->id, ['status' => 1]);
            $this->alert('success', __('Discard from wishlist successfully'));

        }else{
            auth()->user()->words()->attach($word->id, ['status' => 1]);
            $this->alert('success', __('Added to wishlist successfully'));


        }
    }
    public function resetData()
    {
        $this->reset('name', 'meaning', 'female_name', 'male_name', 'pop', 'status', 'gender');
    }

    public function saveData()
    {
        $data = $this->validate([
            'name' => ['required', 'min:2', 'max:33'],
            'status' => ['required'],
            'gender' => ['required'],
            'male_name' => ['nullable'],
            'female_name' => ['nullable'],
            'meaning' => ['nullable'],
            'pop' => ['required'],

        ]);
        $data = Word::create($data);
        $var = $data->id -2  ;
        $this->loadId = $data->id;
        $this->dispatch('dataAdded', dataId: "item-id-$var");
        $this->goToPage($this->getDataProperty()->lastPage());
        $this->alert('success', __('Data updated successfully'));
        $this->resetData();

    }
    public function loadData(Word $word)
    {
        $this->resetData();
        $this->name = $word->name;
        $this->male_name = $word->male_name;
        $this->female_name = $word->female_name;
        $this->pop = $word->pop;
        $this->gender = $word->gender;
        $this->status = $word->status;
        $this->meaning = $word->meaning;
        $this->word = $word;
    }
    public function editData()
    {
        $data = $this->validate([
            'name' => ['required', 'min:2', 'max:33'],
            'status' => ['required'],
            'gender' => ['required'],
            'male_name' => ['nullable'],
            'female_name' => ['nullable'],
            'meaning' => ['nullable'],
            'pop' => ['required'],
            ]);
        $this->word->update($data);
        $var = $this->word->id;
        $this->loadId = $this->word->id;
        $this->dispatch('dataAdded', dataId: "item-id-$var");
        $this->alert('success', __('Data updated successfully'));
        $this->resetData();
    }
    public function getDataProperty()
    {
        return Word::where($this->searchBy, 'like', '%'.$this->search.'%')
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
            $pdf = Pdf::loadView('excel.words', compact('items', 'setup'));
            return $pdf->stream('words.pdf');
        }, 'words.pdf');
    }
    public function wishListMultiple()
    {
        $relatedData = [];

// Loop through logic to populate the array
        foreach ($this->selectedRows as $i=> $r) {
            $relatedData[$r] = [
                'status' => 1,
            ];
        }
        auth()->user()->words()->syncWithoutDetaching($relatedData);
        $this->alert('success', __('Added to wishlist successfully'));
    }
    public function deleteMultiple()
    {
        Word::whereIn('id', $this->selectedRows)->delete();
        $this->selectPageRows = false;
        $this->selectedRows = [];
        $this->alert('success', __('Data deleted successfully'));
    }
    public function deleteSingle(Word $word)
    {
        $word->delete();
        $this->alert('success', __('Data deleted successfully'));
    }
    public function orderByDirection($field)
    {
        $this->orderBy = $field;
        $this->orderDirection==='asc'? $this->orderDirection='desc': $this->orderDirection='asc';
    }
    public function render()
    {
//        $this->authorize('isAdmin');
        $items = $this->data;
        return view('livewire.arabic-word-component', compact('items'));
    }
}
