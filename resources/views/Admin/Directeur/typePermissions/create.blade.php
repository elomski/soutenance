@extends('layout.base')

@section('content')


    <form action = "{{ route('type.store') }}" method="POST">

        @method('POST')
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

        <label for="name">type de permission</label>
        <input type="text" name="name" id="name" placeholder="saisir le type de permission">

        <label for="description">description de permission</label>
        <input type="text" name="description" id="description" placeholder="saisir la description de permission">
        <button class="submit">Soumettre</button>
    </form>


@endsection



<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
</div>
