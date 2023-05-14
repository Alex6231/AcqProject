@extends('template')

@section('page-title')
    <title>Главная</title>
@endsection

@section('content')
        <div class="users_container">
            @foreach($users as $user)
                <div>
                    <h1>{{$user->name}}</h1>
                    <img src="{{$user->image_path}}" alt="avatar">
                </div>
            @endforeach
        </div>
@endsection
