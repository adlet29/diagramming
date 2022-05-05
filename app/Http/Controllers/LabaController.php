<?php

namespace App\Http\Controllers;

use App\Models\laba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LabaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function plank()
    {
        return view('plank.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dict = ['1' => 'Физика', '2' => 'Химия', '3' => 'Биология'];
        $subj_id = Auth::user()->subject;
        $subject = $dict[$subj_id];
        $labas = laba::where('user_id', Auth::user()->id)->get();
        return view('teacher.labas', ['subject' => $subject, 'list'=>$labas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['warning' => true, 'message' => 'Укажите имя Лабы']);
        }

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'json' => $request->graph
        ];

         $laba_id = laba::create($data)->id;
         if ($laba_id > 0) {
             return response()->json(['success' => true, 'message' => 'Успех']);
         }

        return response()->json(['warning' => true, 'message' => 'Ошибка!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function show($laba_id)
    {
        $laba = laba::where('id', $laba_id)->get()[0];
        return view('teacher.labs.show', ['laba' => $laba]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function edit(laba $laba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laba $laba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function destroy(laba $laba)
    {
        //
    }
}
