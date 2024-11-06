@extends('layout.base')

@section('content')
    <div class="bord">
        <div>
            <img src="{{ URL::assets('')}}" alt="">
        </div>
        <form action="{{ route('login.process') }}" method="POST" {{-- class="login-form" --}} class="category-form-2">
            <br />
            <h1>Connetez-vous</h1>
            <br /><br />
            @csrf
            @method('POST')
{{--
            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif --}}

            @if ($errors->any())
                <h4>{{ $errors->first() }}</h4>
            @endif

            @if ($message = Session::get('success'))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            @if ($message = Session::get('error'))
                <ul class="alert alert-danger">
                    <li>{{ $message }}</li>
                </ul>
            @endif


            <label for="email" class="">Email</label>
            <input type="email" name="email" id="email" placeholder="renseigner l'email ici...">

            <br />

            <label for="password" class="">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="renseigner le mot de passe ici...">


            <br />


            <button class="button w-100 primary" type="submit">Connexion</button>



        </form>
    </div>
@endsection
