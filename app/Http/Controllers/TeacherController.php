<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TeacherController extends BaseController
{
    protected $teacher;
    public function __construct(){
        $this->teacher = new Teacher();
        
    }
    public function index()
    {
        $response['teachers'] = $this->teacher->all();
        return view('pages.teacherindex')->with($response);
    }
    
    public function store(Request $request)
    {
      
        $this->teacher->create($request->all());
        return redirect()->back();
    }
  
    public function edit(string $id)
    {
        $response['teacher'] = $this->teacher->find($id);
        return view('pages.teacheredit')->with($response);
    }
    public function update(Request $request, string $id)
    {
        $teacher = $this->teacher->find($id);
        $teacher->update(array_merge($teacher->toArray(), $request->toArray()));
        return redirect('teacher');
    }
    public function destroy(string $id)
    {
        $teacher = $this->teacher->find($id);
        $teacher->delete();
        return redirect('teacher');
    }
}
