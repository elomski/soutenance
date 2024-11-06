@extends('layout.base')

@section('content')
<form action = "{{ route('type.update')}}" method="POST">

    @method('PUT')
    @csrf
    <label for="name">type de permission</label>
    <input type="text" name="name" id="name" placeholder="saisir le type de permission">
    <button class="submit">Soumettre</button>
</form>

@endsection

<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
