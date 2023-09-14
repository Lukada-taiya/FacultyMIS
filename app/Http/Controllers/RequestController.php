<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Image;

class RequestController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'permission:read requests|update requests| create requests | delete requests']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('read requests')) {
            $user = Auth::id();
            // $threads = Thread::forUser(Auth::id())->latest('updated_at')->with('users')->get();
            $threads = Thread::forUser($user)->latest('updated_at')->with('messages')->get()->map(fn ($thread) => [
                'id' => $thread->id,
                'subject' => $thread->subject,
                'created_at' => $thread->created_at->diffForHumans(),
                'message' => $thread->messages[0],
                'sender' => array(
                    'id' => $thread->messages[0]->user()->get()[0]->id,
                    'name' => $thread->messages[0]->user()->get()[0]->name,
                    'profile_pic' => $thread->messages[0]->user()->get()[0]->profile_photo_path,
                ),
                'isUnread' => $thread->isUnread($user)
            ]);

            // $messages = Message::where('user_id', '=', Auth::id());


            // dd($threads[0]->messages()->get()[0]->user()->get()[0]);
            return Inertia::render('backend/requests/Index', ['threads' => $threads]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (auth()->user()->can('create requests')) {
            $thread_subject = "";
            $user = auth()->user();
            if ($request->thread) {
                $thread_subject = 'Reply: ' . Thread::findOrFail($request->thread)->subject;
            }
            // $users = User::all()->map(fn ($user) => [
            //     'id' => $user->id,
            //     'name' => $user->name
            // ]);
            $roles = $user->getRoleNames();
            // dd($roles);
            $users = User::role('administrator')->get()->map(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name
            ]);
            // dd($roles->contains('student1'));
            if ($roles->contains('student')) {
                $student_courses = $user->programme->courses;
                $lecturers = [];
                foreach ($student_courses as $student_course) {
                    if ($student_course->level == $user->level) {
                        array_push($lecturers, ['id' => $student_course->lecturer->id, 'name' => $student_course->lecturer->name]);
                    }
                }
                // ->map(fn ($course) => [
                //     'id' => $course->lecturer->id,
                //     'name' => $course->lecturer->name
                // ]);
                $users = $users->merge($lecturers);
                $hods = $user->programme->department->hods->map(fn ($hod) => [
                    'id' => $hod->id,
                    'name' => $hod->name
                ]);
                $users = $users->merge($hods);
                // dd($users);
            }
            if ($roles->contains('coordinator') || $roles->contains('hod')) {
                $deans = User::role('dean')->get()->map(fn ($dean) => [
                    'id' => $dean->id,
                    'name' => $dean->name
                ]);
                $users = $users->merge($deans);
                $lecturers = $user->subordinate_lecturers()->map(fn ($lecturer) => [
                    'id' => $lecturer->id,
                    'name' => $lecturer->name
                ]);
                $users = $users->merge($lecturers);

                $programmes = $user->department->programmes;
                foreach($programmes as $programme) {
                    $students = $programme->users->map(fn($student) => [
                        'id' => $student->id,
                        'name' => $student->name
                    ]);
                    $users = $users->merge($students);
                }
            }
            if ($roles->contains('lecturer')) {
                $courses = $user->courses;
                foreach ($courses as $course) {
                    $programmes = $course->programmes;
                    foreach ($programmes as $programme) {
                        $students = $programme->users->map(fn ($student) => [
                            'id' => $student->id,
                            'name' => $student->name
                        ]);
                        $users = $users->merge($students);
                    }
                }

                $hods = User::role('hod')->get()->map(fn ($hod) => [
                    'id' => $hod->id,
                    'name' => $hod->name
                ]);
                $users = $users->merge($hods);

                $deans = User::role('dean')->get()->map(fn ($dean) => [
                    'id' => $dean->id,
                    'name' => $dean->name
                ]);
                $users = $users->merge($deans);
            }
            return Inertia::render('backend/requests/Create', ['users' => $users, 'subject' => $thread_subject, 'user' => $request->user]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('create requests')) {
            $request_arr = $request->validate([
                'subject' => 'required|min:3|max:255',
                'recipient' => 'required',
                'through' => 'sometimes',
                'body' => 'required|file|mimes:docx,doc,pdf'
            ]);
            // dd($request_arr['through']);
            $doc = $request->file('body');
            $filename = now() . $doc->getClientOriginalName();
            $location = storage_path('app/public/');
            // dd($location);
            $doc->move($location, $filename);


            $thread = Thread::create([
                'subject' => $request_arr['subject'],
            ]);

            // Message
            Message::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
                'type' => 'file',
                'body' => $filename,
            ]);
            // Sender
            Participant::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
                'type' => 'sender',            
                'last_read' => new Carbon(),
            ]);


            $thread->addParticipant($request_arr['recipient']);

            return Redirect::route('requests.index');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (auth()->user()->can('read requests')) {
            $thread = Thread::findOrFail($id);
            $thread_arr = ['id' => $thread->id, 'subject' => $thread->subject, 'created_at' => $thread->created_at->diffForHumans()];
            // dd($thread->messages);
            $message = $thread->messages[0]->body;
            $sender = $thread->messages[0]->user()->get()[0];
            $user = Auth::id();
            if ($thread->isUnread($user)) {
                $thread->markAsRead($user);
            }
            // dd($thread->created_at->diffForHumans());

            return Inertia::render('backend/requests/Show', [
                'thread' => $thread_arr,
                'sender' => $sender, 'message' => public_path($message)
            ]);
        } else {
            abort(403, 'Unauthorized Action');
        }
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
    }
}
