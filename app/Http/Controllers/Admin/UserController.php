<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $reposiroty;

    public function __construct(User $user)
    {
        $this->reposiroty = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = $this->reposiroty->paginate();
        $users = $this->reposiroty::with('tenant')->paginate(5);
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\HttpStoreUpdateUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {
        //$tenant =  auth()->user()->tenant;
        $data = $request->all();

        $data['tenant_id'] =  Auth::user()->tenant_id;
        $data['password'] = bcrypt($data['password']); //encrypt password

        $this->reposiroty->create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$user = $this->reposiroty->find($id)){
            return redirect()->back();
        }
        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$user = $this->reposiroty->find($id)){
            return redirect()->back();
        }
        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateUser  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $id)
    {
        if (!$user = $this->reposiroty->find($id)){
            return redirect()->back();
        }

        $data = $request->only(['name', 'email']);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$user = $this->reposiroty->find($id)){
            return redirect()->back();
        }
        $user->delete();
        return redirect()->route('users.index');
    }

    /**
     * Search results.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request  $request)
    {
        $filters = $request->only('filter');
        $users = $this->reposiroty
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orwhere('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('email', $request->filter);
                                }
                            })
                            ->paginate();
        return view('admin.pages.users.index', compact('users', 'filters'));
    }
}
