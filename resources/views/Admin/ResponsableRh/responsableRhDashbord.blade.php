@extends('layout.base')
@section('css')
    <style>
        canvas {
            width: 100% !important;
            aspect-ratio: 1/1;
            height: 400px !important;
        }
    </style>
@endsection

@section('content')
@include('includes.Administrateur.AdministrateurSideBar.AdministrateurSideBar')
<div class="wrap-content">
    <h1>Bienvenue au tableau de bord</h1>
    <div class="d-grid-4">
        <div class="dashboard-card-2">
            <table width="100%">
                <tr>
                    <td>
                        <span class="h1">{{ $personnels }}</span>
                        <small>Personnel</small>
                    </td>
                    <td class="text-right">
                        {{-- <a href="{{ 0 }}" class="button primary">
                            <i class="fas fa-arrow-right-long"></i>
                        </a> --}}
                    </td>
                </tr>
            </table>

        </div>
        <div class="dashboard-card-2">

            <table width="100%">
                <tr>
                    <td>
                        <span class="h1">{{ $Permissions }}</span>
                        <small>Permissions</small>
                    </td>
                    <td class="text-right">
                        {{-- <a href="{{ 0 }}" class="button primary">
                            <i class="fas fa-arrow-right-long"></i>
                        </a> --}}
                    </td>
                </tr>
            </table>
        </div>

        <div class="dashboard-card-2">
            <table width="100%">
                <tr>
                    <td>
                        <span class="h1">{{ $countPermissionAccorder }}</span>
                        <small>permissions Accorder</small>
                    </td>
                    <td class="text-right">
                        {{-- <a href="{{ 0 }}" class="button primary">
                            <i class="fas fa-arrow-right-long"></i>
                        </a> --}}
                    </td>
                </tr>
            </table>
        </div>
        <div class="dashboard-card-2">
            <table width="100%">
                <tr>
                    <td>
                        <span class="h1">{{ $countPermissionRefuser }}</span>
                        <small>permissions Refuser</small>
                    </td>
                    <td class="text-right">
                        {{-- <a href="{{ 0 }}" class="button primary">
                            <i class="fas fa-arrow-right-long"></i>
                        </a> --}}
                    </td>
                </tr>
            </table>
        </div>
    </div>




    <div class="d-grid-3">
        <div>

        <div>
            <h4 style="text-align:center; color:rgb(35, 28, 16)"> Nombre de permissions par type de permissions </h4>
            {!! $Chart_permissions_by_type->container() !!}
             {{-- chartPermissionsByType() --}}
        </div>

        </div>
        <div></div>
        <div class="permi-card dashboard-card">
            <div class="permi-card-content">
                @foreach ($PermissionEnAttentes as $PermissionEnAttente)
                    <ul>
                        <li class="list">
                            <a href="{{ route('voirPermission', $PermissionEnAttente->id) }}">
                                <div class="justificat">
                                    <div class="image-containe">
                                        <img src="{{ URL::asset('storage/' . $PermissionEnAttente->personnel->image) }}" alt="">
                                    </div>

                                    &nbsp;
                                    <div class="justificatif text-ellipsis">
                                        {{ $PermissionEnAttente->personnel->user->email }}
                                        <small> {{ $PermissionEnAttente->created_at }} </small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <br/>
                    </ul>
                @endforeach
            </div>
        </div>

    </div>


    <div class="d-grid-2">

        <div>
            <h4 style="text-align:center; color:rgb(35, 28, 16)"> Nombre de permissions par mois </h4>
            {!! $Chart_permissions_by_month->container() !!}
        </div>


        <div>
            <h4 style="text-align:center; color:rgb(35, 28, 16)"> Nombre de permissions refuser par jours </h4>
            {!! $Chart_refuser_permissions_by_day->container() !!}
        </div>

    </div>
</div>

@endsection



@section('js')
    <script src="{{ URL::asset('assets/chart/chart.min.js') }}" charset="utf-8"></script>
    {!! $Chart_permissions_by_month->script() !!}
    {!! $Chart_permissions_by_day->script() !!}
    {!! $Chart_accorder_permissions_by_day->script() !!}
    {!! $Chart_refuser_permissions_by_day->script() !!}
    {!! $Chart_permissions_by_type->script() !!}


@endsection
