<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Categorias;
use Auth;

class MantenedorCategoriasController extends Controller
{

    public function __construct()
    {

    }

    public function showListarCategorias()
    {
        $categorias = Categorias::all();

        return view('categoria.categorias-listar')->with([
            'categorias' => $categorias,
        ]);
    }
    public function showRegistrationForm()
    {
        return view('auth.categorias-register');
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

       $admin = $this->create($request->all());

        return redirect(route('admin.mantenedorCategorias'));
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
            'nombre_categoria' => 'required|string|max:255',
        ]);
    }

    protected function create(array $data)
    {
        return Categorias::create([
            'nombre_categoria' => $data['nombre_categoria'],
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function eliminarCategorias($id)
    {
        $categorias = Categorias::find($id);
        $categorias->delete();
        return view('eliminado-satisf');
    }
    public function editarCategorias($id)
    {
        $categorias= Categorias::find($id);
        return view('categoria.categorias-editar')->with([
            'categorias' => $categorias,
        ]);
    }

    public function submitEditarCategorias(Request $request, $id)
    {
        $categorias= Categorias::find($id);
        $categorias->nombre_categoria=$request->nombre_categoria;
        $categorias->save();

        return redirect('home');
    }

}
