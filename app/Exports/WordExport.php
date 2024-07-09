<?php

namespace App\Exports;

use App\Models\Setup;
use App\Models\Word;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class WordExport implements FromView
{
    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
//    public function collection()
//    {
//        return Word::all();
//    }
    public function view(): View
    {
//        $items= Word::select('words.*')->where($this->searchBy, 'like', '%'.$this->search.'%')
//            ->orderBy($this->orderBy, $this->orderDirection)
//            ->when($this->itemGender, function ($query) {
//                return $query->where('gender', $this->itemGender);
//            })->when($this->itemUserIds, function ($query) {
//                return $query->where('user_id', $this->itemUserIds);
//            })->when($this->itemPop, function ($query) {
//                return $query->where('pop', $this->itemPop);
//            })
//            ->whereIn('id', function ($query) {
//                $query->select(DB::raw('MIN(id)'))
//                    ->from('words')
//                    ->groupBy($this->groupBy);
//            });
        $items = $this->items;
        $setup = Setup::first();
        return view('excel.words',  compact('items', 'setup'));
    }
}
