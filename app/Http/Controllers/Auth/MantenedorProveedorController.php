<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Proveedor;
use Auth;

class MantenedorProveedorController extends Controller
{

    public function __construct()
    {

    }

    public function showRegistrationForm()
    {
        return view('auth.proveedor-register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

       $admin = $this->create($request->all());

        return redirect(route('home'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_proveedor' => 'required|string|max:255',
            'rut_proveedor' => 'required|string|max:255',

        ]);
    }

    protected function create(array $data)
    {
        return Proveedor::create([
            'nombre_proveedor' => $data['nombre_proveedor'],
            'rut_proveedor' => $data['rut_proveedor'],
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
