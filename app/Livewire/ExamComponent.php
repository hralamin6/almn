<?php

namespace App\Livewire;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ExamComponent extends Component
{
    use LivewireAlert;
public $ans=[];
    public $item_per_page = 10, $time_per_question = 30, $same_items, $practise, $options, $items, $submitted=false, $true_ans, $range, $is_single_page=1, $is_mcq=1, $date_time, $q_start=1, $q_end=25, $is_minus=0;
    protected $queryString = [
        'practise'
    ];
    public function getDataProperty()
    {
        return Word::where('id', '>=', $this->q_start)->where('id', '<=', $this->q_end)->inRandomOrder()->limit($this->item_per_page)->get();
    }

    public function mount(Request $request)
    {
        $columns = Schema::getColumnListing('words');
        if ($request->practise && in_array($this->practise, $columns)){
            $this->practise = $request->practise;
        }else{
            $this->practise = 'name';
        }
//        dd($this->practise);
        if (session()->has('q_range')){
            $r = session()->get('q_range');
            $parts = explode('-', $r);
            $this->q_start = $parts[0];
            $this->q_end = $parts[1];
            $this->range = $parts[1]-$parts[0];
        }
        if (session()->has('q_number')){
            if (session()->get('q_number')>$this->range){
                $this->item_per_page = 20;
            }else{
                $this->item_per_page = session()->get('q_number');
            }
        }
        session()->has('is_single_page')? $this->is_single_page = session()->get('is_single_page'):'';
        session()->has('q_time')? $this->time_per_question = session()->get('q_time'):'';
        session()->has('is_minus')? $this->is_minus = session()->get('is_minus'):'';
        session()->has('is_mcq')? $this->is_mcq = session()->get('is_mcq'):'';
        $this->ans = array_fill(0, $this->item_per_page, null);
        $this->items = $this->data;
        $this->same_items = $this->data;
    }
    public function submit()
    {
        $this->true_ans = 0;
        foreach ($this->same_items as $i=> $question){
            if (isset($this->ans[$i])){
                if ($this->is_mcq){
                    if (strtolower($question[$this->practise]) === strtolower($this->ans[$i])){
                        $this->true_ans++;
                    }else{
                        $this->is_minus? $this->true_ans--:'';
                    }
                }else{
                    $col = is_numeric($question[$this->practise])?strval(number_format($question[$this->practise])):strtolower($question[$this->practise]);
                    $ans = is_numeric($this->ans[$i])?strval(number_format($this->ans[$i])):strtolower($this->ans[$i]);
                    $str1 = str_split(strtolower($col));
                    $str2 = str_split(strtolower($ans));
                    $vowel = str_split('aeiouyh');
                    $diff1 = array_diff($str1, $str2);
                    $diff2 = array_diff($diff1, $vowel);
                    if (strlen(implode($diff2))==0 && strlen($this->ans[$i])<13){
                        $this->true_ans++;
                    }else{
                        $this->is_minus? $this->true_ans--:'';
                    }
                }

            }
        }
        $this->submitted = true;
        $this->dispatch('timeFinished');
        $this->alert('success', __('Practise successfully finished'));
    }
    public function render()
    {
        return view('livewire.exam-component');
    }
}
