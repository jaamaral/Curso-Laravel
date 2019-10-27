<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function setSession(Request $request)
    {
        if ($request->ajax()) {
            $request->session()->put(
                [
                    'role_id' => $request->input('role_id'),
                    'role_nome' => $request->input('role_nome')
                ]
            );
            return response()->json(['mensagem' => 'ok']);
        } else {
            abort(404);
        }
    }
}
