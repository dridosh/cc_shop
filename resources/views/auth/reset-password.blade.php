@extends('layout.auth')
@section('title','Восстановление пароля')

@section('content')
    <x-forms.auth-forms title="Восстановление пароля" action="" method="POST">
        @csrf

        <x-forms.text-input
                name="email"
                type="email"
                placeholder="E-mail"
                required="true"
                value="{{ old('email') }}"
                :isError="$errors->has('email')"
        >
        </x-forms.text-input>


        <x-forms.text-input
                name="password"
                type="password"
                placeholder="Пароль"
                required="true"
                :isError="$errors->has('password')"
        >
        </x-forms.text-input>


        @error('password')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.text-input
                name="password_confirmation"
                type="password"
                placeholder="Повторите пароль"
                required="true"
                :isError="$errors->has('password_confirmation')"
        >
        </x-forms.text-input>

        @error('password_confirmation')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.primary-button>
            Установить пароль
        </x-forms.primary-button>

        <x-slot:socialAuth>
        </x-slot:socialAuth>

        <x-slot:buttons>
        </x-slot:buttons>

    </x-forms.auth-forms>
@endsection