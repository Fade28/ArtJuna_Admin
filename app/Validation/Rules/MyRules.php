<?php

namespace App\Validation\Rules;

use CodeIgniter\I18n\Time;
use CodeIgniter\Validation\Rules\Rule;

class MyRules
{
    public function even($value, string $field): bool
    {


        if (empty($field)) {
            return true; // Skip validation if the other date is not set
        }

        $dateToCompare = Time::createFromFormat('Y-m-d', $field);
        $inputDate = Time::createFromFormat('Y-m-d', $value);

        return $inputDate >= $dateToCompare;
    }

    public function setParameters(array $parameters): Rule
    {
        // Memastikan bahwa kita menerima parameter berupa nama field
        return $this->setParameter('field', $parameters[0] ?? '');
    }
}