<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan, $profile;

    public function __construct(Plan $plan,  Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    public function profiles ($idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles'));
    }

    public function plans ($idprofile)
    {

        if (!$profile = $this->profile->find($idprofile)){
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', compact('profile', 'plans'));
    }

    public function profilesAvailable(Request $request, $idPerfil)
    {
        if (!$plan = $this->plan->find($idPerfil)){
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', compact('plan', 'profiles','filters'));

    }

    public function attachProfilePlan(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0){
            return redirect()
                    ->back()
                    ->with('info', 'Precisa escolher pelo menos um plano');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id);

    }

    public function detachprofilePlan($idPlan, $idprofile)
    {
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idprofile);

        if (!$plan || !$profile){
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);

        return redirect()->route('plans.profiles', $plan->id);
    }

}
