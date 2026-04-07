<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login'); // faltava ;
    }

    public function loginSubmit(Request $request)
    {
        // Validação
        $request->validate(
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            [
                'text_username.required' => 'O campo username é obrigatório',
                'text_username.email' => 'O campo username deve ser um email',
                'text_password.required' => 'O campo senha é obrigatório',
                'text_password.min' => 'A senha deve ter no mínimo 6 caracteres',
                'text_password.max' => 'A senha deve ter no máximo 16 caracteres'
            ]
        );

        // Dados do form (CORRIGIDO)
        $user = $request->input('text_username');
        $pw   = $request->input('text_password'); // <-- aqui estava errado

        // Busca usuário
        $u = User::where('user_log', $user)
            ->whereNull('deleted_at')
            ->first();

        if (!$u) {
            return redirect()->back()
                ->withInput()
                ->with('loginError', 'Usuário incorreto');
        }

        // Verificação de senha (Laravel)
        if (!Hash::check($pw, $u->pw_log)) {
            return redirect()->back()
                ->withInput()
                ->with('loginError', 'Senha incorreta');
        }

        // Atualiza último login
        $u->ultimo_log = now();
        $u->save();

        // Sessão
        session([
            'user' => [
                'id' => $u->id,
                'username' => $u->user_log
            ]
        ]);

        return redirect()->to('/');
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
                'text_Nome_da_Rua'=>'required|min:3|max:200|email|unique:users,user_log',   
                'text_Numero'=>'required|min:1|max:10',
                'text_Bairro'=>'required|min:3|max:200',
                'text_Cidade'=>'required|min:3|max:200',
                'text_Estado'=>'required|min:2|max:2',
                'text_CEP'=>'required|min:8|max:8',
            ]
        );
        $user=new User();
        $user->name=$request->text_name;
        $user->email=$request->text_email;
        $user->password=$request->text_password;
        $user->cpf=$request->text_cpf;
        $user->Rua=$request->text_Nome_da_Rua;        
        $user->numero=$request->text_Numero;
        $user->bairro=$request->text_Bairro;
        $user->cidade=$request->text_Cidade;
        $user->estado=$request->text_Estado;
        $user->cep=$request->text_CEP;

        $user->save();
        return redirect()->route('login');  
    }
}