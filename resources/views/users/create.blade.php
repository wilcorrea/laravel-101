<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Digital Plus :: Introdução ao Laravel / Criar Usuário</title>
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    >
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Criar Usuário</h2>
                </div>
                <div class="pull-right">
                    <a
                        class="btn btn-primary"
                        href="{{ route('users.index') }}"
                    >
                        Voltar
                    </a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form
            action="{{ route('users.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Nome do usuário"
                            >
                        </label>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Email do usuário"
                            >
                        </label>
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Senha do usuário"
                            >
                        </label>
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <button
                    type="submit"
                    class="btn btn-primary ml-3"
                >
                    Salvar
                </button>
            </div>
        </form>
    </div>
</body>

</html>
