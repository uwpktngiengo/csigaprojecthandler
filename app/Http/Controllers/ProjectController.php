<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = project::latest('ID')->paginate(10);
        return view('projects.index', compact('projects'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
			'description' => 'required',
			'status' => 'required'
        ]);

        project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
		$changes = $project->getChanges();
		$msg = "A given project has changed with these parameters: " . json_encode($changes);
        $msg = wordwrap($msg, 70);

        $str = $project->contacts;
        $arrayOfContactIDs = explode(',', $str);
		foreach($arrayOfContactIDs as $givenContactID) {
            $emailAddress = DB::table('contact')->select('email')->where('ID', $givenContactID)->get()->first()->email;
		    // mail($emailAddress, "project has changed", $msg); // TODO set SMTP-server
		}

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $request->validate([
            'name' => 'required',
			'description' => 'required',
			'status' => 'required'
        ]);
        $project->update($request->all());
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
