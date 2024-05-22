<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ExamComponent extends Component
{
    use LivewireAlert;
public $ans=[];
    public $item_per_page = 10, $time_per_question = 30, $same_items, $practise,$from, $options, $items, $submitted=false,
       $correct=0, $wrong=0, $skipped=0, $negative = 0, $true_ans, $range, $is_single_page=1, $is_mcq=1, $date_time, $is_minus=0, $isWishlist=0, $isToWishlist=0, $isSave=0;
    protected $queryString = [
        'practise', 'from'
    ];
    public function getDataProperty()
    {
        if (auth()->check() && $this->isWishlist){

            return auth()->user()->words()->inRandomOrder()->limit($this->item_per_page)->get();
        }
        else{
            return Word::inRandomOrder()->limit($this->item_per_page)->get();
        }
    }

    public function mount(Request $request)
    {
        $columns = Schema::getColumnListing('words');
        if ($request->practise && in_array($this->practise, $columns) && in_array($this->from, $columns)){
            $this->practise = $request->practise;
            $this->from = $request->from;
        }else{
            $this->practise = 'name';
            $this->from = 'meaning';
        }
        if (session()->has('q_number')){

                $this->item_per_page = session()->get('q_number');
        }
        session()->has('is_single_page')? $this->is_single_page = session()->get('is_single_page'):'';
        session()->has('q_time')? $this->time_per_question = session()->get('q_time'):'';
        session()->has('is_minus')? $this->is_minus = session()->get('is_minus'):'';
        session()->has('is_mcq')? $this->is_mcq = session()->get('is_mcq'):'';
        session()->has('isWishlist')? $this->isWishlist = session()->get('isWishlist'):'';
        session()->has('isToWishlist')? $this->isToWishlist = session()->get('isToWishlist'):'';
        session()->has('isSave')? $this->isSave = session()->get('isSave'):'';

        $this->ans = array_fill(0, $this->item_per_page, null);
        $this->items = $this->data;
        $this->same_items = $this->data;
        if ($this->items->count() < $this->item_per_page){
            $this->item_per_page = $this->items->count();
        }
    }
    public function submit()
    {
        if (auth()->check() && $this->isSave){
            $this->true_ans = 0;
            $correct = 0;
            $wrong = 0;
            $quizz = new Quiz();
            $quizz->user_id = auth()->id();
            $quizz->title = $this->from .' to '. $this->practise ;
            $quizz->count = $this->item_per_page;
            $quizz->is_minus = $this->is_minus;
            $quizz->save();
            foreach ($this->same_items as $i=> $question){

                $que = new Question();
                $que->quiz_id= $quizz->id;
                $que->title= 'what is the '. $this->practise .' of '. $question[$this->from];
                $que->answer =  $question[$this->practise];
                $que->user_answer = null;
                $que->status = 'skipped';
                if (isset($this->ans[$i])){
                    $que->user_answer = $this->ans[$i];

                    if ($this->is_mcq){
                        if (strtolower($question[$this->practise]) === strtolower($this->ans[$i])){
                            $this->true_ans++;
                            $correct++;
                            $que->status = 'correct';

                        }else{
                            $wrong++;
                            $this->is_minus? $this->true_ans--:'';
                            $que->status = 'wrong';
                            if ($this->isToWishlist && !$this->isWishlist){
                                auth()->user()->words()->syncWithoutDetaching($question->id);
                            }
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
                            $correct++;
                            $que->status = 'correct';

                        }else{
                            $wrong++;
                            $this->is_minus? $this->true_ans--:'';
                            $que->status = 'wrong';
                            if ($this->isToWishlist && !$this->isWishlist){
                                auth()->user()->words()->syncWithoutDetaching($question->id);
                            }
                        }
                    }

                }else{
                    if ($this->isToWishlist && !$this->isWishlist){
                        auth()->user()->words()->syncWithoutDetaching($question->id);
                    }
                }
                $que->save();
            }
            $quizz->result = $this->true_ans;
            $quizz->correct = $correct;
            $quizz->wrong = $wrong;
            $quizz->is_minus = $this->is_minus==1?$wrong:0;
            $quizz->skipped = $this->item_per_page-($correct+$wrong);
            $quizz->save();

            $this->correct = $correct;
            $this->wrong = $wrong;
            $this->skipped = $this->item_per_page-($correct+$wrong);;
            $this->negative = $this->is_minus?$wrong:0;
        }else{
            $this->true_ans = 0;
            $correct = 0;
            $wrong = 0;

            foreach ($this->same_items as $i=> $question){

                if (isset($this->ans[$i])){
                    if ($this->is_mcq){
                        if (strtolower($question[$this->practise]) === strtolower($this->ans[$i])){
                            $this->true_ans++;
                            $correct++;
                        }else{
                            $wrong++;
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
                            $correct++;

                        }else{
                            $wrong++;
                            $this->is_minus? $this->true_ans--:'';

                        }
                    }

                }
            }
            $this->correct = $correct;
            $this->wrong = $wrong;
            $this->skipped = $this->item_per_page-($correct+$wrong);;
            $this->negative = $this->is_minus==1?$this->wrong:0;

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
