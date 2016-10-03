<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Symfony\Component\HttpFoundation\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
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

    use RegistersUsers {
        register as parentRegister;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $checkPass = false)
    {

        if ($checkPass) {
            $rules = [
                'password' => 'required|min:6|confirmed'
            ];
        } else {
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users'
            ];
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $verification_token = str_random(30);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt(str_random(30)),
            'verification_token' => $verification_token
        ]);

        Mail::send('user.verify_mail', ['user' => $user], function($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Verify your email address');
        });

        return $user;
    }

    /**
     * Verify user email by checking if token exists.
     *
     * @param  string  $token
     * @return Response
     */
    public function verify(Request $request, $token)
    {
        $user = $this->retrieveUserFromToken($token);

        if (!$user) {
            return redirect('/login');
        }

        return view('user.verify', compact('user'));
    }

    /**
     * Create password for registered user.
     *
     * @param  string  $token
     * @return Response
     */
    public function createPassword(Request $request, $token)
    {
        $user = $this->retrieveUserFromToken($token);
        if (!$user) {
            return redirect('/login');
        }

        $this->validator($request->all(), true)->validate();

        $user->password = bcrypt($request->password);
        $user->verified = true;
        $user->verification_token = null;
        $user->save();

        return view('user.verified', compact('user'));
    }

    /**
     * Retrieve user data from database by querying verification token.
     *
     * @param  string  $token
     * @return User
     */
    protected function retrieveUserFromToken($token)
    {
        return User::where('verification_token', '=', $token)->first();
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $request->session()->flash('alert-info', 'You have successfully registered. You should verify your email address. Please check your email client and click activation link in the email.');

        return redirect($this->redirectPath());
    }
}
