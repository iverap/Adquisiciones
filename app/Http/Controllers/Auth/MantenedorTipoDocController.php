<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\TipoDocumento;
use Auth;

class MantenedorTipoDocController extends Controller
{

    public function __construct()
    {

    }

    public function showListarTipoDocumento()
    {
        $tipos = TipoDocumento::all();

        return view('tipodoc.tipodoc-listar')->with([
            'tipos' => $tipos,
        ]);
    }
    public function showRegistrationForm()
    {
        return view('auth.tipodoc-register');
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

       $admin = $this->create($request->all());

        return redirect(route('admin.mantenedorTipoDoc'));
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
            'nombre_tipodoc' => 'required|string|max:255',

        ]);
    }

    protected function create(array $data)
    {
        return TipoDocumento::create([
            'nombre_tipodoc' => $data['nombre_tipodoc'],
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function eliminarTipoDoc($id_tipodoc)
    {
        $tipos = TipoDocumento::find($id_tipodoc);
        $tipos->delete();
        return view('home');
    }
    public function editarTipoDoc($id_tipodoc)
    {
        $tipos= TipoDocumento::find($id_tipodoc);
        return view('tipodoc.tipodoc-editar')->with([
            'tipos' => $tipos,
        ]);
    }

    public function submitEditarTipoDoc(Request $request, $id_tipodoc)
    {
        $tipos= TipoDocumento::find($id_tipodoc);
        $tipos->nombre_tipodoc=$request->nombre_tipodoc;
        $tipos->save();

        return redirect('home');
    }

}
