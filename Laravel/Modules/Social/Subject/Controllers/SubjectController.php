<?php

namespace Modules\Social\Subject\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Reaction, Message, Subject, Dashboard};
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
        dd('oi');
        return Subject::all();
    }

    public function store(Request $request) {

        $request->merge(['slug' =>Str::slug($request->title)]);
        $request = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:300',
            'user_id' => 'required|numeric',
            'chat_id' => 'required|numeric',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        dd($request);
         // Obtenha o arquivo enviado via post
         $avatar = $request->file('avatar');

         // Defina um nome para o arquivo
         $filename = time() . '.' . $avatar->getClientOriginalExtension();
        dd($filename);
         // Salve o arquivo no diretório desejado
         $avatar->move(public_path('avatars'), $filename);
 
         // Salve o nome do arquivo no banco de dados para referência futura
         // $filename
        dd($avatar);
        Subject::create($request);
        return redirect()->back();
    }
}
