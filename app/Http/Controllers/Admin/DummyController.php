<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dummy;
use Illuminate\Http\Request;

class DummyController extends Controller
{
    public function index()
    {
        $dummies = Dummy::all();
        return view('admin.dummy.index', compact('dummies'));
    }
}
