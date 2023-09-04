<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class BirthYearRule implements ValidationRule
{

    private int $minAge = 7;


    public function __construct(Int $minAge)
    {
        $this->minAge = $minAge;
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (now()->parse($value)->age <= $this->minAge) {
            $fail("Siswa harus berumur minimal {$this->minAge} tahun.");
        }
    }
}
