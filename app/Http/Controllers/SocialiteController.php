<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function loginSocial(Request $request, string $provider): RedirectResponse
    {
        $this->validateProvider($request);

        return Socialite::driver($provider)->redirect();
    }

    public function callbackSocial(Request $request, string $provider)
    {
        $this->validateProvider($request);

        $response = Socialite::driver($provider)->user();
        if (!is_null(request()->route())) {
            $pageName = request()->route()->getName();
            $routePrefix = explode('.', $pageName)[0] ?? '';
        }
        if($routePrefix == "dashboard"){
            $user = Admin::firstOrCreate(
                ['email' => $response->getEmail()],
                ['password' => Str::password(), 'name' => $response->getName() ?? $response->getNickname()]
            );
        }else{
            $user = User::firstOrCreate(
                ['email' => $response->getEmail()],
                ['password' => Str::password(), 'name' => $response->getName() ?? $response->getNickname()]

            );
        }
        $data = [$provider . '_id' => $response->getId()];

        if ($user->wasRecentlyCreated) {
            $data['name'] = $response->getName() ?? $response->getNickname();
        }

        $user->update($data);
        if($routePrefix == "dashboard") {
            Auth::guard('admin')->login($user, remember: true);
            return redirect()->intended(RouteServiceProvider::DashboardHome);
        }else{
            Auth::login($user, remember: true);
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    protected function validateProvider(Request $request): array
    {
        return $this->getValidationFactory()->make(
            $request->route()->parameters(),
            ['provider' => 'in:facebook,google,github']
        )->validate();
    }
}
