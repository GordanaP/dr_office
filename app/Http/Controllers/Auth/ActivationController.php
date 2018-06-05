<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\ActivationToken;
use App\Events\Auth\EmailVerified;
use App\Events\Auth\TokenRequested;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Requests\Auth\ActivationTokenRequest;

class ActivationController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('token.valid')->only('show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.tokens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Auth\ActivationTokenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivationTokenRequest $request)
    {
        $user = User::findBy($request->email);

        ActivationToken::generateNewFor($user);

        event(new TokenRequested($user));

        return $this->resent();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActivationToken  $activationToken
     * @return \Illuminate\Http\Response
     */
    public function show(ActivationToken $activationToken)
    {
        $activationToken->user->verifyEmail();

        event(new EmailVerified($activationToken->user));

        return $this->verified();
    }

    /**
     * Get the response for a successfull email verification.
     *
     * @return mixed
     */
    protected function verified()
    {
        $response = message('Your account is now active. Please sign in to access the site content.');

        return redirect($this->redirectPath())->with($response);
    }

    /**
     * Get the response for a successfull activation account link.
     *
     * @return mixed
     */
    protected function resent()
    {
        $response = message('Please check your email for the activation link.');

        return back()->with($response);
    }
}
