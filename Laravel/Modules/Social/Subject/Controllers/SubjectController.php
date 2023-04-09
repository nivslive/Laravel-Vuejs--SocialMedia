<?php

namespace Modules\Social\Subject\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Subject, Dashboard, Photo};
use App\Http\Services\SubjectService;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
class SubjectController extends Controller
{
    public function delete(Request $request, Subject $subject) {
        $subject->delete();
        return redirect()->back();
    }

    public function put(Request $request, Subject $subject) {
        $subject->update($request->all());
        return redirect()->back();
    }

    public function onlyBySlug($slug) {
        $subject = Subject::where('slug', $slug)->firstOrFail();
        return response()->json([
            'Subject' => $subject
        ]);
    }

    public function onlyByLastWeek() {
        $subject = Subject::all();
        return response()->json([
            'Subject' => $subject
        ]);

    }
    public function onlyById($id) {
        $subject = Subject::findOrFail($id);
        return response()->json([
            'Subject' => $subject
        ]);
    }

    public function all() {
        $subjects = Subject::all();
        return response()->json([
            'Subjects' => $subjects
        ]);
    }
    public function allWithSubjects() {
        $subjects = Subject::with('subjects')->get();
        return response()->json([
            'Subjects' => $subjects
        ]);
    }

    public function index() {
        return Subject::all();
    }

    public function store(Request $request) {
        $request->merge(['slug' =>Str::slug($request->title)]);
        //dd($request->all());
        /*$request = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:300',
            'user_id' => 'required|numeric',
            'chat_id' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);*/
        //dd($request);
         // Obtenha o arquivo enviado via post
         $avatar = $request->file('photo');
         // Defina um nome para o arquivo

         if(Auth()->user() !== null) {
             
            $user_id = Auth()->user()->id;
            $pathname = 'pictures/social/subjects';
            $filename = time() . '_' . 'subject_pic_user'. $user_id . '.' . $avatar->getClientOriginalExtension();

            $avatar->move(public_path($pathname), $filename); 
            $src = $pathname . $filename;
            $photo = Photo::create(['src' => $src, 'user_id' => $user_id]);
            $request->merge(['photo_id' => $photo->id]);      
            //dd($request->all());
            $data = Subject::create($request->all());
            return response()->json(['message' => 'sucesso', 'data' => $data, 'status' => 200]); 
         }
         return response()->json(['message' => 'erro', 'status' => 400]); 
    }
}
