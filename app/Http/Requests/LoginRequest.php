<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
  // protected $redirectRoute  = 'user.login';

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
   * if api not working then add remove App\Exceptions\Handler files response ajax option
   * @return array
   */
  public function rules()
  {
    if ($this->isMethod('GET')) {
      return [];
    }

    return [
      'email'         => 'required|email',
      'password'      => 'required|min:2'
    ];
  }
}
