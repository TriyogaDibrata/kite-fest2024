<?php

namespace App\Rules;

use App\Models\Category;
use App\Models\Participant;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ParticipantNoRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function __construct(int $category_id) {
        $this->category_id = $category_id;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $category = Category::find($this->category_id);
        $isTaken = Participant::where('category_id', $this->category_id)->where('chest_no', $category->acronym .'-'. $value)->first();

        if($isTaken) {
            $fail('The nomor peserta has taken !');
        }
    }
}
