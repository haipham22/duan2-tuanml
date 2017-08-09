<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->action) {
            $this->action($request, User::class);
        }
        $users = User::orderBy($request->sortBy  ? $request->sortBy : 'id', $request->sort ? $request->sort : 'asc')
            ->paginate(\Setting::get('paginate'));

        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = [];

        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        User::create($input);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(User $user)
    {
        return view('admin.users.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        if (!empty($request->password)) {
            \Validator::make($request->only('password'), [
                'password' => 'min:8|max:20|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            ])->validate();
            $user->password = bcrypt($request->password);
        }

        $user->update();

        flash(trans('lang.users.updated'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(User $user)
    {
        if (\Auth::id() == $user->id) {
            flash(trans('lang.users.delete.self'))->error();
            return redirect()->back();
        }
        if ($user->delete()) {
            flash(trans('lang.users.deleted'));
        }
        return redirect()->back();
    }
}
