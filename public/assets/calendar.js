// document.addEventListener('DOMContentLoaded', function() {
//     var calendarEl = document.getElementById('calendar');

//     const events = [
//         { title: 'Congé maladie', start: '2024-11-10', color: '#ff9f89' },
//         { title: 'Jour férié', start: '2024-11-15', color: '#ffd700' },
//         // Autres événements
//     ];

//     var calendar = new FullCalendar.Calendar(calendarEl, {
//         headerToolbar: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'dayGridMonth,dayGridWeek,dayGridDay'
//         },
//         initialView: 'dayGridMonth',
//         selectable: true,
//         editable: true,
//         events: events,

//         // Cette fonction est déclenchée lors du clic sur une date
//         dateClick: function(info) {
//             const title = prompt('Nom de l\'événement :');
//             if (title) {
//                 // Envoie des données vers le backend pour créer un événement
//                 $.ajax({
//                     url: '/events',
//                     method: 'POST',
//                     data: {
//                         title: title,
//                         start: info.dateStr,
//                         _token: '{{ csrf_token() }}' // Laravel CSRF token
//                     },
//                     success: function(response) {
//                         // Ajoute l'événement au calendrier sans rechargement
//                         calendar.addEvent({
//                             title: title,
//                             start: info.dateStr
//                         });
//                         alert('Événement ajouté avec succès');
//                     },
//                     error: function(error) {
//                         console.error('Erreur lors de l\'ajout de l\'événement :', error);
//                         alert('Une erreur est survenue lors de l\'ajout de l\'événement.');
//                     }
//                 });
//             }
//         },

//         // Fonction déclenchée lors du clic sur un événement
//         eventClick: function(info) {
//             alert('Événement cliqué : ' + info.event.title);
//             // Logique pour modifier ou supprimer l'événement (à implémenter)
//         }
//     });

//     calendar.render();
// });

























$(document).ready(function() {
    // Récupérer le token CSRF depuis la meta
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Configuration de jQuery pour inclure le token CSRF dans toutes les requêtes AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    // Initialisation du calendrier FullCalendar
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay'
        },
        initialView: 'dayGridMonth',
        selectable: true,
        editable: true,
        events: [],
        dateClick: function(info) {
            const title = prompt('Nom de l\'événement :');
            if (title) {
                // Envoie la requête AJAX pour ajouter l'événement
                $.ajax({
                    url: '/events',
                    method: 'POST',
                    data: {
                        title: title,
                        start: info.dateStr,
                        _token: csrfToken // Utilise le token CSRF ici
                    },
                    success: function(response) {
                        calendar.addEvent({
                            title: title,
                            start: info.dateStr
                        });
                        alert('Événement ajouté avec succès');
                    },
                    error: function(error) {
                        console.error('Erreur lors de l\'ajout de l\'événement :', error);
                        alert('Une erreur est survenue lors de l\'ajout de l\'événement.');
                    }
                });
            }
        }
    });

    calendar.render();
});
