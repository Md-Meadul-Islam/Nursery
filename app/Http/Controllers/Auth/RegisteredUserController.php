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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'username' => ['nullable', 'string', 'max:20', 'regex:/^[a-zA-Z0-9]+$/'],
            'email' => ['string', 'lowercase', 'email', 'max:100', 'unique:' . User::class],
            'phone' => ['required', 'string', 'unique:' . User::class],
            'photo' => ['image', 'mimes:jpg,jpeg,png', 'dimensions:max_width=1000,max_height=1000'],
            'states' => ['string', 'max:50'],
            'country' => ['string', 'max:50'],
            'currency' => ['string', 'max:3', 'regex:/^[A-Z]+$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        //show error message
        if ($validator->fails()) {
            $fields = ['name', 'username', 'email', 'phone', 'photo', 'password', 'currency'];
            foreach ($fields as $field) {
                if ($validator->errors()->has($field)) {
                    Session::flash($field . '_error', $validator->errors()->first($field));
                }
            }
            return redirect()->back()->withInput();
        } else {
            //file management
            $imagePath = 'uploads/profile_img/default.png';
            $image = $request->file('photo');
            if (isset($image)) {
                $imageName = time() . '.' . $request->photo->getClientOriginalExtension();
                if (!file_exists('uploads/profile_img')) {
                    mkdir('uploads/profile_img', 077, true);
                }
                $image->move('uploads/profile_img', $imageName);
                $imagePath = 'uploads/profile_img/' . $imageName;
            } else {
                $imagePath = 'uploads/profile_img/default.png';
            }
            //insert into user model
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'photo' => $imagePath,
                'states' => $request->states,
                'country' => $request->country,
                'currency' => $request->currency,
                'type' => $request->type,
                'password' => Hash::make($request->password),
            ]);
            event(new Registered($user));
            Auth::login($user);
            if ($request->type === 'seller' || $request->type === 'buyer') {
                Session::flash('success', 'Congratulations! ' . $request->name . ' have successfully Registered.');
                return redirect()->route('welcome')->withInput();
            } else {
                Session::flash('success', 'Congratulations! ' . $request->name . ' have successfully Registered.');
                return redirect()->route('admin')->withInput();
            }
        }
    }
}