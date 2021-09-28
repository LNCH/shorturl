<?php

namespace App\Http\Requests\Links;

use App\Models\Link;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateRequest extends FormRequest
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
                'required', 'string', 'max:500', 'unique:links',
            ],
            'type' => [
                'required', "in:$types",
            ],
            'unique_key' => [
                'required', 'string', 'unique:links',
            ],
            'destination_url' => [
                'required', 'url',
            ],
            'description' => [
                'nullable', 'string', 'max:65535',
            ],
            'status' => [
                'required', "in:$statuses",
            ],
            'expires_at' => [
                'nullable', 'date',
            ],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->type == Link::TYPE_SIMPLE && empty($this->unique_key)) {
            $uniqueKey = Str::random(5);

            while (Link::where('unique_key', $uniqueKey)->exists()) {
                $uniqueKey = Str::random(5);
            }

            $this->merge(['unique_key' => $uniqueKey]);
        }
    }
}
