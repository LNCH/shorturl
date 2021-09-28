<?php

namespace App\Http\Requests\Links;

use App\Models\Link;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $types = implode(',', array_keys(Link::TYPES));
        $statuses = implode(',', array_keys(Link::STATUSES));

        return [
            'name' => [
                'required', 'string', 'max:500',
                Rule::unique('links')->ignore($this->route('link')->id),
            ],
            'type' => [
                'required', "in:$types",
            ],
            'unique_key' => [
                'required_if:type,'.Link::TYPE_FRIENDLY, 'string',
                Rule::unique('links')->ignore($this->route('link')->id),
            ],
            'destination_url' => [
                'required', 'url',
            ],
            'status' => [
                'required', "in:$statuses",
            ],
            'expires_at' => [
                'nullable', 'date',
            ],
        ];
    }
}
