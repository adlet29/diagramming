<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laba;

class PlankController extends Controller
{
    public function index(Request $request)
    {
        $graph = '';
        if ((int)$request->laba_id > 0) {
            $graph = laba::where('id', $request->laba_id)->get()[0]['json'];
        }
        return view('plank.main', ['graph' => $graph] );
    }

    public function index_v2(Request $request)
    {
        $graph = '';
        if ((int)$request->laba_id > 0) {
            $laba = laba::where('id', $request->laba_id)->get()[0];
            $graph = $laba['json'];
            $name = $laba['name'];
            $description = $laba['description'];
        }
        return view('plank.student', [
            'graph' => $graph,
            'task_id' => $request->task_id,
            'description' => $description,
            'name' => $name
        ]);
    }
}
