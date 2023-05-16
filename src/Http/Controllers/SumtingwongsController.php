<?php

namespace Athphane\Sumtingwong\Http\Controllers;

use Athphane\Sumtingwong\Http\Middlewares\Authenticate;
use Athphane\Sumtingwong\Models\SumtingwongRecord;
use Illuminate\Routing\Controller;

class SumtingwongsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function index()
    {
        $sumtingwongs = SumtingwongRecord::orderByHighSeverity()->latest()->get();

        return view('sumtingwong::index', compact('sumtingwongs'));
    }

    public function show($id)
    {
        $sumtingwong = SumtingwongRecord::findOrFail($id);

        return view('sumtingwong::show', compact('sumtingwong'));
    }

    public function latest()
    {
        return redirect()->to(route('sumtingwongs.show', SumtingwongRecord::latestEntry()->id));
    }
}
