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
}
