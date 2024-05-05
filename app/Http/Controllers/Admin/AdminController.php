<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $user = new User();
        $data['getRecord'] = $user->getAdmin();
        $data['header_title'] = 'Admin';
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Admin';
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $status = 0; // Assuming inactive by default

    // Retrieve the selected status from the request if present
        if ($request->has('status')) {
            $status = $request->input('status') == '1' ? 1 : 0;
        }

        $user->status = $status;
        $user->usertype = 'admin';
        $user->save();

       return redirect('admin/admin/list')->with('success','Admin Successful created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title'] = 'Edit Admin';
        return view('admin.admin.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::getSingle($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if(!empty($request->input('password')))
        {
            $user->password = Hash::make($request->input('password'));
        }
        $status = 0; // Assuming inactive by default

    // Retrieve the selected status from the request if present
        if ($request->has('status')) {
            $status = $request->input('status') == '1' ? 1 : 0;
        }

        $user->status = $status;
        $user->usertype = 'admin';
        $user->save();

        return redirect('admin/admin/list')->with('success','Admin Successful updated');
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_deleted = 1;
        $user->save();
        return redirect()->back()->with('success', 'Admin successfully deleted');
    }

}
