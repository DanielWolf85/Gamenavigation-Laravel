<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'name' => 'required|min:3|max:200',
            'cover'=> 'file|image|max:5000',
            'info' => 'max:10000',
            'creator' => 'min:3|max:50',
            'label' => 'min:3|max:50',
            'platforms' => 'min:3|max:100',
            'realise' => 'min:3|max:60',
            'genre' => 'min:3|max:60',
            'model' => 'min:3|max:100',
            'age_limit' => 'min:1|max:10',
            'processor_min' => 'min:3|max:200',
            'processor_max' => 'min:3|max:200',
            'ram_min' => 'min:3|max:200',
            'ram_max' => 'min:3|max:200',
            'video_card_min' => 'min:3|max:200',
            'video_card_max' => 'min:3|max:200',
            'hdd_space_min' => 'min:3|max:200',
            'hdd_space_max' => 'min:3|max:200',
            'os_min' => 'min:3|max:200',
            'os_max' => 'min:3|max:200',
            'facts' => 'min:3|max:10000',
        ];
    }
}
