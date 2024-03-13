<?php

namespace Xlited\Lamx\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class HtmxRequest extends FormRequest
{
    public string $component;

    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->headers->get('HX-Request')) {
            if (isset($this->component)) {
                $content = app()->make($this->component, ['errors' => $validator->errors()]);

                $response = response($content);

                throw new ValidationException($validator, $response);
            } else {
                // Set HTMX response headers to show error message in the modal
            }
        }

        parent::failedValidation($validator);
    }
}
