@extends('layout.base')

@section('content')
    @include('includes.Administrateur.AdministrateurSideBar.AdministrateurSideBar')
    <div class="wrap-content">
        @include('includes.Administrateur.AdministrateurAppBar.AdministrateurAppBar')

        <div></div>
        <div></div>
        <div></div>
        <div class="d-grid-5">
            <div></div>
            <div class="border datatable-cover">

                <table width="100%" class="elevator">
                    <tr>
                        <td>
                            <h2>Liste des personnels</h2>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('registerview') }}" class="button primary">
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
                        @foreach ($personnels as $personnel)
                            <tr>
                                {{-- <td>
                            <img src="{{ URL::asset($product->image == '' ? 'db/images.png' : URL::asset('db/products/' . $product->image))  }}" alt="{{ $product->name }}" height="30px">
                        </td> --}}
                                <td>
                                    {{ $personnel->user->name }}
                                </td>
                                <td>
                                    {{ $personnel->user->email }}
                                </td>

                                <td>
                                    {{ $personnel->firstname }}
                                </td>
                                <td>
                                    {{ $personnel->function }}
                                </td>
                                {{-- <td>
                            {{ number_format($product->price, 0, " ") }} F CFA
                        </td> --}}
                                <td>
                                    {{ $personnel->sex }}
                                </td>
                                {{-- <td>
                            @foreach ($categories as $category) --}}
                                {{-- value="{{ $product->id }}" {{ $product->category_id == $product->id ? 'selected' : '' }} --}}
                                {{-- {{ $product->name }} --}}
                                {{-- @endforeach
                            {{ App\Models\Category::find($product->category_id)->name }}
                        </td> --}}
                                {{-- <td class="text-center">
                                    <a href="{{ 0 }}" class="icon-button primary">
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
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
            <div></div>
        </div>












    </div>
@endsection
