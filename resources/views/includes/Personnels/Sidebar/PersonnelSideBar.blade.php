<div class="side-bar">
    <a href="" class="brand-logo-text">
        Permi-App
    </a>
    <br /><br /><br />

    <ul>
        <li>
            <a href="{{ route('dashboard') }}">
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
            <a href="{{ route('permission.create') }}">
                <div @class([isset($page) && $page === 'permission.create' ? 'active' : '',])>
                    <i class="fa-solid fa-hand"></i>
                    &nbsp;
                    Demander une permission
                </div>
            </a>
        </li>
    </ul>



    <ul>
        <li>
            <a href="{{ route('listDesPermission') }}">
                <div @class([isset($page) && $page === 'personnalPermission' ? 'active' : ''])>
                    <i class="fa-solid fa-business-time"></i>
                    &nbsp;
                    Historique des permissions
                </div>
            </a>
        </li>
    </ul>



    <ul>
        <li>
            <a href="{{ route('editPersonnel.process', Auth::user()->personnel->id) }}">
                <div @class([isset($page) && $page === 'editPersonnel' ? 'active' : ''])>
                    <i class="fa-solid fa-check"></i>
                    &nbsp;
                    Mis a jour de profil
                </div>
            </a>
        </li>
    </ul>

    
{{--


    <ul>
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


    {{--
    <ul>
        <li>
            <a href= "{{route('permission.edit', $permission->id )}}">
                <div @class([isset($page) && $page === "permissions.edit" ? "active" : ""])>
                    <i class="fa-solid fa-user"></i>
                    &nbsp;
                   <b>Modification de profil</b>
                </div>
            </a>
        </li>
    </ul> --}}
</div>
