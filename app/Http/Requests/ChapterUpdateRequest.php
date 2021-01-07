<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterUpdateRequest extends FormRequest
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
            'title' => 'required|min:1|max:60',
            'game_id' => 'required',
            'image_1' => 'file|image|max:5000',
            'content_1' => 'required|min:3|max:20000',
            'image_2' => 'file|image|max:5000',
            'content_2' => 'max:20000',
            'image_3' => 'file|image|max:5000',
            'content_3' => 'max:20000',
            'image_4' => 'file|image|max:5000',
            'content_4' => 'max:20000'
        ];
    }
}
