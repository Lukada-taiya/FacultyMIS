<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cmgmyr\Messenger\Models\Thread;
use Inertia\Inertia;
use Image;

class RequestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $threads = Thread::forUser(Auth::id())->latest('updated_at')->with('users')->get();
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->with('messages')->get()->map(fn ($thread) => [
            'id' => $thread->id,
            'subject' => $thread->subject,
            'created_at' => $thread->created_at->diffForHumans(),
            'message' => $thread->messages[0],
            'sender' => array(
                'id' => $thread->messages[0]->user()->get()[0]->id,
                'name' => $thread->messages[0]->user()->get()[0]->name,
                'profile_pic' => $thread->messages[0]->user()->get()[0]->profile_photo_path
            )
        ]);

        // $messages = Message::where('user_id', '=', Auth::id());


        // dd($threads[0]->messages()->get()[0]->user()->get()[0]);
        return Inertia::render('backend/requests/Index', ['threads' => $threads]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('backend/requests/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestt = $request->validate([
            'subject' => 'required|min:3|max:255',
            'recipient' => 'required',
            'body' => 'required|file|mimes:docx,doc,pdf'
        ]);

        $doc = $request->file('body');
        $filename = $doc->getClientOriginalName();
        $location = storage_path('app/public/');
        // dd($location);
        $doc->move($location, $filename);


        $thread = Thread::create([
            'subject' => $requestt['subject'],
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $filename,
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon(),
        ]);

        $thread->addParticipant(13);

        $message = $thread->messages[0];
        $sender = $thread->messages[0]->user()->get()[0];

        return Inertia::render('backend/requests/Show', [
            'thread' => $thread,
            'sender' => $sender,
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thread = Thread::findOrFail($id);
        // dd($thread->messages);
        $message = $thread->messages[0];
        $sender = $thread->messages[0]->user()->get()[0];
        return Inertia::render('backend/requests/Show', [
            'thread' => $thread,
            'sender' => $sender, 'message' => $message
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
