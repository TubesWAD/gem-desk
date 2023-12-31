<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query  =  $request->get('query');
        if($request->ajax()){
            $data = User::query()->where('name', 'LIKE', $query . '%')
                ->limit(10)
                ->get();
            $output = '';
            $loop = 0;
            if (count($data) > 0){
                foreach ($data as $row){
                    $output .= '
                                    <tr>
                                        <td>' . $loop+1 . '</td>
                                        <td>' . $row->name . '</td>
                                        <td>' . $row->username . '</td>
                                        <td>' . $row->email . '</td>
                                        <td>' . $row->employee_id . '</td>
                                        <td>' . $row->department_name . '</td>
                                        <td>' . $row->roles . '</td>
                                        <td>' . $row->mobile . '</td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-success me-1" href="' . route('userManagements.show', $row->id) . '">Show</a>';
                                        if (auth()->user()->roles == 'admin') {
                                            $output .= '
                                        <a class="btn btn-primary me-1" href="' . route('userManagements.edit', $row->id) . '">Edit</a>
                                        <form action="' . route('userManagements.destroy', $row->id) . '" method="post">
                                            ' . csrf_field() . '
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger me-1">Delete</button>
                                        </form>';
                                        }
                    $loop+=1;
                }
            }else{
                $output .= '<td colspan="9">
                            <div class="d-flex justify-content-center">
                                No Record Found
                            </div>
                        </td>';
            }
            return $output;
        }


        $users = User::query()->where('name', 'LIKE', '%' . $query . '%')
            ->simplePaginate(8);
        return view('userManagements.index', compact('users'));
    }

    public function create()
    {
        return view('userManagements.create');
    }

    public function store(Request $request)
    {
        $profile_pic = '';
        if ($request->hasFile('profile_picture')){
            $pathFile = $request->file('profile_picture')->store('files', 'public');
            $profile_pic = $pathFile;
        }
        $user = User::create([
            'name' => $request->name,
            'employee_id' => $request->employee_id,
            'department_name' =>$request->department_name,
            'mobile' => $request->mobile,
            'username' => $request->username,
            'roles' => $request->roles,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $profile_pic
        ]);

        event(new Registered($user));


        return redirect(route('userManagements.index'))
            ->with('success', 'User create successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('userManagements.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('userManagements.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->employee_id = $request->input('employee_id');
        $user->department_name = $request->input('department_name');
        $user->mobile = $request->input('mobile');
        $user->username = $request->input('username');
        if (isset($request->roles)) {
            $user->roles = $request->roles;
        } else {
            $user->roles = $user->roles;
        }

        if ($request->hasFile('profile_picture')) {
            $oldFile = $user->profile_picture;
            if ($oldFile && file_exists(storage_path('app/public/') . $oldFile)) {
                unlink(storage_path('app/public/') . $oldFile);
            }

            $pathPicture = $request->file('profile_picture')->store('files', 'public');
            $user->profile_picture = $pathPicture;
        }

        $user->save($request->validated());

        return redirect(route('userManagements.index'))
            ->with('success', 'User updated successfully');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $oldPicture = $user->profile_picture;
        if ($oldPicture && file_exists(storage_path('app/public/') . $oldPicture)) {
            unlink(storage_path('app/public/') . $oldPicture);
        }
        $user->delete();

        return redirect()->route('userManagements.index')
            ->with('success', 'User has been deleted');
    }
}
