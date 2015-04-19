<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\Client;

use CRM\Http\Requests\ClientRequest;

use Illuminate\Http\Request;

class ClientController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all();

        $title = "All Clients";

        $subtitle = "view and update clients records";

		return view('clients.index', compact('clients', 'title','subtitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Client $client)
	{
        $title = "Create New Client";

        $subtitle = "create a new client record";

		return view('clients.create', compact('client','title', 'subtitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Client $client, ClientRequest $request)
	{
		$client->create($request->all());

		return redirect('clients')->with('success', 'Client Created Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Client $client)
	{
        $title = "Client Profile";

        $subtitle = "display a client record";

		return view('clients.show', compact('client','title', 'subtitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Client $client)
	{
        $title = "Update Client";

        $subtitle = "update a client record";

		return view('clients.update', compact('client','title', 'subtitle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Client $client, ClientRequest $request)
	{
		//dd($request->all());

        $client->update($request->all());

		return redirect('clients')->with('success', 'Client Updated Successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Client $client)
	{
		$client->delete();

		return redirect('clients')->with('success', 'Client Deleted Successfully');
	}

}
