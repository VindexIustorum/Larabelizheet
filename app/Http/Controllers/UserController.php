<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('user-list');
        $texto = $request->input("texto");
         $registros = User::with('roles')-> where("name",'like','%'.$texto.'%')
         ->orWhere('email','like','%'.$texto.'%')
         ->orderBy('id','desc')
         ->paginate(10);
         return view('usuario.index', compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('user-create');
        
        $roles=Role::all();
        return view('usuario.action', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->authorize('user-create');
        $registro=new User();
        $registro->name=$request->input('name');
        $registro->email=$request->input('email');
        $registro->password=bcrypt($request->input('password'));
        $registro->activo=$request->input('activo');
        $registro->save();

        $registro->assignRole($request->input('role'));
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario '.$registro->name. ' agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->authorize('user-edit');
        $registro = User::findOrFail($id);
        $roles=Role::all(); 

        return view('usuario.action', compact('registro', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->authorize('user-edit');
        $registro=User::findOrFail($id);
        $registro->name=$request->input('name');
        $registro->email=$request->input('email');
        $registro->password=bcrypt($request->input('password'));
        $registro->activo=$request->input('activo');
        $registro->save();
        
        $registro->syncRoles([$request->input('role')]);

        return redirect()->route('usuarios.index')->with('mensaje', 'El Registro de '.$registro->name.' actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('user-delete');
        $registro=User::findOrFail($id);
        $registro->delete();
        return redirect()->route('usuarios.index')->with('mensaje', $registro->name. ' Eliminado Satisfactoriamente.');
    }

    public function toggleStatus(User $usuario){
        $this->authorize('user-activate');
        $usuario->activo =!$usuario->activo;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('mensaje', 'El estado del usuario ha sido actualizado satisfactoriamente');
    }
}
