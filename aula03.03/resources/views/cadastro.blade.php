@extends('layout.padrao')
@section('conteudo')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-10"> <div class="card p-5">
                
                <div class="text-center p-3">
                    <img src="assets/images/logo.png" alt="Notes logo">
                    <h4 class="text-secondary mt-3">Cadastro de Usuário</h4>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('cadastroSubmit') }}" method="post">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control bg-dark text-info" name="name" id="name" value="{{ old('name') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" class="form-control bg-dark text-info" name="cpf" id="cpf" value="{{ old('cpf') }}" maxlength="11">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="user_log" class="form-label">Usuário (Login)</label>
                                    <input type="text" class="form-control bg-dark text-info" name="user_log" id="user_log" value="{{ old('user_log') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="pw_log" class="form-label">Senha</label>
                                    <input type="password" class="form-control bg-dark text-info" name="pw_log" id="pw_log">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input type="text" class="form-control bg-dark text-info" name="cep" id="cep" value="{{ old('cep') }}" maxlength="8">
                                </div>

                                <div class="col-md-9 mb-3">
                                    <label for="Rua" class="form-label">Rua</label>
                                    <input type="text" class="form-control bg-dark text-info" name="Rua" id="Rua" value="{{ old('Rua') }}">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="text" class="form-control bg-dark text-info" name="numero" id="numero" value="{{ old('numero') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="complemento" class="form-label">Complemento</label>
                                    <input type="text" class="form-control bg-dark text-info" name="complemento" id="complemento" value="{{ old('complemento') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control bg-dark text-info" name="bairro" id="bairro" value="{{ old('bairro') }}">
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control bg-dark text-info" name="cidade" id="cidade" value="{{ old('cidade') }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control bg-dark text-info" name="estado" id="estado" value="{{ old('estado') }}" maxlength="2" placeholder="UF">
                                </div>
                            </div>

                            <div class="mb-3 mt-4">
                                <button type="submit" class="btn btn-secondary w-100">CADASTRAR</button>
                            </div>
                            
                            <div class="mb-3">
                                <button type="button" class="btn btn-outline-secondary w-100" onclick="window.location.href='login'">VOLTAR PARA LOGIN</button>
                            </div>

                        </form>

                        @if($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="text-center text-secondary mt-3">
                    <small>&copy; <?= date('Y') ?> Notes</small>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection