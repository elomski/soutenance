@extends('layout.base')

@section('content')
    @include('includes.Directeur.DirecteurSideBar.DirecteurSideBar')

    <div class="wrap-content">

        @include('includes.Directeur.DirecteurAppBar.DirecteurAppBar')
        <div></div>
        <div></div>
        <div></div>
        <div class="d-grid-5">
            <div></div>
            <div class="border datatable-cover">


                <table width="100%" class="elevator">
                    <tr>
                        <td>
                            <h2>Liste des admins</h2>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('responsable.register.view') }}" class="button primary">
                                Créer
                            </a>
                        </td>
                    </tr>
                </table><br />
                <table id="datatable" class="stripe">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>email</th>
                            <th>Firstname</th>
                            <th>Function</th>
                            <th>Sexe</th>
                            {{-- <th width="100" class="text-center">
                                Opérations
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($responsables as $responsable)
                            <tr>
                                {{-- <td>
                            <img src="{{ URL::asset($product->image == '' ? 'db/images.png' : URL::asset('db/products/' . $product->image))  }}" alt="{{ $product->name }}" height="30px">
                        </td> --}}
                                <td>
                                    {{ $responsable->user->name }}
                                </td>
                                <td>
                                    {{ $responsable->user->email }}
                                </td>

                                <td>
                                    {{ $responsable->firstname }}
                                </td>
                                <td>
                                    {{ $responsable->sex }}
                                </td>

                                <td>
                                    {{ $responsable->sex }}
                                </td>

                                {{-- <td class="text-center"> --}}
                                    {{-- <a href="{{ 0 }}" class="icon-button primary">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    &nbsp;
                                    <form class="d-inline" action="{{ 0 }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ 0 }} ? Cette action sera irréversible !')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="icon-button error">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>

            </div>
        </div>






        <div></div>
        <div></div>
        <div></div>
        <div></div>

    </div>

@endsection




