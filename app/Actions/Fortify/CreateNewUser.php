<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => $this->passwordRules(),
        //     'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // ])->validate();
        $rules=[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password',
            'age'=>'required',
            'phone'=>'required',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ];
        $messages=[
            'name.required'=>'Please enter your name..',
            'name.string'=>'accept letter only',
            'email.required'=>'Please fill your email..',
            'email.email'=>'accept email format only',
            'password.required'=>'Fill your password',
            'password_confirmation.required'=>'Write your comfrim password',
            'password_confirmation.same'=>'do not match with your password',
            'age.required'=>'Fill your age',
            'phone.required'=>'Fill your phone'
        ];
        Validator::make($input,$rules,$messages)->validate();
        return User::create([
            'name' => $input['name'],
            'email'=>$input['email'],
            'password' => Hash::make($input['password']),
            'age'=>$input['age'],
            'gender'=>$input['gender'],
            'phone'=>$input['phone'],
        ]);
    }
}
