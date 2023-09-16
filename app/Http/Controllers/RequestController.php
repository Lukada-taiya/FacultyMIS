<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
// use Cmgmyr\Messenger\Models\Message;
// use Cmgmyr\Messenger\Models\Participant;
use App\Models\Message;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Cmgmyr\Messenger\Models\Thread;
use App\Models\Thread;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
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
            $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
            // dd($threads->participants());
            $new_threads = new Collection();
            foreach ($threads as $thread) {
                // dd($thread->messages->where('type', 'file')->get(0)->priority);
                $p_record = $thread->getParticipantFromUser($user);
                $message_priority = $thread->priority;
                // dd($p_record);
                if ($p_record->type == 'sender') {
                    // dd($new_threads);
                    $new_threads = $new_threads->push($thread);
                } else if ($p_record->type == 'approver') {
                    if ($message_priority == $p_record->approve_priority) {
                        $thread->approval = false;
                        $new_threads = $new_threads->push($thread);
                    } else if ($message_priority > $p_record->approve_priority || $message_priority == 'approved') {
                        $thread->approval = true;
                        $new_threads = $new_threads->push($thread);
                    }
                } else if ($message_priority == 'approved') {
                    $new_threads = $new_threads->push($thread);
                }
            }
            $threads = $new_threads->map(fn ($thread) => [
                'id' => $thread->id,
                'subject' => $thread->subject,
                'created_at' => $thread->created_at->diffForHumans(),
                'sender' => array(
                    'id' => $thread->creator()->id,
                    'name' => $thread->creator()->name,
                    'profile_pic' => $thread->creator()->profile_photo_path,
                ),
                'isUnread' => $thread->isUnread($user),
                'approval' => $thread->approval
            ]);
            // $messages = Message::where('user_id', '=', Auth::id());

            return Inertia::render('backend/requests/Index', ['threads' => $threads]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    public function requestView(Request $request)
    {
        $pdf = Pdf::loadView('pdf.view', ['html' => $request->data]);
        return $pdf->stream('preview.pdf');
    }

    public function addRemark(Request $request)
    {
        $results = $request->validate([
            'threadId' => 'required',
            'remark' => 'required'
        ]);
        // dd($results);

        Message::create([
            'thread_id' => $results['threadId'],
            'user_id' => Auth::user()->id,
            'body' => $results['remark'],
            'type' => 'remark',
        ]);
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
                foreach ($programmes as $programme) {
                    $students = $programme->users->map(fn ($student) => [
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
            if ($roles->contains('administrator') || $roles->contains('dean')) {
                $users = User::role(['dean', 'administrator', 'coordinator', 'hod', 'lecturer', 'student', 'guest'])->get()->map(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name
                ]);
            }
            return Inertia::render('backend/requests/Create', ['users' => $users, 'subject' => $thread_subject, 'user' => $request->user]);
        } else {
            abort(403, 'Unauthorized Action');
        }
        $users = User::all()->map(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name
        ]);
        return Inertia::render('backend/requests/Create', ['users' => $users]);
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
                'body' => 'required|min:10'
            ]);
            // dd($request_arr['through']);
            // $doc = $request->file('body');
            // $filename = now() . " " . $request_arr['subject'] . '.pdf';
            // $location = storage_path('app/public/');
            // $doc->move($location, $filename); 
            // dd($request_arr['through']);
            // $pdf = App::make('dompdf.wrapper');
            // $pdf->loadHTML($request_arr['body']);
            // $pdf->save($location . $filename);

            $thread = Thread::create([
                'subject' => $request_arr['subject'],
                'priority' => count($request_arr['through']) > 0 ? '1' : 'approved'
            ]);

            // Message
            Message::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
                'body' => $request_arr['body'],
                'type' => 'file',
            ]);
            // Sender
            Participant::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
                'type' => 'sender',
                'last_read' => new Carbon(),
            ]);
            if (count($request_arr['through']) > 0) {
                $count = 1;
                foreach ($request_arr['through'] as $approver) {
                    Participant::create([
                        'thread_id' => $thread->id,
                        'user_id' => $approver,
                        'type' => 'approver',
                        'approve_priority' => $count,
                    ]);
                    $count++;
                }
            }

            Participant::create([
                'thread_id' => $thread->id,
                'user_id' => $request_arr['recipient'],
                'type' => 'receiver',
            ]);

            // $thread->addParticipant($request_arr['recipient']);

            return Redirect::route('requests.index');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    public function approveRequest(Request $request)
    {
        if (auth()->user()->can('read requests')) {
            $thread = Thread::findOrFail($request->thread);
            $approvers = $thread->participants->where('type', 'approver');
            $user = Auth::id();
            $approver = $thread->getParticipantFromUser($user);
            $message_priority = $thread->priority;
            if ($approver->approve_priority == $message_priority) {
                if ($approver->approve_priority == count($approvers)) {
                    $thread->priority = 'approved';
                    $thread->save();
                } else if ($approver->approve_priority < count($approvers)) {
                    $thread->priority++;
                    $thread->save();
                }
            }

            if ($thread->isUnread($user)) {
                $thread->markAsRead($user);
            }

            return Redirect::route('requests.index');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        if (auth()->user()->can('read requests')) {
            $thread = Thread::findOrFail($id);
            $thread_arr = ['id' => $thread->id, 'subject' => $thread->subject, 'created_at' => $thread->created_at->diffForHumans()];
            $remarks = $thread->messages->where('type', 'remark')->map(fn ($message) => [
                'id' => $message->id,
                'body' => $message->body,
                'sender' => [
                    'id' => $message->user->id,
                    'name' => $message->user->name
                ],
                'date_created' => $message->created_at->diffForHumans()
            ]);
            $request_object = $thread->messages->where('type', 'file')->first();
            // dd($request_object->body);
            $sender = $thread->creator();
            $user = Auth::id();
            if ($request->approvalRequest == "null") {
                if ($thread->isUnread($user)) {
                    $thread->markAsRead($user);
                }
            }
            // dd($request->approvalRequest == "null");
            return Inertia::render('backend/requests/Show', [
                'thread' => $thread_arr,
                'sender' => $sender, 'remarks' => $remarks,
                'request' => $request_object->body,
                'approved' => $request->approvalRequest
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
        $message_col = Message::where('thread_id', $id)->where('type', 'file')->first(); 
        $message = ['id' => $message_col->id, 'body' => $message_col->body];
        return Inertia::render('backend/requests/Edit',['message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = $request->validate([
            'body' => 'required|min:5'
        ]);
        $message = Message::findOrFail($id);

        $message->body = $result['body'];
        $message->save();

        return Redirect::route('requests.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
