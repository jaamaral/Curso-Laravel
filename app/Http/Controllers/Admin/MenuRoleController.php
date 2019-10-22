<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class MenuRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id')->pluck('nome', 'id')->toArray();
        $menus = Menu::getMenu();
        $menusRoles = Menu::with('roles')->get()->pluck('roles','id')->toArray();
        //dd($roles . $menus);
        return view('admin.menu-role.index', compact('roles','menus','menusRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        
        if ($request->ajax()) {
            $menus = new Menu();
            if ($request->input('estado') == 1) {
                $menus->find($request->input('menu_id'))->roles()->attach($request->input('role_id'));
                return response()->json(['resposta' => 'A função foi atribuída corretamente']);
            } else {
                $menus->find($request->input('menu_id'))->roles()->detach($request->input('role_id'));
                return response()->json(['resposta' => 'A função foi eliminada corretamente']);
            }
        } else {
            abort(404);
        }
    }
}
