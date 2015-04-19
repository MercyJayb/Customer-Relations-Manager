<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\Project;
use CRM\Client;

use CRM\Http\Requests\ProjectRequest;

use Illuminate\Http\Request;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();

        $title = 'All Projects';

        $subtitle = "view and update projects records";

		return view('projects.index', compact('projects','title','subtitle'));
	}

    public function completedProjects()
    {
        $projects = Project::completed()->get();

        $title = 'Completed Projects';

        $subtitle = "view and update completed projects";

        return view('projects.index', compact('projects','title','subtitle'));
    }

    public function pendingProjects()
    {
        $projects = Project::pending()->get();

        $title = 'Pending Projects';

        $subtitle = "view and update pending projects";

        return view('projects.index', compact('projects','title','subtitle'));
    }



    public function updateStatus(Project $project)
    {
        if($project->status){
            $project->status = false;
        } else {
            $project->status = true;
        }

        $project->save();

        return redirect('projects')->with('success','Project Status Updated Successfully');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Project $project)
	{
		$clients = Client::get(['company','firstname','lastname','id'])->lists('fullnameAndCompany','id');

        $title = 'Create Project';

        $subtitle = "create a new project record";

		return view('projects.create', compact('project', 'clients', 'title', 'subtitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Project $project, ProjectRequest $request)
	{
		$data = [
			'client_id' => $request->get('client_id'),
			'user_id' => 1,
			'title' => $request->get('title'),
			'description' => $request->get('description'),
			'start_at' => $request->get('start_at'),
			'end_at' => $request->get('end_at'),
			'status' => false
		];

		$project->create($data);

		return redirect('projects')->with('success', 'Project Created Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Project $project)
	{
		$title = 'Project Profile';

        $subtitle = "display a project record";

		return view('projects.show', compact('project','title','subtitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Project $project)
	{
		$clients = Client::get(['company','firstname','lastname','id'])->lists('fullnameAndCompany','id');

        $title = 'Update Project';

        $subtitle = "update a project record";

		return view('projects.update', compact('project', 'clients', 'title','subtitle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Project $project, ProjectRequest $request)
	{
		$project->update($request->except('_method','_token'));

		return redirect('projects')->with('success', 'Project Updated Successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Project $project)
	{
		$project->delete();

		return redirect('projects')->with('success', 'Project Deleted Successfully');
	}

}
