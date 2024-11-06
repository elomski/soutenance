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
    @include('includes.Personnels.Sidebar.PersonnelSideBar')

    <div class="wrap-content">
        <div class="d-grid-3"></div>
        <div class="d-grid-32">


        </div>

        <div class="">
            <div></div>
            <div class=" d-grid-4">
                <div class="personel-image dashboard-card ">
                    <img src="{{ URL::asset('storage/'  . Auth::user()->personnel->image  )}}" alt="" class="text-center2">
                </div>

                <a class="a-2" href="{{ route('permission.create') }}"><div class="button w-100 primary"><b>Demande de
                    permission</b></div></a>
                    <a class="a-2" href="{{ route('listDesPermission')}}"><div class="button w-100 primary"><b>Liste de ses
                    permissions</b></div></a>
                    <a class="a-2" href="{{ route('editPersonnel.process', Auth::user()->personnel->id) }}"><div class="button w-100 primary"><b>Modifier son profil</b>
        </div></a>



{{--
                <div></div>
                <div></div> <div></div> --}}



            </div>

            <div class="d-grid-4">
                <div >
                    {{-- <div class='text-center'> <h2><b>Nom: </b></h2> {{ user->name }}</div><br/><br/> --}}
                    <br/><br/>
                    <span ><b>Nom: </b> {{ Auth::user()->email }}</span><br/><br/>



                               {{-- @if (Auth::user()->personnel) --}}
                    <span><b>email: </b> {{ Auth::user()->email }}</span><br/><br/>
                    <span> <b>prenom:  </b> {{ Auth::user()->personnel->firstname }} </span><br/><br/>
                    <span><b>poste: </b> {{ Auth::user()->personnel->function }}</span> <br/><br/>
                    <span><b>numero telephone: </b> {{ Auth::user()->personnel->phone }}</span> <br/><br/>
                    <span><b>Sexe: </b> {{ Auth::user()->personnel->sex }}</span> <br/><br/>
                <span><b>Adresse: </b> {{ Auth::user()->personnel->address }}</span> <br/><br/>

                {{-- @else --}}
                    {{-- <p>Aucune information de personnel disponible.</p> --}}
                {{-- @endif --}}
                </div >
                <div class="dashboard-card text-center primary">
                   <h1> {{ $countPermissions }}</h1><small>permissions</small>
                </div>
                <div class="dashboard-card ">
                    <h4 style="text-align:center; color:blanchedalmond"> Nombre de permissions par mois </h4>
                    {!! $Chart_permissions_by_month->container() !!}
                </div>
                <div>

                </div>
            </div>


            <div class="dashboard-card ">
                <h4 style="text-align: center; color:blue">Nombre de permissions par jour dans l’année</h4>
                {!! $Chart_permissions_by_day->container() !!}
            </div>

        </div>

        <div class="d-grid-2">

            <div>

            </div>
            <div>

            </div>

        </div>
        <div>


        </div>


        <div class="d-grid-2">
            <div id="calendar"></div>
            <div class="">
                <canvas id="permissionsChart"></canvas>
            </div>

        </div>


        </div>






</div>


@endsection



@section('js')
<script src="{{ URL::asset('assets/chart/chart.min.js') }}" charset="utf-8"></script>
{{-- {!! $Chart_by_count_sale_product->script() !!} --}}
{!! $Chart_permissions_by_month->script() !!}
{!! $Chart_permissions_by_day->script() !!}
@endsection
