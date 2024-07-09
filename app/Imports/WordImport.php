<?php

namespace App\Imports;

use App\Models\Word;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WordImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Word([
            'user_id'     => 1,
            'name'     => $row['words'],
            'meaning'     => $row['meaning'],
            'pop'     => $row['pop'],
            'gender'     => $row['gender'],
            'status'     => 'active',
        ]);
    }
}
