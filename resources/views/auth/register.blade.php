@extends('layouts.public')

@section('content')
    <div class="flex bg-gray-700 w-full min-h-[100vh]" id="container">
        <div class="pt-[10vh] w-[87%] md:w-3/4 mx-auto bg-gray-50 p-5 shadow-md relative">
            <div class="md:w-2/3 w-[80%] mx-auto h-full flex flex-col">
                <form method="POST" action="{{ route('register') }}" class="my-auto h-fit">
                    @csrf
                    <h1 class="mx-auto text-center text-2xl font-semibold mb-5">Registrarse</h1>
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block px-1.5 border border-gray-300 mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block px-1.5 border border-gray-300 mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block px-1.5 border border-gray-300 mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block px-1.5 border border-gray-300 mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="md:flex items-center justify-center md:justify-end mt-4">
                        <div class="w-full flex justify-center md:block md:w-fit order-2">
                            <x-primary-button class="text-center md:text-start md:w-fit md:ms-3 hover:scale-105">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                        <a href="{{ route('login') }}"><p class="order-1 text-cyan-400 pt-4 md:pt-0 text-center md:text-start mt-auto mr-2 hover:text-cyan-300 text-sm">¿Ya tienes una cuenta? Inicia sesión</p></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
