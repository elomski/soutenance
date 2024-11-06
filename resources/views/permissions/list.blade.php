@extends('layout.base')

@section('content')

@include('includes.Directeur.DirecteurSideBar.DirecteurSideBar')

<div class="wrap-content">
    @include('includes.Directeur.DirecteurAppBar.DirecteurAppBar')



    <table width="100%" class="elevator">
        <tr>
            <td>
                <h2>Liste des permissions </h2>
            </td>
            <td class="text-right">
                {{-- <a href="{{ route('permission.create') }}" class="button primary">
                    Créer
                </a> --}}
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
                @foreach ($permissions as $permission)
                    <tr>


                        <td class="ellipsis">
                            {{ $permission->personnel->user->name }}
                        </td>

                        <td class="ellipsis">
                            {{ $permission->typePermission->name }}
                        </td>
                        <td class="ellipsis">
                            {{ $permission->statutPermision->name }}
                        </td>

                        <td class="ellipsis">
                            {{ $permission->personnel->function }}
                        </td>
                        <td class="ellipsis">
                            {{  \Carbon\Carbon::parse($permission->date_debut)->format('d/m/Y H:i')  }}
                        </td>
                        <td class="ellipsis">
                            {{ \Carbon\Carbon::parse($permission->date_fin)->format('d/m/Y H:i') }}

                        </td>

                        <td class="text-center">
                            <a href="{{ route('permission.show', $permission->id) }}" class="icon-button primary">
                                <i class="fas fa-pen-to-square"></i> &nbsp; voir
                            </a>
                            {{-- &nbsp; --}}
                            {{-- <form class="d-inline" action="" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit  ? Cette action sera irréversible !')">
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
    <div></div>
    <div></div>
    <div></div>
</div>


@endsection
