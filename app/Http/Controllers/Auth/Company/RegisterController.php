<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Company\RegisterRequest;
use App\Models\Company;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.company.register');
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $company = Company::create($validatedData);

        return response()->json($company);
    }
}
