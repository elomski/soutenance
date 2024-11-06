@extends('layout.base')

@section('content')
    @include('includes.Personnels.Sidebar.PersonnelSideBar')
    <div class="wrap-content">
        @include('includes.Personnels.Appbar.PersonnelAppBar')
        <form action="{{ route('permission.store') }}" method="POST" class="category-form">
            <h1 class="permi-title">Demande de permission</h1><br />
            <p class="permi-title">Remplir les informations pour demander une permission</p>
            <br /><br />

            @csrf
            @method('POST')

            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif

            @if ($message = Session::get('error'))
                <ul class="alert alert-danger">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            @if ($message = Session::get('success'))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif


            <label for="type_permission">Type de permission</label><br />
            <select name="type_permission_id" id="type_permission" required>
                @forelse($type_permissions as $type_permission)
                    <option value="{{ $type_permission->id }}">{{ $type_permission->name }}</option>
                @empty
                    <option value="">Pas de type_permission !</option>
                @endforelse
            </select><br /><br />

            {{-- <label for="statut_permision">statut de permission</label><br /> --}}
            <select hidden name="statut_permision_id" id="statut_permision">
                @forelse ($statut_permisions as $statut_permision)
                    <option value="{{ $statut_permision->id }}">{{ $statut_permision->name }}</option>
                @empty
                    <option value="">Pas de statut</option>
                @endforelse
            </select><br /><br />

            {{-- <input type="hidden" name="statut_permision_id" id="statut_permision" value="{{$statut_permision_id}}"> --}}


            <label for="description">Description</label><br />
            <textarea name="description" id="description" cols="30" rows="10" placeholder="la description"></textarea><br /><br />

            {{-- <label for="date_demande">Date de demande</label><br/>
        <input type="datetime-local"  name="date_demande" id="date_demande" placeholder="la date de demande"><br/><br/> --}}

            <label for="date_debut">Date de Debut</label><br />
            <input type="datetime-local" name="date_debut" id="date_debut" placeholder="la date de debut"><br /><br />

            <label for="date_fin">Date de fin</label><br />
            <input type="datetime-local" name="date_fin" id="date_fin" placeholder="la date de fin"><br /><br />


            <button class="button w-100 primary">Soummettre</button>
        </form>
    </div>



    <div>
        <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    </div>
@endsection
