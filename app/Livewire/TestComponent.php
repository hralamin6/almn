<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Word;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TestComponent extends Component
{
    use LivewireAlert;

    public $questions = [];
    public $selectedAnswers = [];
    public $quizResults = [];
    public $correctAnswersCount = 0;
    public $wrongAnswersCount = 0;
    public $quizCompleted = false;
    public $totalQuestions = 10; // Number of questions to generate
    public $item_per_page = 10, $time_per_question = 30, $same_items, $practise='details_to_verb', $from, $options, $items, $submitted = false,
        $correct = 0, $wrong = 0, $skipped = 0, $negative = 0, $true_ans, $range, $is_my_words = 0, $is_single_page = 1, $is_mcq = 1, $date_time, $is_minus = 0, $isWishlist = 0, $isToWishlist = 0, $isSave = 0;
    protected $queryString = [
        'practise',
    ];

    public function getDataProperty()
    {
        if (auth()->check() && $this->isWishlist && $this->is_my_words) {

            $w = auth()->user()->words()->inRandomOrder()->whereNotNull('data')->where('user_id', auth()->id())
                ->limit($this->item_per_page)->get();
        } elseif (auth()->check() && $this->isWishlist) {
            $w = auth()->user()->words()->whereNotNull('data')->inRandomOrder()
                ->limit($this->item_per_page)->get();
        } elseif (auth()->check() && $this->is_my_words) {
            $w = Word::whereNotNull('data')->inRandomOrder()
                ->when($this->is_my_words, function ($query) {
                    return $query->where('user_id', auth()->id());
                })
                ->limit($this->item_per_page)->get();
        } else {
            $w = Word::whereNotNull('data')->inRandomOrder()->limit($this->item_per_page)->get();
        }

        return $w;

    }

    public function mount()
    {

        session()->has('isSave') ? $this->isSave = session()->get('isSave') : '';

        session()->has('q_number') ? $this->item_per_page = session()->get('q_number') : 10;
        session()->has('is_single_page') ? $this->is_single_page = session()->get('is_single_page') : '';
        session()->has('q_time') ? $this->time_per_question = session()->get('q_time') : '';
        session()->has('is_minus') ? $this->is_minus = session()->get('is_minus') : '';
        session()->has('isWishlist') ? $this->isWishlist = session()->get('isWishlist') : '';
        session()->has('isToWishlist') ? $this->isToWishlist = session()->get('isToWishlist') : '';
        session()->has('is_my_words') ? $this->is_my_words = session()->get('is_my_words') : '';

        $this->generateQuestions();
    }

    public function questionType()
    {
        $questionTypes = [

            'baab' => 'Verb Pattern (Baab)',
            'masdar' => 'Infinitive (Masdar)',
            'madee' => 'Past Tense (Madee)',
            'mudaree' => 'Present Tense (Mudaree)',
            'amr' => 'Imperative (Amr)',
            'nahee' => 'Negative Imperative (Nahee)',
            'ismul_fel' => 'Active Participle (Ism-ul-Fel)',
// Madee Conjugations
            'madee_gaaib_male_oheed' => 'Past - 3rd Person Male Singular',
            'madee_gaaib_male_tasnia' => 'Past - 3rd Person Male Dual',
            'madee_gaaib_male_jama' => 'Past - 3rd Person Male Plural',
            'madee_gaaib_female_oheed' => 'Past - 3rd Person Female Singular',
            'madee_gaaib_female_tasnia' => 'Past - 3rd Person Female Dual',
            'madee_gaaib_female_jama' => 'Past - 3rd Person Female Plural',
            'madee_haader_male_oheed' => 'Past - 2nd Person Male Singular',
            'madee_haader_male_tasnia' => 'Past - 2nd Person Male Dual',
            'madee_haader_male_jama' => 'Past - 2nd Person Male Plural',
            'madee_haader_female_oheed' => 'Past - 2nd Person Female Singular',
            'madee_haader_female_tasnia' => 'Past - 2nd Person Female Dual',
            'madee_haader_female_jama' => 'Past - 2nd Person Female Plural',
            'madee_mutakallim_oheed' => 'Past - 1st Person Singular',
            'madee_mutakallim_jama' => 'Past - 1st Person Plural',
// Mudaree Conjugations
            'mudaree_gaaib_male_oheed' => 'Present - 3rd Person Male Singular',
            'mudaree_gaaib_male_tasnia' => 'Present - 3rd Person Male Dual',
            'mudaree_gaaib_male_jama' => 'Present - 3rd Person Male Plural',
            'mudaree_gaaib_female_oheed' => 'Present - 3rd Person Female Singular',
            'mudaree_gaaib_female_tasnia' => 'Present - 3rd Person Female Dual',
            'mudaree_gaaib_female_jama' => 'Present - 3rd Person Female Plural',
            'mudaree_haader_male_oheed' => 'Present - 2nd Person Male Singular',
            'mudaree_haader_male_tasnia' => 'Present - 2nd Person Male Dual',
            'mudaree_haader_male_jama' => 'Present - 2nd Person Male Plural',
            'mudaree_haader_female_oheed' => 'Present - 2nd Person Female Singular',
            'mudaree_haader_female_tasnia' => 'Present - 2nd Person Female Dual',
            'mudaree_haader_female_jama' => 'Present - 2nd Person Female Plural',
            'mudaree_mutakallim_oheed' => 'Present - 1st Person Singular',
            'mudaree_mutakallim_jama' => 'Present - 1st Person Plural',
// Amr Conjugations
            'amr_gaaib_male_oheed' => 'Imperative - 3rd Person Male Singular',
            'amr_gaaib_male_tasnia' => 'Imperative - 3rd Person Male Dual',
            'amr_gaaib_male_jama' => 'Imperative - 3rd Person Male Plural',
            'amr_gaaib_female_oheed' => 'Imperative - 3rd Person Female Singular',
            'amr_gaaib_female_tasnia' => 'Imperative - 3rd Person Female Dual',
            'amr_gaaib_female_jama' => 'Imperative - 3rd Person Female Plural',
            'amr_haader_male_oheed' => 'Imperative - 2nd Person Male Singular',
            'amr_haader_male_tasnia' => 'Imperative - 2nd Person Male Dual',
            'amr_haader_male_jama' => 'Imperative - 2nd Person Male Plural',
            'amr_haader_female_oheed' => 'Imperative - 2nd Person Female Singular',
            'amr_haader_female_tasnia' => 'Imperative - 2nd Person Female Dual',
            'amr_haader_female_jama' => 'Imperative - 2nd Person Female Plural',
// Amr Conjugations
            'nahee_gaaib_male_oheed' => 'Negative Imperative - 3rd Person Male Singular',
            'nahee_gaaib_male_tasnia' => 'Negative Imperative - 3rd Person Male Dual',
            'nahee_gaaib_male_jama' => 'Negative Imperative - 3rd Person Male Plural',
            'nahee_gaaib_female_oheed' => 'Negative Imperative - 3rd Person Female Singular',
            'nahee_gaaib_female_tasnia' => 'Negative Imperative - 3rd Person Female Dual',
            'nahee_gaaib_female_jama' => 'Negative Imperative - 3rd Person Female Plural',
            'nahee_haader_male_oheed' => 'Negative Imperative - 2nd Person Male Singular',
            'nahee_haader_male_tasnia' => 'Negative Imperative - 2nd Person Male Dual',
            'nahee_haader_male_jama' => 'Negative Imperative - 2nd Person Male Plural',
            'nahee_haader_female_oheed' => 'Negative Imperative - 2nd Person Female Singular',
            'nahee_haader_female_tasnia' => 'Negative Imperative - 2nd Person Female Dual',
            'nahee_haader_female_jama' => 'Negative Imperative - 2nd Person Female Plural',
// Ismul Fel Conjugations
            'ismul_fel_male_oheed' => 'Active Participle - Male Singular',
            'ismul_fel_male_tasnia' => 'Active Participle - Male Dual',
            'ismul_fel_male_jama' => 'Active Participle - Male Plural',
            'ismul_fel_female_oheed' => 'Active Participle - Female Singular',
            'ismul_fel_female_tasnia' => 'Active Participle - Female Dual',
            'ismul_fel_female_jama' => 'Active Participle - Female Plural',
// Ismul Maful Conjugations
            'ismul_maful_male_oheed' => 'Passive Participle - Male Singular',
            'ismul_maful_male_tasnia' => 'Passive Participle - Male Dual',
            'ismul_maful_male_jama' => 'Passive Participle - Male Plural',
            'ismul_maful_female_oheed' => 'Passive Participle - Female Singular',
            'ismul_maful_female_tasnia' => 'Passive Participle - Female Dual',
            'ismul_maful_female_jama' => 'Passive Participle - Female Plural',
        ];
        return $questionTypes;
    }

    public function generateQuestions()
    {
        // Define the types of questions we want to ask


        // Fetch verbs from the database
        $verbs = $this->data;
//        dd($verbs);

        // Initialize questions array
        $questions = [];

        // Loop through verbs to generate questions
        foreach ($verbs as $verb) {
            $data = $verb->data;

            if ($this->practise == 'details_to_verb'){
                foreach ($this->questionType() as $key => $question) {
                    if (isset($data[$key])) {
                        // Get a random field for the answer that is not the same as the question field
                        $answerField = collect(array_keys($this->questionType()))->reject(function ($field) use ($key) {
                            return $field === $key;
                        })->random();
                        // Retrieve the correct answer from the verb or data array
                        $correctAnswer = $verb->$answerField ?? $data[$answerField] ?? null;

                        // If we have a valid correct answer
                        if ($correctAnswer) {
                            $questions[] = [
                                'question_id' => $verb->id,
                                'question' => "What is the *{$this->questionType()[$answerField]}* of the '{$data[$key]}'?",
                                'correct_answer' => $correctAnswer,  // Answer comes from the randomly chosen answer field
                                'options' => $this->shuffleOptions($correctAnswer, $data),  // Generate options
                            ];
                        }
                    }
                }
            }else{
                foreach ($this->questionType() as $key => $question) {
                    if (isset($data[$key])) {
                        // Get a random field for the answer that is not the same as the question field
                        $answerField = collect(array_keys($this->questionType()))->reject(function ($field) use ($key) {
                            return $field === $key;
                        })->random();
                        // Retrieve the correct answer from the verb or data array
                        $correctAnswer = $this->questionType()[$key] ?? $data[$answerField] ?? null;

                        // If we have a valid correct answer
                        if ($correctAnswer) {
                            $questions[] = [
                                // Include the question field (e.g., with_harakah) and use the correct answer from a different field
                                'question_id' => $verb->id,
                                'question' => "What is '{$data[$key]}'?",
                                'correct_answer' => $correctAnswer,  // Answer comes from the randomly chosen answer field
                                'options' => $this->shuffleOptions($correctAnswer, $data),  // Generate options
                            ];
                        }
                    }
                }
            }




        }

        // Shuffle and limit the number of questions to the value of $totalQuestions
        $this->questions = collect($questions)->shuffle()->take($this->item_per_page)->toArray();
    }

    public function shuffleOptions($correctAnswer, $data)
    {

        // Ensure the correct answer is included
        $options = [$correctAnswer];
        if ($this->practise == 'details_to_verb') {

            // Select random fields from questionTypes to fill other options dynamically
            $randomFields = collect(array_keys($this->questionType()))
                ->reject(function ($field) use ($correctAnswer, $data) {
                    // Reject fields that don't exist in $data or fields where the value is same as correct answer
                    return !isset($data[$field]) || $data[$field] === $correctAnswer;
                })
                ->random(3);

            // Add the corresponding values from $data for the random fields
            foreach ($randomFields as $field) {
                $options[] = $data[$field] ?? 'default option';
            }
        }else{
            $randomFields = collect(array_keys($this->questionType()))
                ->reject(function ($field) use ($correctAnswer, $data) {
                    // Reject fields that don't exist in $data or fields where the value is same as correct answer
                    return !isset($data[$field]) || $this->questionType()[$field] === $correctAnswer;
                })
                ->random(3);

            // Add the corresponding values from $data for the random fields
            foreach ($randomFields as $field) {
                $options[] = $this->questionType()[$field] ?? 'default option';
            }
        }


        shuffle($options);
        return $options;
    }

    public function submit()
    {
        $this->correctAnswersCount = 0;
        $this->wrongAnswersCount = 0;
        $this->quizResults = [];
        if (auth()->check() && $this->isSave){
            $quiz = Quiz::create([
                'user_id' => auth()->id(),
                'title' => 'Quiz ' . now(), // You can set a custom title
                'count' => $this->item_per_page,
                'correct' => 0,  // Correct answers will be updated later
                'wrong' => 0,    // Wrong answers will be updated later
                'skipped' => 0,  // Skipped questions will be updated later
                'is_minus' => $this->is_minus ? 1 : 0,
            ]);
            foreach ($this->questions as $index => $question) {
                $userAnswer = $this->selectedAnswers[$index] ?? null;

                $result = [
                    'question' => $question['question'],
                    'user_answer' => $userAnswer,
                    'correct_answer' => $question['correct_answer'],
                    'status' => 'skipped'
                ];

                if ($userAnswer) {
                    if ($userAnswer === $question['correct_answer']) {
                        $result['status'] = 'correct';
                        $this->correctAnswersCount++;
                    } else {
                        $result['status'] = 'incorrect';
                        $this->wrongAnswersCount++;
                        if ($this->isToWishlist && !$this->isWishlist){
                            auth()->user()->words()->syncWithoutDetaching($question['question_id']);
                        }
                    }
                }
                Question::create([
                    'quiz_id' => $quiz->id,
                    'title' => $question['question'], // Question text
                    'answer' => $question['correct_answer'],
                    'user_answer' => $userAnswer,
                    'status' => $result['status'],
                ]);

                $this->quizResults[] = $result;
            }
            $quiz->update([
                'correct' => $this->correctAnswersCount,
                'wrong' => $this->wrongAnswersCount,
                'skipped' => $this->item_per_page - ($this->correctAnswersCount + $this->wrongAnswersCount),
                'result' => $this->correctAnswersCount - ($this->is_minus ? $this->wrongAnswersCount : 0),
            ]);

        }else {


            foreach ($this->questions as $index => $question) {
                $userAnswer = $this->selectedAnswers[$index] ?? null;

                $result = [
                    'question' => $question['question'],
                    'user_answer' => $userAnswer,
                    'correct_answer' => $question['correct_answer'],
                    'status' => 'skipped'
                ];

                if ($userAnswer) {
                    if ($userAnswer === $question['correct_answer']) {
                        $result['status'] = 'correct';
                        $this->correctAnswersCount++;
                    } else {
                        $result['status'] = 'incorrect';
                        $this->wrongAnswersCount++;
                    }
                }

                $this->quizResults[] = $result;
            }
        }
        $this->skipped = $this->item_per_page - ($this->correctAnswersCount + $this->wrongAnswersCount);;
        $this->negative = $this->is_minus == 1 ? $this->wrongAnswersCount : 0;
        $this->quizCompleted = true;

//        $this->dispatch('timeFinished');
        $this->alert('success', __('Practise successfully finished'));
    }

    public function render()
    {
        return view('livewire.test-component');
    }
}
