@extends('template')

@section('page-title')
    <title>Регистрация</title>
@endsection

@section('content')
            <div class="auth_shell-1">
                <div class="auth_shell-2">
                    <form action="/register" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="auth_section">
                        <h2>Данные аккаунта:</h2>
                        <div class="auth_form">
                            <div class="auth_form_item">
                                <label for="email">Email:</label>
                                <input id="email" type="email" name="email">
                            </div>
                            <div class="auth_form_item">
                                <label for="password">Пароль:</label>
                                <input id="password" type="password" name="password">
                            </div>
                            <div class="auth_form_item">
                                <label for="password_confirmation">Подтверждение пароля:</label>
                                <input id="password_confirmation" type="password" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                        <div class="auth_section">
                            <h2>Расскажите о себе:</h2>
                            <div class="auth_double_container">
                                <div class="auth_form">
                                    <div class="auth_form_item">
                                        <label for="name">Имя:</label>
                                        <input id="name" type="text" name="name">
                                    </div>
                                    <div class="auth_form_item">
                                        <label for="gender">Пол:</label>
                                        <input id="gender" name="gender">
                                    </div>
                                    <div class="auth_form_item">
                                        <label for="hobbies">Хобби:</label>
                                        <input id="hobbies" type="text" name="hobbies" placeholder="Ваши увлечения">
                                    </div>
                                    <div class="auth_form_item">
                                        <label for="looking_for">Ищу:</label>
                                        <textarea id="looking_for" name="looking_for" placeholder="Кого вы хотели бы видеть рядом"></textarea>
                                    </div>
                                 <div class="auth_form_item">
                                        <label for="extra_info">Дополнительная информация:</label>
                                        <textarea id="extra_info" name="extra_info"></textarea>
                                 </div>
                                    <h3>Контактные данные:</h3>
                                    <div class="auth_form_item contacts">
                                        <label for="contacts_vk">
                                            <i class="fa fa-vk"></i>
                                        </label>
                                        <input id="contacts_vk" name="contacts_vk" placeholder="Ссылка на вашу страницу"/>
                                    </div>
                                    <div class="auth_form_item contacts">
                                        <label for="contacts_whatsapp">
                                            <i class="fa fa-whatsapp"></i>
                                        </label>
                                        <input id="contacts_whatsapp" name="contacts_whatsapp" placeholder="Ваш номер телефона"/>
                                    </div>
                                    <div class="auth_form_item contacts">
                                        <label for="contacts_telegram">
                                            <i class="fa fa-telegram"></i>
                                        </label>
                                        <input id="contacts_telegram" name="contacts_telegram" placeholder="Ваш юзернейм"/>
                                    </div>
                                </div>
                                <div class="auth_double_container_inner">
                                    <div  class="avatar_loader">
                                        <img src="" alt="profile_image" id="imageShowField">
                                        <label for="imageInput">Загрузить аватар</label>
                                        <input type="file" name="image" id="imageInput">
                                    </div>
                                    <div class="complete_auth_container">
                                        <input class="auth_button" type="submit" value="Зарегистрироваться" >
                                        <p>Уже есть аккаунт? <a href="/login">Войти</a></p>
                                        @if($message = Session::get('error'))
                                            <p class="error_text">{{$message}}</p>
                                        @endif
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <p class="error_text">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
