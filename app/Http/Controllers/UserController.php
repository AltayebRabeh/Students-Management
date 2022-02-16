<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with(['permissions', 'roles'])->withTrashed()->paginate(PAGINATE_NUMBER)->appends($request->except('page'));
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if(!$request->has('status')) {
            $user->delete();
        }

        $user->syncPermissions((array)$request->permissions);

        toastr()->success('تم إضافة المستخدم بنجاح');
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with(['permissions'])->withTrashed()->findOrFail($id);
        $permissions = Permission::get();
        return view('users.edit', compact('user', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::with('permissions')->withTrashed()->findOrFail($id);

        if(!$request->has('status')) {
            $user->delete();
        } else {
            $user->restore();
        }

        $user->syncPermissions((array)$request->permissions);

        toastr()->success('تم تعديل المستخدم بنجاح');
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
        $user = User::whereDoesntHave('students')
                ->whereDoesntHave('teachers')
                ->whereDoesntHave('years')
                ->whereDoesntHave('subjectsTeachers')
                ->whereDoesntHave('subjects')
                ->whereDoesntHave('sections')
                ->whereDoesntHave('marks')
                ->whereDoesntHave('equations')
                ->find($id);

        if($user) {
            $user->forceDelete();
            toastr()->success('تم حذف المستخدم بنجاح');
            return redirect()->route('users.index');
        }

        toastr()->error('عذراً لايمكنك حذف المستخدم، هذا المستخدم لديه عمليات قام بها يمكنك إلغاء تفعيله');
        return redirect()->route('users.index');
    }
}
