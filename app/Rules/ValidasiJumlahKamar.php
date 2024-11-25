<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Kamar;

class ValidasiJumlahKamar implements ValidationRule
{
    public $kamarId;

    public function __construct($kamarId){
        $this->$kamarId = $kamarId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $jumlahKamar = Kamar::find($this->kamarId);
       
            $fail("Jumlah kamar hannya tersedia ". $this->kamarId);
      
    }
}
