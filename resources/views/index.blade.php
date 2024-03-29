@extends('templates.template')

@section('content')

    <h1 class="text-center">Filmes</h1>
    <hr>
    {{-- url do crud create --}}
    <div class="text-center mt-3 mb-4">
        <a href="{{ url('films/create') }}">
            <button class="btn btn-success">Cadastrar</button>
        </a>

    </div>

    {{-- tabela do bootstrap --}}
    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center table-dark">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Diretor</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($film as $films)

                    @php
                        $user = $films->find($films->id)->relUsers;
                    @endphp
                    <tr>
                        <th scope="row">{{ $films->id }}</th>
                        <td>{{ $films->title }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $films->price }}</td>
                        <td>
                            {{-- url do crud show --}}
                            <a href="{{ url("films/$films->id") }}">
                                <button class="btn btn-warning">Visualizar</button>
                            </a>
                            {{-- url do crud edit --}}
                            <a href="{{ url("films/$films->id/edit") }}">
                                <button class="btn btn-primary">Editar</button>
                            </a>

                            <a href="{{ url("films/$films->id") }}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>

                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>
        {{-- paginando com bootstrap --}}
        {{ $film->links('pagination::bootstrap-4') }}
    </div>
@endsection
