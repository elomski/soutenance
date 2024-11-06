<div class="side-bar">
    <a href="" class="brand-logo-text">
        Permi-App
    </a>
    <br /><br /><br />

    <ul>
        <li>
            <a href="{{ route('directeur.dashboard') }}">
                <div @class([isset($page) && $page === 'dashdirecteur' ? 'active' : ''])>
                    <i class="fa-solid fa-house"></i>
                    &nbsp;
                    Tableau de bord
                </div>
            </a>
        </li>
    </ul>

    <ul>
        <li>
            <a href="{{ route('permission.index') }}">
                <div @class([isset($page) && $page === 'permission.list' ? 'active' : ''])>
                    <i class="fa-solid fa-list-check"></i>
                    &nbsp;
                    Liste des permissions
                </div>
            </a>
        </li>
    </ul>

{{--
    <ul>
        <li>
            <small>
                <i class="fas fa-cart-arrow-down"></i>
                &nbsp;
                <b>Gestion de administrateurs</b>
            </small>
        </li>
    </ul> --}}



    <ul>
        <li>
            <a href="{{ route('responsable.register.view') }}">
                <div @class([isset($page) && $page === 'admin.responsable.create' ? 'active' : '',])>
                    <i class="fa-solid fa-user"></i>
                    &nbsp;
                    Creation d'administrateur
                </div>
            </a>
        </li>
    </ul>



    <ul>
        <li>
            <a href="{{ route('responsable.list') }}">
                <div @class([isset($page) && $page === 'admin.responsablerh.list' ? 'active' : ''])>
                    <i class="fa-solid fa-users"></i>
                    &nbsp;
                    Liste des administrateurs
                </div>
            </a>
        </li>
    </ul>



    {{-- <ul>
        <li>
            <small>
                <i class="fas fa-cart-arrow-down"></i>
                &nbsp;
                <b>Gestion des permissions</b>
            </small>
        </li>
    </ul> --}}




{{-- 
    <ul>
        <li>
            <a href="{{ route('personnel.index') }}">
                <div @class([isset($page) && $page === 'list' ? 'active' : ''])>
                    <i class="fa-solid fa-check"></i>
                    &nbsp;
                    Liste du personnel
                </div>
            </a>
        </li>
    </ul> --}}






    {{-- <ul>
        <li>
            <a href="{{ route('regle') }}">
                <div @class([isset($page) && $page === 'regle' ? 'active' : ''])>
                    <i class="fa-solid fa-ruler"></i>
                    &nbsp;
                    Règles de l'entreprise
                </div>
            </a>
        </li>
    </ul> --}}
{{--
    <ul>
        <li>
            <a href="{{ route('permission.index') }}">
                <div @class([isset($page) && $page === 'permission.list' ? 'active' : ''])>
                    <i class="fa-solid fa-tty"></i>
                    &nbsp;
                    Feedback ou communication
                </div>
            </a>
        </li>
    </ul> --}}

</div>
