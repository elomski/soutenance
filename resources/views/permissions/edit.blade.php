@extends('layout.base')

@section('content')
    @include('includes.Personnels.Sidebar.PersonnelSideBar')
    <div class="wrap-content">
        @include('includes.Personnels.Appbar.PersonnelAppBar')
        <form action="{{ route('permission.update', Auth::user()->personnel->permission->id ) }}" method="POST" class="category-form">
            <h1 class="permi-title">Mis a jour de permission</h1><br />
            <p class="permi-title">Remplir les informations pour demander une permission</p>
            <br /><br />

            @csrf
            @method('PUT')

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
                    <option value="{{ Auth::user()->personnel->permission->typePermission->id }}">{{ Auth::user()->personnel->permission->typePermission->name }}</option>
                @empty
                    <option value="">Pas de type_permission !</option>
                @endforelse
            </select><br /><br />

            {{-- <label for="statut_permision">statut de permission</label><br /> --}}
            <select hidden name="statut_permision_id" id="statut_permision">
                @forelse ($statut_permisions as $statut_permision)
                    <option value="{{ Auth::user()->personnel->permission->statutPermision->id }}">{{ Auth::user()->personnel->permission->statutPermision->name }}</option>
                @empty
                    <option value="">Pas de statut</option>
                @endforelse
            </select><br /><br />



            <label for="description">Description</label><br />
            <textarea name="description" id="description" cols="30" rows="10" placeholder="la description" value="{{ old('description', $permission->description) }}"> </textarea><br /><br />


            <label for="date_debut">Date de Debut</label><br />
            <input type="datetime-local" name="date_debut" id="date_debut" placeholder="la date de debut" value="{{ old('date_debut', $permission->date_debut ) }}"><br /><br />

            <label for="date_fin">Date de fin</label><br />
            <input type="datetime-local" name="date_fin" id="date_fin" placeholder="la date de fin" value="{{ old('date_fin', $permission->date_fin ) }}" ><br /><br />


            <button class="button w-100 primary">Soummettre</button>
        </form>
    </div>



    <div>
        <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    </div>
@endsection
