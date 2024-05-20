<?php

namespace App\Exports;

use App\Models\Setup;
use App\Models\Word;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class WordExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
//    public function collection()
//    {
//        return Word::all();
//    }
    public function view(): View
    {
        $items= Word::all();
        $setup = Setup::first();
        return view('excel.words',  compact('items', 'setup'));
    }
}
