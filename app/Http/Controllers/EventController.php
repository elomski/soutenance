<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Méthode pour obtenir les événements de l'utilisateur connecté
    public function getEvents()
    {
        // Récupère uniquement les événements de l'utilisateur connecté
        $events = Events::where('user_id', Auth::user()->id)->get();
        return response()->json($events);
    }

    // Méthode pour créer un nouvel événement
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'title' => 'required|string|max:225',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start'
        ]);

        // Création de l'événement
        $event = new Events();
        $event->title = $validatedData['title'];
        $event->start = $validatedData['start'];
        $event->end = $validatedData['end'];
        $event->user_id = Auth::user()->id;
        $event->save();

        return response()->json(['success' => 'Event created successfully']);
    }
}


