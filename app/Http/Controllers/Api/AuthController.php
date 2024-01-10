<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('throttle:3,1')->only('login');
	}

	public function register(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => ['required', 'confirmed', Password::defaults()],
		]);

		$user = User::query()->create([
			'name' => $request->post('name'),
			'email' => $request->post('email'),
			'password' => Hash::make($request->post('password')),
		]);

		event(new Registered($user));

		$token = $user->createToken('api-token');

		return UserResource::make($user);
	}

	public function login(LoginRequest $request)
	{
		$request->authenticate();

		return UserResource::make($request->user());
	}

	public function logout(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		auth()->user()->tokens()->delete();

		return response()->json([
			'message' => 'Logged out'
		]);
	}

	public function user(Request $request)
	{
		return UserResource::make($request->user());
	}
}
