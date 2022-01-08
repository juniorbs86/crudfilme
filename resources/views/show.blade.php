@extends('templates.template')

@section('content')

    <h1 class="text-center">Visualizar</h1> <hr>

    {{-- tabela do bootstrap --}}
    <div class="col-8 m-auto">
    @php 
        $user=$film->find($film->id)->relUsers;
    @endphp
        
  Título: {{$film->title}} <br>
  Series: {{$film->series}} <br>
  Preço: R$ {{$film->price}} <br>
  Diretor: {{$user->name}} <br>
  Email do Autor: {{$user->email}} <br>
    </div>
@endsection
