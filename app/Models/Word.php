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
        if ($field==='name'){
            $name = mb_substr($word->name, 0, 1);
            $meaning = mb_substr($word->meaning, 0, 1);
            $words = Word::where('id', '!=', $word->id)->where($field, 'like', $name.'%')->inRandomOrder()->limit(3)->get()->merge(Word::where('id', $word->id)->get());
            if ($words->count() < 4) {
                $additionalData = Word::where('id', '!=', $word->id)->where('meaning', 'like', $meaning.'%')->take(4 - $words->count())->get();
                $words = $words->merge($additionalData);
            }
        }
//        $word = Word::where('id', '!=', $word->id)->inRandomOrder()->limit(3)->get()->merge(Word::where('id', $word->id)->get());

        return $words->shuffle();
    }

}
