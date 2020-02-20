<?php

namespace App\Http\Controllers;

use App\Project;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $projects = Project::all();
        return view('index', compact('setting', 'projects'));
    }

    public function page($id)
    {
        $project = Project::find($id);
        $projects = Project::all();
        $previousID = Project::where('id', '<', $project->id)->max('id');
        $nextID = Project::where('id', '>', $project->id)->min('id');
        $lastID = Project::find(DB::table('projects')->max('id'));
        $firstID = Project::find(DB::table('projects')->min('id'));
        return view('page', compact('project', 'projects','previousID','nextID','lastID','firstID'));
    }

    public function click(Request $request)
    {
        Setting::where('id', 1)
            ->update(['click' => DB::raw('click+1') ]
            );
        return response()->json(['success' => 'Sucesss']);
    }
}
