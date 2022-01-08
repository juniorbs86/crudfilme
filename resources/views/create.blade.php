@extends('templates.template')

@section('content')
    {{-- se existir a vari[avel $film estou no edit senão cadastar --}}
    <h1 class="text-center">@if (isset($film)) Editar @else Cadastrar @endif</h1>
    <hr>

    {{-- tabela do bootstrap --}}

    <div class="col-8 m-auto">

        @if (isset($errors) & (count($errors) > 0))
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach ($errors->all() as $erro)
                    {{ $erro }} <br>
                @endforeach
            </div>
        @endif

        @if (isset($film))
            <form name="formEdit" id="formEdit" method="post" action="{{url("films/$film->id") }}">
                @method('put')
            @else
        <form name="formCad" id="formCad" method="post" action="{{url('films')}}">
        @endif
            @csrf
            <input class="form-control" type="text" name="title" id="title" placeholder="titulo:"
                value="{{$film->title ?? ''}}" required> <br>
            <select class="form-control" name="id_user" id="id_user" required> <br>
                <option value="{{$film->relUsers->id ?? ''}}">{{$film->relUsers->name ?? 'Diretor'}}</option>

                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    <br>
                @endforeach
            </select> <br>

            <input class="form-control" type="text" name="series" id="series" placeholder="Series:"
                value="{{$film->series ?? ''}}" required> <br>
            <input class="form-control" type="text" name="price" id="price" placeholder="Preço:"
                value="{{$film->price ?? ''}}" required> <br>
            <input class="btn btn-primary" type="submit" value="@if(isset($film)) Editar @else Cadastrar @endif">
        </form>
    </div>

@endsection
