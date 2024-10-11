<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Word extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function options(Word $word, $practise, $from)
    {
        if ($from==='meaning'){
            if ($practise==='name'){
                $name = mb_substr($word->name, 0, 1);
                $meaning = mb_substr($word->meaning, 0, 1);
                $words = Word::where('id', '!=', $word->id)
//                    ->where($practise, 'like', $name.'%')
                    ->orderByRaw("CASE WHEN name LIKE ? THEN 1 ELSE 2 END", ["{$name}%"])
                    ->inRandomOrder()->limit(3)
                    ->whereIn('id', function ($query) {
                        $query->select(DB::raw('MIN(id)'))
                            ->from('words')
                            ->groupBy('name');
                    })->get()->merge(Word::where('id', $word->id)->get());
//                if ($words->count() < 4) {
//                    $additionalData = Word::where('id', '!=', $word->id)->where($from, 'like', $meaning.'%')->take(4 - $words->count())->get();
//                    $words = $words->merge($additionalData);
//                }
            }elseif ($practise==='pop'){
                $additionalData = Word::where('id', $word->id)->get();
                $model = Word::select($practise)->distinct()->where('id', '!=', $word->id)->where($practise, '!=', $word->pop)->inRandomOrder()->limit(3)
                    ->whereIn('id', function ($query) {
                        $query->select(DB::raw('MIN(id)'))
                            ->from('words')
                            ->groupBy('name');
                    })->get();
                $words = array_merge($model->toArray(), $additionalData->toArray());
                $words = collect($words);
            }
        }



        if ($from==='pop'){
            if ($practise==='name'){
                $name = mb_substr($word->name, 0, 1);
                $meaning = mb_substr($word->meaning, 0, 1);
                $words = Word::where('id', '!=', $word->id)->where($practise, 'like', $name.'%')->inRandomOrder()->limit(3)
                    ->whereIn('id', function ($query) {
                        $query->select(DB::raw('MIN(id)'))
                            ->from('words')
                            ->groupBy('pop');
                    })->get()->merge(Word::where('id', $word->id)->get());
                if ($words->count() < 4) {
                    $additionalData = Word::where('id', '!=', $word->id)->where($from, 'like', $meaning.'%')->take(4 - $words->count())->get();
                    $words = $words->merge($additionalData);
                }
            }elseif ($practise==='meaning'){
                $additionalData = Word::where('id', $word->id)->get();
                $model = Word::where('id', '!=', $word->id)->where($from, '!=', $word->pop)->inRandomOrder()->limit(3)
                    ->whereIn('id', function ($query) {
                        $query->select(DB::raw('MIN(id)'))
                            ->from('words')
                            ->groupBy('pop');
                    })->get();
                $words = array_merge($model->toArray(), $additionalData->toArray());
                $words = collect($words);
            }
        }




        elseif ($from==='name'){
            if ($practise==='meaning'){
                $name = mb_substr($word->name, 0, 1);
                $meaning = mb_substr($word->meaning, 0, 1);
                $words = Word::where('id', '!=', $word->id)->where($from, '!=', $word->name)->where($practise, 'like', $meaning.'%')->inRandomOrder()->limit(3)
                    ->whereIn('id', function ($query) {
                        $query->select(DB::raw('MIN(id)'))
                            ->from('words')
                            ->groupBy('name');
                    })->get()->merge(Word::where('id', $word->id)->get());
                if ($words->count() < 4) {
                    $additionalData = Word::where('id', '!=', $word->id)->where($from, '!=', $word->name)->where($from, 'like', $name.'%')->take(4 - $words->count())->get();
                    $words = $words->merge($additionalData);
                }
            }
        }

//        $word = Word::where('id', '!=', $word->id)->inRandomOrder()->limit(3)->get()->merge(Word::where('id', $word->id)->get());

        return $words->shuffle();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'data' => 'array',
    ];

}
