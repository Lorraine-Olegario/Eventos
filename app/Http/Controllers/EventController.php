<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index ( ) {

        $search = request( 'search' );
        if (  $search ) {
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else {
            $events = Event::all();
        }
    
        return view('welcome', ['events' => $events, 'search' => $search] );
    }

    public function create () {
        return view('events.create');
    }

    public function store ( Request $request) {
        $event = new Event;

        $event->title       = $request->title;
        $event->city        = $request->city;
        $event->private     = $request->private;
        $event->description = $request->description;
        $event->itens       = $request->itens;
        $event->date        = $request->date;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = MD5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/events'),$imageName);
            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect ('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show ( $id ) { 
        $event = Event::findOrFail( $id );
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard() {
        $user = auth()->user();
        $events = $user->events;
        return view('events.dashboard', ['events' => $events]);
    }
    
    public function destroy( $id ) {
        Event::findOrFail ( $id )->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }

    public function edit( $id ){
        $event = Event::findOrFail( $id );
        return view('events.edit', ['event' => $event]);
    }

    public function updaten( Request $request) {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = MD5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/events'),$imageName);
            $data['image']->image = $imageName;
        }

        Event::findOrFail($request->id)->update($data);
        return redirect ('/')->with('msg', 'Evento editado com sucesso!');
    }
}
