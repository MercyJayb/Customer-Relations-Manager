<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\Service;

use CRM\Http\Requests\ServiceRequest;

use Illuminate\Http\Request;

class ServiceController extends Controller {

	/**
	 *
	 * @return Response
	 */
	public function index()
    {
        $services = Service::all();

        $title = 'All Services';

        $subtitle = "view and update services records";

        return view('services.index', compact('services', 'title','subtitle'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return object
	 */
	public function create(Service $service)
	{
        $title = 'Create Service';

        $subtitle = "create a new service record";

		return view('services.create', compact('service', 'title','subtitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Service $service, ServiceRequest $request)
	{
        $service->create($request->all());

		return redirect('services')->with('success', 'Service Created Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Service $service)
	{
        $title = 'Service Profile';

        $subtitle = "display a service record";

		return view('services.show', compact('service','title','subtitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Service $service)
	{
        $title = 'Update Service';

        $subtitle = "update a service record";

        return view('services.update', compact('service','title','subtitle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Service $service, ServiceRequest $request)
	{
		$service->update($request->all());

		return redirect('services')->with('success', 'Service Updated Successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Service $service)
	{
		$service->delete();

		return redirect('services')->with('success', 'Service Deleted Successfully');
	}

}
