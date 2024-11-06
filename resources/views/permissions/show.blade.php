@extends('layout.base')


@section('content')
    @include('includes.Directeur.DirecteurSideBar.DirecteurSideBar')
    <div class="wrap-content">
        <div class="d-grid-2">
            <div></div>
            <div></div>

        </div>
        <div class="d-grid-5 ">


            <div class="Accord-button">

                <a href="{{route('responsable.dashboard')}}" class="button primary">retour</a>










            </div>
            <div class="dashboard-card">
                <div class="d-grid-10 ">
                    <div>

                        <div>
                            <label for="">Demandeur</label>
                        </div>
                        <div class="image-container ">
                            <img src="{{ URL::asset('storage/' . $permission->personnel->image) }}" alt="">

                        </div>
                    </div>
                    <div>
                        <br /><br />
                        <div class="justificat">
                            <h3>Email : &nbsp; </h3> {{ $permission->personnel->user->email }}
                        </div>
                        <br /><br />
                        <div class="justificat">
                            <h3>Nom : &nbsp; </h3> {{ $permission->personnel->user->name }}
                        </div>

                        <br /><br />
                        <div class="justificat">
                            <h3>Poste : &nbsp; </h3> {{ $permission->personnel->function }}
                        </div>
                        <br /><br />
                        <div class="justificat">
                            <h3>Type de permission : &nbsp;</h3> {{ $permission->typePermission->name }}
                        </div>
                        <br /><br />
                        <div class="justificat">
                            <h3>Date de debut : &nbsp;</h3> {{ $permission->date_debut }}
                        </div>
                        <br /><br /><br />
                        <div class="justificat">
                            <h3>Date de fin : &nbsp;</h3> {{ $permission->date_fin }}

                        </div>
                    </div>


                </div>
                <div class="d-grid-2">
                    <div>
                        <div>Description</div>
                        <div class="description">
                            {{ $permission->description }}
                        </div>
                    </div>



                    <div class="Accord-button">




                        <div class="accorder">
                            <form class="d-inline" action="{{ route('permission.update2', $permission->id) }}"
                                method="POST"
                                onsubmit="return confirm('Êtes-vous sûr(e) de vouloir refuser cette permission a l\'employee {{ $permission->personnel->user->name }} ? ')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="accorder">
                                    Refus
                                </button>
                            </form>
                        </div>

                        <div class="accorder-1">
                            <form class="d-inline" action="{{ route('permission.update1', $permission->id) }}"
                                method="POST"
                                onsubmit="return confirm('Êtes-vous sûr(e) de vouloir accorder cette permission a l\'employee {{ $permission->personnel->user->name }} ')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="accorder-1">
                                    Accorder
                                </button>
                            </form>

                        </div>

                    </div>

                </div>
            </div>



            {{-- <div class="d-grid-3">










            </div> --}}




        </div>
        <div class="d-grid-2">
            <div>

            </div>
            <div>

            </div>

        </div>


    </div>
@endsection
