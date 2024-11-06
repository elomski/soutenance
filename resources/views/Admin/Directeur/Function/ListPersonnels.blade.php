@extends('layout.base')

@section('content')

@include('includes.Directeur.DirecteurSideBar.DirecteurSideBar')

<div class="wrap-content">
    @include('includes.Directeur.DirecteurAppBar.DirecteurAppBar')



    <table width="100%" class="elevator">
        <tr>
            <td>
                <h2>Liste du personnel</h2>
            </td>
            <td class="text-right">
                <a href="{{ route('register.process') }}" class="button primary">
                    Créer
                </a>
            </td>
        </tr>
    </table><br />






    @if ($message = Session::get('success'))
        <ul class="alert alert-success">
            <li>{{ $message }}</li>
        </ul>
    @endif

    <div class="border datatable-cover">

        <table id="datatable" class="stripe">
            <thead>
                <tr>

                    <th>Nom de l'employe</th>
                    <th>Type de permission</th>
                    <th>Statut de la permission</th>
                    <th>Function</th>
                    <th>Date de debut </th>
                    <th>Date de fin</th>
                    <th width="100" class="text-center">
                        Opérations
                    </th>
                </tr>
            </thead>






            <tbody>
                @foreach ($personnels as $personnel)
                    <tr>


                        <td>
                            {{ $personnel->firstname }}
                        </td>

                        <td>
                            {{ $permission->typePermission->name }}
                        </td>
                        <td >
                            {{ $permission->statutPermision->name }}
                        </td>

                        <td>
                            {{ $permission->personnel->function }}
                        </td>
                        <td>
                            {{ $permission->date_debut }}
                        </td>
                        <td>
                            {{ $permission->date_fin }}
                        </td>

                        <td class="text-center">
                            {{-- <a href="{{ 0 }}" class="icon-button primary">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            &nbsp; --}}
                            {{-- <form class="d-inline" action="{{ 0 }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ 0 }} ? Cette action sera irréversible !')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="icon-button error">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form> --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
