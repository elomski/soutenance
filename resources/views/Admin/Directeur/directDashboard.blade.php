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
    @include('includes.Directeur.DirecteurSideBar.DirecteurSideBar')

    <div class="wrap-content">
        @include('includes.Directeur.DirecteurAppBar.DirecteurAppBar')
        <div></div>
        <div></div>
        <h2>Bienvenue Directeur sur votre tableau de bord</h2>
        <div class="d-grid-4">
            <div class="dashboard-card-2">
                <table width="100%">
                    <tr>
                        <td>
                            <span class="h1">{{ $countPersonnel }}</span>
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
                            <span class="h1">{{ $countPermission }}</span>
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
                            <a href="{{ 0 }}" class="button primary">
                                <i class="fas fa-arrow-right-long"></i>
                            </a>
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
        <div class="">

            <div>
                <h4 style="text-align:center; color:rgb(35, 28, 16)"> Nombre de permissions par jours </h4>
                {!! $Chart_permissions_by_day->container() !!}
            </div>

        </div>
        <div class="">

            <div>
                <h4 style="text-align:center; color:rgb(35, 28, 16)"> Nombre de permissions accorder par jours </h4>
                {!! $Chart_accorder_permissions_by_day->container() !!}
            </div>


        </div>
        <div class="">


        </div>

        <div class="d-grid-4">
            <div>

            </div>
            {{-- <div class="dashboard-card-2 primary">
                <a class="h1-1 " href="">Creation des types de permissions</a>
            </div>
            <div class="dashboard-card-2 primary">
                <a class="h1-1 " href="">Liste des types de permissions</a>
            </div> --}}
            <div>

            </div>
        </div>

        <div class="">
            <canvas id="permissionsChart"></canvas>
        </div>

        <div>

        </div>





    </div>
@endsection


@section('js')
    <script src="{{ URL::asset('assets/chart/chart.min.js') }}" charset="utf-8"></script>
    {!! $Chart_permissions_by_month->script() !!}
    {!! $Chart_permissions_by_day->script() !!}
    {!! $Chart_accorder_permissions_by_day->script() !!}
    {!! $Chart_refuser_permissions_by_day->script() !!}

@endsection
