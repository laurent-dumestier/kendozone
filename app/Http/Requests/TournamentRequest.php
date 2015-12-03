<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TournamentRequest extends Request
{

    public function __construct(\Illuminate\Http\Request $request)
    {
        $request->request->add(['sport' => 1]);

    }
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
            'name' => 'required|min:6',
            'tournamentDate' => 'required|date',
            'limitRegistrationDate' => 'date',
        ];
    }
}
