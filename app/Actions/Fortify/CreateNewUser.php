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
     * @param  array  $input
     * @return \App\Models\User
     */ 
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.*)tip\.edu\.ph$/i'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'address'=> ['required', 'string', 'min:10', 'max:50'],
            'teacher_license' => 'mimes:pdf|max:2048'
          // 'student_number'=> ['', '', '','unique:App\Models\User,student_number'], di ko sure prob neto damn. Lagyan sana javascript sa field na 7 digits lang aaccept nung stud num
          // 'teacher_license'=> ['', 'min:12', 'max:12','string','unique:App\Models\User,teacher_license'],  or magic nlng recorded naman e hahaha
        ])->validate(); 

        $user = User::create([
            
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $input['role_id'],
            'address' => $input['address'],
            'year' => $input['year'] ?? null,
            'student_number' => $input['student_number'] ?? null,
        ]);

        if (request()->hasFile('teacher_license')) {
            request()->file('teacher_license')->storeAs('licenses',time().'_'.$user->id.'.pdf','public');
            $user->update(['teacher_license' => '/storage/licenses/'.time().'_'.$user->id.'.pdf']);
        }

        return $user;
    }
}
