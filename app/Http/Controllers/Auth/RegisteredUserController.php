<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use App\Models\Tenant;
use App\Providers\RouteServiceProvider;
use App\Tenant\Events\TenantCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{

    protected $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create($url)
    {
        $plan = $this->plan->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        return view('auth.register', [
            'plan' => $plan
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        if (!$plan = $this->plan){
            return redirect()->route('site.home');
        }

        //dd($request->all());
        // $data = $request->all();
        // $tenant = $plan->tenants()->create([
        //     'cnpj' => $request->cnpj,
        //     'name' => $request->empresa,
        //     'url' =>  Str::kebab($request->empresa),
        //     'email' => $request->email,
        //     'plan_id' => $data['plan_id']
        // ]);

        // $user = $tenant->user()->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $ten = new Tenant();
        $ten->name = $request->name;
        $ten->cnpj = $request->cnpj;
        $ten->url = Str::kebab($request->name);
        $ten->email = $request->email;
        $ten->plan_id = $request->plan_id;
        $ten->save();

        $user = $ten->users()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        event(new TenantCreated($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
