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
}