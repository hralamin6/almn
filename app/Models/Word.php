<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function options(Word $word, $field)
    {
        $word = Word::where('id', '!=', $word->id)->inRandomOrder()->limit(3)->get()->merge(Word::where('id', $word->id)->get());

        return $word->shuffle();
    }

}
