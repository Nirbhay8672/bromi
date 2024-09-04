<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Projects;

class ProjectFormRequest extends FormRequest
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
        $rules = [
			'project_name' => 'required',
			'address' => 'required',
			'locality' => 'required',
			'city' => 'required',
			'state' => 'required',
			'pincode' => 'required',
			'rera_number' => 'unique:projects,rera_number,'.$this->id,
			'propery_type' => 'required',
		];

		if($this->id == '' || $this->id == null) {
			$rules['document_category'] = 'required';
			$rules['document_image'] = 'required|file|mimes:jpeg,png|max:2000'; 
			$rules['catlog_file'] = 'required|file|max:500000'; 
		} else {
			$rules['document_image'] = 'file|mimes:jpeg,png|max:2000'; 
			$rules['catlog_file'] = 'file|max:500000';
			
			$data = Projects::find((int) $this->id);
			
			if($data->is_indirectly_store == 1) {
		    	$rules['document_category'] = 'required';
    			$rules['document_image'] = 'required|file|mimes:jpeg,png|max:2000'; 
    			$rules['catlog_file'] = 'required|file|max:500000';
			}
		}
		
		if($this->document_image) {
			$rules['document_category'] = 'required';
		}

        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
