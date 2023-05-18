<?php

namespace Athphane\Sumtingwong\Http\Controllers;

use Athphane\Sumtingwong\Http\Middlewares\Authenticate;
use Athphane\Sumtingwong\Models\SumtingwongRecord;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SumtingwongsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function index(Request $request)
    {
        $sumtingwongs = SumtingwongRecord::when($request->query->has('orderBy') && $request->query('orderBy') === 'severity',
            fn(Builder $query) => $query->orderBySeverity()
        )->when(!$request->query->has('orderBy') || $request->query('orderBy') !== 'severity',
            fn(Builder $query) => $query->latest()
        );

        $sumtingwongs = $sumtingwongs->paginate(20);

        return view('sumtingwong::index', compact('sumtingwongs'));
    }

    public function show($id)
    {
        $sumtingwong = SumtingwongRecord::findOrFail($id);

        return view('sumtingwong::show', compact('sumtingwong'));
    }

    public function update($id, Request $request)
    {
        // check if input action is 'mark_resolved' via a switch statement and then approve it
        $sumtingwong = SumtingwongRecord::findOrFail($id);

        switch ($request->input('action')) {
            case 'mark_addressed':
                $sumtingwong->update([
                    'addressed_at' => now(),
                ]);
                break;
            case 'mark_not_addressed':
                $sumtingwong->update([
                    'addressed_at' => null,
                ]);
                break;
        }

        return redirect()->back()->with([
            'success' => 'Sumtingwong record updated successfully!',
        ]);
    }

    public function latest()
    {
        return redirect()->to(route('sumtingwongs.show', SumtingwongRecord::latestEntry()->id));
    }
}
