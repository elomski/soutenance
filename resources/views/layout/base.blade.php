<!DOCTYPE html>
<html lang="en">
<head>
    @yield('css')
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/new style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/icons/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/datatable/datatables.min.css') }}">

{{--
    <style>
        /* Bordure en bas de chaque ligne du tableau */
        .permission-row {
            border-bottom: 1px solid #ccc; /* Bordure de 1px */
        }

        .permission-row:last-child {
            border-bottom: none; /* Supprime la bordure de la dernière ligne */
        }
    </style> --}}





    <title>Document</title>
</head>
<body>
    @yield('content')

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src=" {{ URL::asset('assets/datatable/datatables.min.js') }} "></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
    <script src="{{ URL::asset('assets/calendar.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
     <script>
        $(document).ready(function() {
            $('#calendar').Calendar();
        });
    </script>

<script>
    $(document).ready(function() {
        // Initialisation de DataTables
        $('#datatable').DataTable();

        // Appliquer une couleur à chaque ligne en fonction du statut de la permission
        $('#datatable tbody tr').each(function() {
            var statut = $(this).data('statut'); // Récupère le statut de la permission

            // Applique une couleur transparente selon le statut
            if (statut == 2) { // Accepté
                $(this).css('background-color', 'rgba(0, 255, 0, 0.1)'); // Vert transparent
            } else if (statut == 3) { // Refusé
                $(this).css('background-color', 'rgba(255, 0, 0, 0.1)'); // Rouge transparent
            }
        });
    });
</script>







{{--

<script>
    $(document).ready(function() {
        // Initialisation de DataTables
        $('#datatable').DataTable({
            createdRow: function(row, data, dataIndex) {
                $(row).addClass('permission-row'); // Ajoute la classe pour la bordure
            }
        });

        // Appliquer une couleur à chaque ligne en fonction du statut de la permission
        $('#datatable tbody').on('mouseenter', 'tr', function() {
            var statut = $(this).data('statut'); // Récupère le statut de la permission

            // Applique une couleur transparente selon le statut
            if (statut == 2) { // Accepté
                $(this).css('background-color', 'rgba(0, 255, 0, 0.1)'); // Vert transparent
            } else if (statut == 3) { // Refusé
                $(this).css('background-color', 'rgba(255, 0, 0, 0.1)'); // Rouge transparent
            }
        });
    });
</script> --}}













    @yield('js')

</body>
</html>

