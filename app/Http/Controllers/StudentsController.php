<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB; //kaylangan ni para mag gana ang custom nga query

class StudentsController extends Controller
{
    public function index()
    {

        // $data = Students::where('age', '>', 19)->orderBy('first_name', 'desc')->limit(5)->get();

        //$data = Students::where('id',3)->get();

        //$data = Students::where('first_name','like', '%le%')->get();

        //$data = Students::where('age','>', 19)->get();

        //$data = Students::where('age','>', 19)->orderBy('first_name', 'desc')->get();

        //$data = Students::where('age','>', 19)->orderBy('first_name', 'desc')->limit(5)->get();

        //$data = DB::table('students')->select(DB: raw('count(*) as gender_count, gender'))->groupBy('gender')->get();

        // $data = DB::table('students')->select(DB::raw('count(*) as gender_count, gender'))->groupBy('gender')->get();

        // $data = Students::where('id', 1000) -> firstOrFail()->get();

        // $data = Students::all(); ,['students' => $data]

        $data = array("students" => DB::table('students')->orderBy('created_at','desc')->simplePaginate(10));
        return view('students.index', $data);

    }

    public function show($id){

        $data = Students::findOrFail($id);
        // dd($data);
        return view('students.edit', ['student' => $data]);
    }


    public function create(){
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required', 'max:3'],
            "email" => ['required', 'email', Rule::unique('students', 'email')],
         

        ]);

        Students::create($validated);

        return redirect('/')->with('message', 'New student was added successfully');
    }

    public function update(Request $request, $id){

        $user = Students::find($id);

        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->save();
    
        return redirect('/')->with('message', 'New student was updated successfully');
        
        // $validated = $request->validate([
        //     "first_name" => ['required', 'min:4'],
        //     "last_name" => ['required', 'min:4'],
        //     "gender" => ['required'],
        //     "age" => ['required'],
        //     "email" => ['required', 'email']
            
        // ]);
        
        // $student->update($validated);
        // return back()->with('message', 'Data was successfully updated');

        // if(DB::table('Students')->update($validated)){
        //     return back()->with('message', 'Data was successfully updated');
        //  } else {
        //     return back()->with('message', 'failed');
        //  }
        
       
        //  dd($request);
    }
    public function destroy($id){
        
        $user = Students::find($id);
        // print_r($user);
        $user->delete();
    
        return redirect('/')->with('message', 'New student was deleted successfully');

    }

}