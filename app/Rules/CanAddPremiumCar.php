<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class CanAddPremiumCar implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $premiumBrands = ['ferrari', 'porsche', 'lamborghini']; // Example premium brands

        // Check if the brand is a premium brand
        if (in_array(strtolower($value), $premiumBrands)) {
            // Count the number of cars the user already owns
            $carCount = Car::where('user_id', Auth::id())->count();

            // If the user has fewer than 3 cars, the validation fails
            if ($carCount < 3) {
                $fail('You must own at least 3 cars before you can add a premium brand like ' . ucfirst($value) . '.');
            }
        }
    }
}
