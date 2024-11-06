@extends('layout.base')

@section('content')
    @include('includes.Personnels.Sidebar.PersonnelSideBar')
    <div class="wrap-content">
        @include('includes.Personnels.Appbar.PersonnelAppBar')



    <table width="100%" class="elevator">
        <tr>
            <td>
                <h2>Liste des permissions personnels</h2>
            </td>
            <td class="text-right">
                <a href="{{ route('permission.create') }}" class="button primary">
                    Créer
                </a>
            </td>
        </tr>
    </table><br />


        <table id="datatable" class="stripe">
            <thead>
                <tr>

                    <th>Date</th>

                    <th>Type de permission</th>
                    <th>Statut de la permission</th>

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


                        <td>
                            {{ $permission->created_at }}
                        </td>


                        <td>
                            {{ $permission->typePermission->name }}
                        </td>
                        <td>
                            {{ $permission->statutPermision->name }}
                        </td>
                        {{-- <td>
                    {{ number_format($product->price, 0, " ") }} F CFA
                </td> --}}

                        <td>
                            {{ $permission->date_debut }}
                        </td>
                        <td>
                            {{ $permission->date_fin }}
                        </td>

                        <td class="text-center">
                            {{-- <a href="{{ route('permission.edit', $permission->id) }}" class="icon-button primary">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                             &nbsp; --}}
                            <form class="d-inline" action="{{ route('permission.destroy', $permission->id) }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ $permission->name }} ? Cette action sera irréversible !')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="icon-button error">
                                    <i class="fas fa-trash"></i> &nbsp;remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

@endsection
