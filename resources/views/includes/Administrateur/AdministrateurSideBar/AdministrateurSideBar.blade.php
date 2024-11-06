<div class="side-bar">
    <a href="" class="brand-logo-text">
        Permi-App
    </a>
    <br /><br /><br />

    <ul>
        <li>
            <a href="{{ route('responsable.dashboard') }}">
                <div @class([isset($page) && $page === 'dashboard' ? 'active' : ''])>
                    <i class="fa-solid fa-house"></i>
                    &nbsp;
                    Tableau de bord
                </div>
            </a>
        </li>
    </ul>



    <ul>
        <li>
            <a href="{{ route('registerview') }}">
                <div @class([isset($page) && $page === 'admin.responsablerh.list' ? 'active' : '',])>
                    {{-- <i class="fa-solid fa-hand"></i> --}}
                    <i class="fa-solid fa-user"></i>
                    &nbsp;
                    Enregistrer un personnel
                </div>
            </a>
        </li>
    </ul>



    <ul>
        <li>
            <a href="{{ route('list.personnels') }}">
                <div @class([isset($page) && $page === 'list.personnels' ? 'active' : ''])>
                    <i class="fa-solid fa-users"></i>
                    &nbsp;
                    Liste des personnels
                </div>
            </a>
        </li>
    </ul>

    <ul>
        <li>
            <a href="{{ route('permission.statut') }}">
                <div @class([isset($page) && $page === 'permission.statut' ? 'active' : ''])>
                    <i class="fa-solid fa-check"></i>
                    &nbsp;
                     Permissions deja consulter
                </div>
            </a>
        </li>
    </ul>

    {{-- <ul>
        <li>
            <a href="{{ route('permission.index') }}">
                <div @class([isset($page) && $page === 'permission.list' ? 'active' : ''])>
                    <i class="fa-solid fa-list-check"></i>
                    &nbsp;
                    Quotas de permission
                </div>
            </a>
        </li>
    </ul> --}}

    {{-- <ul>
        <li>
            <a href="{{ route('permission.index') }}">
                <div @class([isset($page) && $page === 'permission.list' ? 'active' : ''])>
                    <i class="fa-solid fa-ruler"></i>
                    &nbsp;
                    Règles de l'entreprise
                </div>
            </a>
        </li>
    </ul> --}}

    {{-- <ul>
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
