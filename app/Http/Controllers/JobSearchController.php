<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    public function search(Request $request){
        $request->validate([
            'keyword' => ['required', 'string', 'max:255'],
        ]);

        return redirect()->route('all.jobs', [
            'keyword' => $request->input('keyword')
        ]);
    }
}
