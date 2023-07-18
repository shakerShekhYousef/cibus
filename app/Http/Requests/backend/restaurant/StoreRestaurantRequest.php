<?php

namespace App\Http\Requests\backend\restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'owner_name' => ['required', 'max:191'],
            'owner_email' => ['required', 'max:191'],
            'restaurant_name' => ['required', 'max:191'],
        ];
    }
}
