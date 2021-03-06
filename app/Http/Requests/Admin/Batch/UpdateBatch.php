<?php namespace App\Http\Requests\Admin\Batch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBatch extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.batch.edit', $this->batch);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'batch_name' => ['sometimes', 'string'],
            'batch_rank_id' => ['sometimes', 'integer'],
            
        ];
    }
}
