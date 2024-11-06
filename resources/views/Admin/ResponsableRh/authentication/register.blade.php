@extends('layout.base')

@section('content')

@include('includes.Administrateur.AdministrateurSideBar.AdministrateurSideBar')

    <div class="wrap-content">

        <form action="{{ route('register.process') }}" method="POST" class="category-form" enctype="multipart/form-data">

            <h1 class="permi-title">Enregistrement personnel</h1><br/><br/>
            <p class="permi-title">Renseigner les informations pour enregistrer le personnel</p><br/><br/>




            {{-- @method('POST') --}}
            @csrf

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




            <label for="name">Nom</label>
            <input type="text" id="name" name="name" placeholder="Ecrivez votre nom"><br /><br />

            <label for="firstname">prenom</label>
            <input type="text" id="firstname" name="firstname" placeholder="Ecrivez votre votre prenom "><br /><br />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Ecrivez votre email"><br /><br />

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Ecrivez votre de passe"><br /><br />


            <label for="function">poste</label>
            <input type="text" id="function" name="function" placeholder="Ecrivez le poste"><br /><br />

            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" placeholder="Ecrivez votre adresse"><br /><br />

            <label for="sex">Sexe</label>
            <input type="text" id="sex" name="sex" placeholder="sexe"><br /><br />

            <label for="phone">Numero de telephone</label>
            <input type="number" id="phone" name="phone" placeholder="Ecrivez votre numero de telephone"><br /><br />

            <label for="image">Image</label>
            <input type="file" id="image" name="image" placeholder="votre photo"><br /><br />

            <button class="button primary w-100 "> Soumettre</button>
        </form>
    </div>

@endsection

<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
</div>
