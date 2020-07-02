<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class ClientRegisterController extends Controller
{

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
        ]);
    }

    protected function create(array $data)
    {
        return Client::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'street' => $data['street'],
            'city' => $data['city'],
            'zip' => $data['zip'],
            'country' => $data['country'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($client = $this->create($request->all())));

        $this->guard()->login($client);

        return $this->registered($request, $client)
        ?: redirect($this->redirectTo);
    }

    protected function guard()
    {
        return Auth::guard('client');
    }

    protected function registered(Request $request, $client)
    {
        //
    }

}
