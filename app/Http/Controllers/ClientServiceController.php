<?php namespace CRM\Http\Controllers;

use CRM\ClientService;
use CRM\Http\Requests;
use CRM\Client;
use CRM\Invoice;
use CRM\Invoice_Records;
use CRM\Service;

use Carbon\Carbon;

use CRM\Http\Controllers\Controller;

use Illuminate\Http\Request;

use CRM\Http\Requests\ClientServiceRequest;

class ClientServiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addServiceToClient(Client $client)
    {
        $title = 'Add a client service';

        $subtitle = 'add a client service record';

        $frequency = [
            90  => 'After 3 months',
            180 => 'After 6 Months',
            270 => 'After 9 months',
            365 => 'Yearly'
        ];

        //$service = $client->client_service;

        $servicelist = Service::lists('name','id');

		return view('clients.addservice', compact('client', 'title', 'subtitle', 'servicelist', 'frequency'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Client $client, ClientServiceRequest $request)
	{
        $request = $request->all();

        $request['client_id'] = $client->id;

		$client->client_service()->create($request);

        //Generate an invoice
        Invoice_Records::create([
            'invoice_id' => 8212,
            'client_service_id' => \DB::getPdo()->lastInsertId(),
            'client_id' => $client->id,
            'total' => $request['cost'],
            'tax' => 16,
            'tax_details' => 'VAT',
            'due_date' => $request['start_date']
        ]);

        return redirect('clients/'.$client->id)->with('success','Service Added Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(ClientService $clientservice)
	{
		$title = 'Update a client service';

        $client = $clientservice->client;

        $subtitle = 'update a client service record';

        $frequency = [
            90  => 'After 3 months',
            180 => 'After 6 Months',
            270 => 'After 9 months',
            365 => 'Yearly'
        ];

        return view('clients.updateservice', compact('title', 'subtitle', 'client', 'clientservice', 'frequency'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ClientService $service, ClientServiceRequest $request)
	{
		$service->update($request->all());

        //Generate an invoice
        Invoice_Records::where('client_service_id', $service->id)->update([
            'total' => $request->cost,
            'due_date' => $request->start_date
        ]);

        return redirect('clients/'.$service->client->id)->with('success','Client Service Updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(ClientService $service)
	{
		$service->delete();

        return redirect()->back()->with('success','Client Service deleted successfully');
	}

}
