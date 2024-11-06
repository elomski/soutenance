@extends('layout.base')

@section('content')
    <div class="bord">
        <form action="{{ route('directeur.login.process') }}" method="POST" class="category-form-2">
            <br />
            <h1>Connexion</h1>
            <br /><br />
            @csrf
            @method('POST')

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

            <div class="input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="renseigner l'email ici..." >
            </div>
            <br />

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="renseigner le mot de passe ici..."
                    >


                <button class="button w-100 primary" type="submit">Soumettre</button>


            <div class="butt2">
                <h5>cliquez ici si vous etes un <a href="{{ route('login') }}">Personnel</a></h5>
                <h5>cliquez ici si vous etes un <a href="{{ route('responsable') }}">Responsable</a></h5>
            </div>
            <div>
                <h2>Espace Directeur </h2>
            </div>
        </form>
    </div>
@endsection
