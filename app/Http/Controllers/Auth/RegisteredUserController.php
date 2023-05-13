<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'hobbies' => ['nullable', 'max:255'],
            'looking_for' => ['required', 'max:500'],
            'extra_info' => ['nullable', 'max:700'],
            'contacts_vk' => ['nullable', 'max:255'],
            'contacts_whatsapp' => ['nullable', 'max:255'],
            'contacts_telegram' => ['nullable', 'max:255'],
        ]);

//        for image
            if ($request->image) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $image_path = "/images/".$imageName;
            } else {
                $image_path = "/images/profile.jpeg";
            }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image_path' => $image_path,
            'gender' => $request->gender,
            'hobbies' => $request->hobbies,
            'looking_for' => $request->looking_for,
            'extra_info' => $request->extra_info,
            'contacts_vk' => $request->contacts_vk,
            'contacts_whatsapp' => $request->contacts_whatsapp,
            'contacts_telegram' => $request->contacts_telegram,
        ]);

            event(new Registered($user));
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);

    }
}
