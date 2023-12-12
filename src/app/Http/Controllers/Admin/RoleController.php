<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\RoleServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    private $role;
    public function __construct(RoleServiceInterface $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        if(Gate::allows('role_index')) {
            $role=$this->role->getRoleListWithSearch();
            return view('Admin.role.role-info',compact('role'));
        }
        else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }
    public function create()
    {
        if(Gate::allows('role_create')) {
            $permissionCategory=$this->role->getPermissionCategory();
            return view('Admin.role.role-create',compact('permissionCategory'));
        }
        else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_fa' => 'required|unique:roles',
            'name_en' => 'required|unique:roles',
            'permission_id' => 'required'
        ]);
        $this->role->create($validatedData);
        Log::createLog(' نقش'.$request->name_fa.' افزوده شد');
        return redirect(url('admin/role'))->with('success','نقش با موفقیت افزوده شد');
    }

    public function edit(Role $role)
    {
        if(Gate::allows('role_edit')) {
            $permissionCategory=$this->role->getPermissionCategory();
            return view('Admin.role.role-edit',compact('role','permissionCategory'));
        }
        else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }

    public function update(Request $request,Role $role)
    {
        $validatedData = $request->validate([
            'name_fa' => 'required|unique:roles,name_fa,' . $role->id,
            'name_en' => 'required|unique:roles,name_en,' . $role->id,
            'permission_id' => 'required'
        ]);
        $this->role->update($role->id,$validatedData);
        Log::createLog(' نقش'.$request->name_fa.' ویرایش شد');
        return redirect(url('admin/role'))->with('success','نقش با موفقیت ویرایش شد');
    }

    public function destroy(Role $role)
    {
        if(Gate::allows('role_delete')) {
            $this->role->delete($role->id);
            Log::createLog(' نقش'.$role->name_fa.' حذف شد');
            return redirect(url('admin/role'))->with('success','نقش با موفقیت حذف شد');
        }
        else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }
}
