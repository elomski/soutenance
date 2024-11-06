@extends('layout.base')

@section('content')

    <table id="datatable" class="stripe">
        <thead>
            <tr>
                <th>nom</th>
                <th class="text-center" width="100">
                    Operations
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $types as $type)
                <tr>
                    <td>{{ $type->name}}</td>
                    <td>
                        <a href=""{{route('type.edit', $type->id)}}>
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        &nbsp;
                        <form action="{{ route('type.destroy', $type->id) }}" method="POST"
                            onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ $type->name }} ? Cette action sera irréversible !')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

@endsection

<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
</div>



{{--

<div class="border datatable-cover">
    <table id="datatable" class="stripe">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th width="100" class="text-center">
                    Opérations
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        {{ number_format($product->price, 0, ' ') }} F CFA
                    </td>
                    <td>
                        {{ $product->quantity }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('products.edit', $product->id) }}" class="icon-button primary">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        &nbsp;
                        <form class="d-inline" action="{{ route('products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ $product->name }} ? Cette action sera irréversible !')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-button error">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
