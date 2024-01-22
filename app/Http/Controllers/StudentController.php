<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    protected $student;
    public function __construct(){
        $this->student = new Student();
        
    }
    public function index()
    {
        $response['students'] = $this->student->all();
        return view('pages.studentindex')->with($response);
    }
    
    public function store(Request $request)
    {
      
        $this->student->create($request->all());
        return redirect()->back();
    }
  
    public function edit(string $id)
    {
        $response['student'] = $this->student->find($id);
        return view('pages.studentedit')->with($response);
    }
    public function update(Request $request, string $id)
    {
        $student = $this->student->find($id);
        $student->update(array_merge($student->toArray(), $request->toArray()));
        return redirect('student');
    }
    public function destroy(string $id)
    {
        $student = $this->student->find($id);
        $student->delete();
        return redirect('student');
    }
}
