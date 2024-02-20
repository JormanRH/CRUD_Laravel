<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::paginate(5);//all
        return view('student.index')->with('students', $student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "DNI: " . $request['dni'];
        //exit();
        $request->validate([
            'DNI' => 'required|max:9',
            'name' => 'required|max:15',
            'lastName' => 'required|max:15',
            'subject' => 'required|max:20',
            'grade1' => 'required|gte:50',//gte: mayor o igual a
            'grade2' => 'required|gte:50',
            'grade3' => 'required|gte:50'
        ]);
        
        $finalGrade = ($request['grade1'] + $request['grade2'] + $request['grade3'])/3;
        
        $Student = new Student();
        $Student->DNI = $request['DNI'];
        $Student->name = $request['name'];
        $Student->lastName = $request['lastName'];
        $Student->subject = $request['subject'];
        $Student->grade1 = $request['grade1'];
        $Student->grade2 = $request['grade3'];
        $Student->grade3 = $request['grade3'];
        $Student->finalGrade = $finalGrade;
        $Student->save();
        //$Student = Student::create($request->only('DNI', 'name', 'lastName', 'subject', 'grade1','grade2', 'grade3', $finalGrade));
        
        Session::flash('Mensaje', 'Registro creado con éxito!');
        
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('Student.form')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'DNI' => 'required|max:9',
            'name' => 'required|max:15',
            'lastName' => 'required|max:15',
            'subject' => 'required|max:20',
            'grade1' => 'required|gte:50',//gte: mayor o igual a
            'grade2' => 'required|gte:50',
            'grade3' => 'required|gte:50'
        ]);
        
        $finalGrade = ($request['grade1'] + $request['grade2'] + $request['grade3'])/3;
        
        $student->DNI = $request['DNI'];
        $student->name = $request['name'];
        $student->lastName = $request['lastName'];
        $student->subject = $request['subject'];
        $student->grade1 = $request['grade1'];
        $student->grade2 = $request['grade3'];
        $student->grade3 = $request['grade3'];
        $student->finalGrade = $finalGrade;
        $student->save();
        //$Student = Student::create($request->only('DNI', 'name', 'lastName', 'subject', 'grade1','grade2', 'grade3', $finalGrade));
        
        Session::flash('Mensaje', 'Registro editado con éxito!');
        
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        Session::flash('Mensaje', 'Registro eliminado con éxito!');
        
        return redirect()->route('student.index');
    }
}
