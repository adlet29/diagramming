<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\laba;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # select
        $labas = laba::where('user_id', Auth::user()->id)->get();
        $students = User::where('role_id', 2)->get();
        # end select

        # table
        $tasks = Task::where('teacher_id', Auth::user()->id)->get();

        foreach ($tasks as $k => $task) {
            $tasks[$k]['student_fio'] = '';
            foreach ($students as $student) {
                if ($task['student_id'] == $student['id']) {
                    $tasks[$k]['student_fio'] = $student['name'];
                }
            }
            $tasks[$k]['laba_name'] = '';
            foreach ($labas as $laba) {
                if ($task['laba_id'] == $laba['id']) {
                    $tasks[$k]['laba_name'] = $laba['name'];

                }
            }

        }
        # end table
        return view('teacher.tasks', [
            'labas' => $labas,
            'students' => $students,
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (isset($request->laba_id) && isset($request->student_id) && $request->date) {
            Task::create([
                'teacher_id' => Auth::user()->id,
                'student_id'=> $request->student_id,
                'laba_id' => $request->laba_id,
                'parent_id' => null,
                'status' => 'open',
                'point' => null,
                'deadline' => date("Y-m-d", strtotime($request->date))
            ]);
            return redirect('teacher/tasks');
        }

        dd('Error 404');
    }

    public function point(Request $request)
    {
        if (!isset($request->point)) {
            print_r("Выберите баллы!");
            die();
        }

        if (isset($request->task_id) && isset($request->point)) {
            $task = Task::find($request->task_id);
            $task->point = (int)$request->point;
            $task->status = 'archive';
            $task->save();
            return redirect('teacher/tasks');
        }

        dd('Error 404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        # select
        $labas = laba::where('user_id', Auth::user()->id)->get();
        $students = User::where('role_id', 2)->get();
        # end select

        # table
        $tasks = Task::where('teacher_id', Auth::user()->id)->get();

        $report = [];
        foreach ($tasks as $k => $task) {
            if ($task->status == 'archive') {
                $report[$k]['point'] = $task->point;
                $report[$k]['student_fio'] = '';
                foreach ($students as $student) {
                    if ($task['student_id'] == $student['id']) {
                        $report[$k]['student_fio'] = $student['name'];
                    }
                }
                $report[$k]['laba_name'] = '';
                foreach ($labas as $laba) {
                    if ($task['laba_id'] == $laba['id']) {
                        $report[$k]['laba_name'] = $laba['name'];
                    }
                }
            }


        }
        # end table
        return view('teacher.report', [
            'report' => $report
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
