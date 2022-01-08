<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
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
        $routeName = $this->route()->getName();
        switch ($routeName) {
            case 'wallet_store':
                return [
                    'title' => 'required',
                    'status' => 'required',
                ];
            break;
            case 'wallet_update':
                return [
                    'title' => 'required',
                    'status' => 'required',
                ];
            break;
        }

    }
}
