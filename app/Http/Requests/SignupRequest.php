<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
  // protected $redirectRoute  = 'user.signup';

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
    return [
      'first_name'    => 'required|max:40',
      'last_name'     =>  'required|max:40',
      'email'         => 'required|unique:users,email',
      'password'      => 'required|min:2|required_with:password_confirmation|same:password_confirmation',
      'password_confirmation' => 'required|min:2|same:password|required_with:password'
    ];
  }
}
