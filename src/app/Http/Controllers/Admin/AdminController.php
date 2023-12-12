<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\AdminServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    private $admin;

    public function __construct(AdminServiceInterface $admin)
    {
        $this->admin = $admin;
    }

    public function index()
    {
        if (Gate::allows('admin_index'))
        {
            $admins = $this->admin->getAdminListWithSearch();
            return view('Admin.admin.admin-info', compact('admins'));
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function edit(Admin $admin)
    {
        if (Gate::allows('admin_edit')) {
            $role = $this->admin->getRoles();
            return view('Admin.admin.admin-edit', compact('admin','role'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }

    public function update(Request $request, Admin $admin)
    {
        if ($admin->id == 1){
            return redirect()->back()->with('fail','نمیتوانید مشخصات کاربر ادمین را تغییر دهید.');
        }
        $validatedData = $request->validate([
            'mobile' => 'required|numeric|unique:admins,mobile,' . $admin->id,
            'full_name' => 'required',
            'role_id' => 'required',
            'password' => 'nullable',
            'active' => 'required'
        ]);

        $this->admin->update($admin->id,$validatedData);

        Log::createLog( 'ادمین ' . $admin->full_name . ' ویرایش شد');
        return redirect(url('/admin/admins'))->with('success', 'ادمین با موفقیت ویرایش شد');
    }


    public function create()
    {
        if (Gate::allows('admin_create')) {
            $role = $this->admin->getRoles();
            return view('Admin.admin.admin-create', compact('role'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mobile' => 'required|numeric|unique:admins',
            'full_name' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'active' => 'sometimes'
        ]);

        $this->admin->create($validatedData);
        Log::createLog( 'ادمین ' . $request->full_name . ' فزوده شد');
        return redirect(url('/admin/admins'))->with('success', 'ادمین با موفقیت افزوده شد');
    }


    public function destroy(Admin $admin)
    {
        if ($admin->id == 1){
            return redirect()->back()->with('fail','نمیتوانید مشخصات کاربر ادمین را تغییر دهید.');
        }
        if (Gate::allows('admin_delete')) {
            $this->admin->delete($admin->id);
            Log::createLog( 'ادمین ' . $admin->full_name . ' حذف شد');
            return redirect(url('/admin/admins'))->with('success', 'ادمین با موفقیت حذف شد');
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }

}
