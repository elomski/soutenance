@extends('layout.base')

@section('content')

@include('includes.Administrateur.AdministrateurSideBar.AdministrateurSideBar')

<div class="wrap-content">
    @include('includes.Administrateur.AdministrateurAppBar.AdministrateurAppBar')



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

        <table
         id="datatable"
          {{-- class="stripe" --}}
           {{-- id="permissionsTable" --}}
            class="table" >
            <thead>
                <tr>

                    <th>Nom de l'employe</th>
                    <th>Type de permission</th>
                    {{-- <th>Statut de la permission</th> --}}
                    <th>Function</th>
                    <th>Date de debut </th>
                    <th>Date de fin</th>
                    <th width="100" class="text-center">
                        {{-- Opérations --}}
                        Statut de la permission
                    </th>
                </tr>
            </thead>






            <tbody>
                @foreach ($permissions as $permission)
                    <tr class="permission-row" data-statut="{{ $permission->statut_permision_id }}">


                        <td>
                            {{ $permission->personnel->user->name }}
                        </td>

                        <td class="text-ellipsis">
                            {{ $permission->typePermission->name }}
                        </td>
                        {{-- <td >
                            {{ $permission->statutPermision->name }}
                        </td> --}}

                        <td>
                            {{ $permission->personnel->function }}
                        </td>
                        <td>
                            {{  \Carbon\Carbon::parse($permission->date_debut)->format('d/m/Y H:i')  }}
                        </td>
                        <td >
                            {{  \Carbon\Carbon::parse($permission->date_fin)->format('d/m/Y H:i')  }}
                        </td>

                        <td class="text-center">

                                @if($permission->statut_permision_id == 2)
                                    <span class="badge bg-success">Accepté</span>
                                @elseif($permission->statut_permision_id == 3)
                                    <span class="badge bg-danger">Refusé</span>
                                @endif


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




