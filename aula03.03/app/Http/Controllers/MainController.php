<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index(){
        $id=session('user.id');
        $user=User::find($id)->toArray();
        $notes=User::find($id)->notes()->get()->toArray();
        return view('home',['notes'=>$notes]);
    }
    public function editNote($id){
        $id=Crypt::decrypt($id);
        echo "Editar:".$id;
    }
    public function deleteNote($id){
        $id=Crypt::decrypt($id);
        echo "deletar:".$id;
    }
    public function new(){
        return view('new_note');
    }
    public function newSubmit(Request $request){
        $request->validate(
            [
                'text_title'=>'required|min:3|max:200',
                'text_note'=>'required|min:3|max:3000',
            ],
            [
                'text_title.required'=>"tem que escrever um titulo mermão",
                'text_title.min'=>"o titulo tem que ter :min letras caralho",
                'text_title.max'=>"o titulo não precisa ter o tamanho da sua mâe não",
                'text_note.required'=>"tem que escrever a nota mermão",
                'text_note.min'=>"ta timido é? escreve pelo menos :min letras ai po!",
                'text_note.max'=>"calma lá meu patrão não precisa exagerar",
            ]   
        );
        $id=session('user.id');
        
        $note=new Note();
        $note->user_log=$id;
        $note->titulo_notes=$request->text_title;
        $note->texto_notes=$request->text_note;
        $note->save();
        return redirect()->route('home');
    }
    public function cadastro(){
        return view('cadastro');
    }
    public function cadastroSubmit(Request $request){
        $request->validate(
            [
                'text_name'=>'required|min:3|max:200',
                'text_email'=>'required|min:3|max:200|email|unique:users,email',
                'text_password'=>'required|min:3|max:200',
                'text_password_confirm'=>'required|min:3|max:200|same:text_password',
                'text_cpf'=>'required|min:11|max:11|unique:users,cpf',
            ]
        );
        $user=new User();
        $user->name=$request->text_name;
        $user->email=$request->text_email;
        $user->password=$request->text_password;
        $user->cpf=$request->text_cpf;
        $user->save();
        return redirect()->route('login');  
    }
}
