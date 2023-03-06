<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Digital Plus :: Introdução ao Laravel / Lista de Usuários</title>
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    >
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Digital Plus :: Introdução ao Laravel / Lista de Usuários</h2>
                </div>
                <div class="pull-right mb-2">
                    <a
                        class="btn btn-success"
                        href="{{ route('users.create') }}"
                    >
                        Criar Usuário
                    </a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th style="width: 280px">*</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a
                                class="btn btn-primary"
                                href="{{ route('users.edit', $user->id) }}"
                            >
                                Editar
                            </a>
                            <form
                                action="{{ route('users.destroy', $user->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                >
                                    Apagar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
