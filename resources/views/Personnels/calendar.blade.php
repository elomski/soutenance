<!DOCTYPE html>
<html>
<head>
    <title>Calendrier</title>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
</head>
<body>

    <div id="calendar"></div>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
    <!-- Axios for API calls -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: function(fetchInfo, successCallback, failureCallback) {
                    axios.get('/events')  // Appel API pour récupérer les événements
                        .then(function (response) {
                            successCallback(response.data);
                        })
                        .catch(function (error) {
                            failureCallback(error);
                        });
                }
            });

            calendar.render();
        });
    </script>

</body>
</html>




