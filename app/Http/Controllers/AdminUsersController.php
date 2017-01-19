<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\AdminUsersEditRequest;
use App\User;
use App\Role;
use App\Photo;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        //
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }else{
            $input['photo_id'] = 0;
        }
        
       
        User::create($input);
        Session::flash('message', $request['name'] . ' has been created successfully');

        return redirect('/admin/users');
        //return $request;
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
     //   return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $input = $request->all();
        //$input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }else{
            $input['photo_id'] = 0;
        }
        
        //$input['password'] = bcrypt($request->password);

        $user->update($input);
        Session::flash('message', $request['name'] .' has been updated successfully');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::FindOrFail($id);

        // perform the search
        $position = strpos($user->photo->file, 'placeholder');

        if ( $position === false)
            if (unlink(public_path() . $user->photo->file )){
                $user->delete();
                Session::flash('message', 'User has been deleted successfully');
            }
            else{
                Session::flash('error', 'User has not been deleted due to an issue with the photo.');
            }        

        else{
                $user->delete();
                Session::flash('message', 'User has been deleted successfully');
        }
        return redirect('/admin/users');
    }
}
