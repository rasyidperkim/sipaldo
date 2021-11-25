<?php

namespace App\Http\Requests;

use App\Models\Sanitation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySanitationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sanitation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sanitations,id',
        ];
    }
}
