<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;

class IncidentStoreRequest extends FormRequest
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
            'user_id' => 'required',
            'employee_id' => 'required',
            'type' => 'required',
            'wps' => 'required',
            // 'hosp' => 'required|max:255',
            'sel_involved' => 'required',
            'location' => 'required',
            'severity' => 'required',
            'description' => 'required',
            'action' => 'required',
            'date' => 'required',
            'docs' => 'mimes:zip,doc,docx,pdf|max:2048',
        ];
    }

    /**
         * Get the validator instance for the request.
         *
         * @return Validator
         * @throws BindingResolutionException
         */
        public function getValidatorInstance()
        {
            if ($this->validator) {
                return $this->validator;
            }

            $factory = $this->container->make(ValidationFactory::class);

            if (method_exists($this, 'validator')) {
                $validator = $this->container->call([$this, 'validator'], compact('factory'));
            } else {
                $validator = $this->createDefaultValidator($factory);
            }

            if (method_exists($this, 'withValidator')) {
                $this->withValidator($validator);
            }

            $this->setValidator($validator);

            return $this->validator;
        }

}
