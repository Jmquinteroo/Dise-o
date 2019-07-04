<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use \Spatie\Permission\Traits\HasRoles;

class RegisterController extends Controller
{
    use HasRoles;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
            'telefono' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {



        $User = User::create([
                'name' => $data['name'],
                'apellido' => $data['apellido'],
                'email' => $data['email'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
                'telefono' => $data['telefono'],
                'password' => Hash::make($data['password']),
            ]
        );
        if (Auth::check()){
            if (Auth::user() -> Hasrole('admin')) {
                $User->assignRole('admin');
                return $User;
            }
            else  {
                $User->assignRole('cliente');
                return $User;
            }
        }
        else{
            $User->assignRole('cliente');
            return $User;

        }
    }
    public function register(Request $request)
    {
        if (Auth::check()){
            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));



            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());

        }
        else{
            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

            $this->guard()->login($user);

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        }

    }






}
