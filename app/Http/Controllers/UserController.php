<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Repositories\UserRepository;
use App\Traits\AppAuthTrait;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use RuntimeException;

class UserController extends Controller
{
    use AppAuthTrait;

    protected $user;

    public function __construct(UserRepository $userRepo)
    {
        $this->user = $userRepo;
    }

    /**
     * Login Page
     *
     * @param LoginRequest $req
     * @return View|Factory|RedirectResponse
     * @throws InvalidArgumentException
     * @throws BadRequestException
     * @throws SuspiciousOperationException
     * @throws RuntimeException
     * @throws BindingResolutionException
     */
    public function login(LoginRequest $req)
    {
        if ($req->isMethod('POST')) {
            $data = Arr::only($req->all(), ['email', 'password']);
            $remember = $req->input('remember_me', '') === 'on';
            $user = $this->user->getByEmail($data['email']);

            if ($user && !$user->is_active) {
                return back()->with('error', 'Account Inactive. Please contact admin.');
            }

            if (Auth::attempt([...$data, 'is_active' => 1], $remember)) {
                $req->session()->regenerate();
                return redirect()->intended('posts');
            }

            return back()->with('error', 'Wrong Email/Password combination.');
        }

        return view('user.login');
    }

    /**
     * Sign page
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function signup()
    {
        return view('user.signup');
    }

    /**
     * Store a user data
     *
     * @param SignupRequest $req
     * @return Redirector|RedirectResponse
     */
    public function store(SignupRequest $req)
    {
        $error = '';
        try {
            $this->user->create($req->all());
            return redirect('user/login')->with('info', 'Sign up successfull!');
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        return back()->with('error', $error ?? 'Something went wrong');
    }

    /**
     * Logout action
     *
     * @param Request $req
     * @return Redirector|RedirectResponse
     * @throws BindingResolutionException
     * @throws RuntimeException
     */
    public function logout(Request $req)
    {
        if (!Auth::check()) {
            return back();
        }

        // check if active
        $user = Auth::user();
        $isActive = $user && $user->is_active;
        $status = !$isActive ? 'error' : 'info';
        $message = !$isActive ? __('auth.inactive_account') : __('auth.logout');

        $this->logoutUser($req);

        return redirect()->route('user.login')->with($status, $message);
    }
}
