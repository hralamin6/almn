<?php

namespace App\Livewire;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class QuizComponent extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $itemPerPage = 3;
    public $quizId = null;
    public function getDataProperty()
    {
        if (auth()->user()->can('isAdmin')){
            return  Quiz::orderBy('created_at', 'desc')->paginate($this->itemPerPage)->withQueryString();
        }else{
            return Auth::user()->quizzes()->orderBy('created_at', 'desc')->paginate($this->itemPerPage)->withQueryString();
        }
    }
    public function deleteSingle(Quiz $quiz)
    {
        $quiz->delete();
        $this->alert('success', __('Data deleted successfully'));
    }
    public function render()
    {
        $items = $this->data;
        if ($this->quizId){
            $quiz = Quiz::find($this->quizId);
        }else{
            $quiz = null;
        }

        return view('livewire.quiz-component', compact('items', 'quiz'));
    }
}
