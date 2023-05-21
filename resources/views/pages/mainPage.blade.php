@extends('template')

@section('page-title')
    <title>Главная</title>
@endsection

@section('scripts')
    <script src="/js/like.js"></script>
@endsection

@section('content')
        <div class="users_container">
            @foreach($users as $user)
                @if($user->id != Auth::user()->id)
                    <div class="users_block">
                        <div class="users_block_menu">
                            <i class="fa fa-info users_block_menu_icon" id="infoButton"></i>
                            <i class="fa fa-heart users_block_menu_icon" id="likeButton" onclick="{{ProfileController::class->like($user->id)}}"></i>
                        </div>
                        <div class="users_block_inner">
                            <div class="users_block_inner-left">
                                <h2>{{$user->name}}</h2>
                                <ul class="users_block_inner-left_info">
                                    <li>
                                        <p><b>Возраст:</b> {{$user->age}}</p>
                                    </li>
                                    <li>
                                        <p><b>Хобби:</b> {{$user->hobbies}}</p>
                                    </li>
                                    <li>
                                        <p><b>Ищу:</b> {{$user->looking_for}}</p>
                                    </li>
                                    <li>
                                        <p><b>Дополнительно о себе:</b> {{$user->extra_info}}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="users_block_inner-right">
                                <div class="profile_image_box">
                                    <img src="{{$user->image_path}}" alt="profile_image">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
@endsection
