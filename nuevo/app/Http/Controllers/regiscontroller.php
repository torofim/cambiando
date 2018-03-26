<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class regiscontroller extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }
    public function index(){
      $registros=\DB::table('users')
      //->where('Id','=','1');
      ->orderby('Id','desc')
      //->take(10)
      ->get();

      return view('registrados')
      ->with('perros',$registros);
    }
    public function graficos(){
      return view('dashboardgraficos');
    }
    public function store(Request $req){

      $validator =Validator::make($req->all(),[
        'nombre'=>'required|max:255',
        'correo'=>'required|email',
        'p1'=>'required|max:255',
        'p2'=>'required|max:255',
        'Imagen'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'Nivel'=>'required'
      ]);
      if($validator->fails()){
        //quiere decir que no estan correctos
        return redirect('/admin/registrados')
          ->withInput()
          ->withErrors($validator);
      }else{
        $nombreImg=time().'.'.$req->Imagen->getClientOriginalExtension();
        $req->Imagen->move(public_path('/img/usuarios'),$nombreImg);
        User::create([
          'name'=>$req->nombre,
          'email'=>$req->correo,
          'password'=>bcrypt($req->p1),
          'imgperfil'=>$nombreImg,
          'privilegios'=>$req->Nivel
        ]);
        return redirect()->to('/admin/registrados')
        ->with('mensaje','usuario agregado');
      }
      dd($req->nombre);
    }
    public function destroy($id){
      $usuario=User::find($id);
      if(file_exists(public_path('/img/usuarios/'.$usuario->imgperfil))){
        unlink(public_path('/img/usuarios/'.$usuario->imgperfil));
      }
      $usuario->delete();
      return redirect('/admin/registrados');
    }//function destroy
    public function edit(Request $req){
      $usuario=User::find($req->id);
      $usuario->name=$req->nameEditar;
      $usuario->email=$req->emailEditar;
      $usuario->privilegios=$req->nivelEditar;
      $usuario->save();

      return redirect()->to('/admin/registrados')
      ->with('mensaje','Usuario Modificado');
    }//edit
}
