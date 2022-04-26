<?php

namespace App\Http\Controllers;

use App\Models\laba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabaController extends Controller
{
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
        $labs = laba::where('subject_id', $subj_id)->get();
        return view('teacher.labs', ['subject'=>$subject ,'list' => $labs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
