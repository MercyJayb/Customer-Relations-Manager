<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\Domain;
use CRM\Client;

use Carbon\Carbon;

use CRM\Http\Requests\DomainRequest;

use Illuminate\Http\Request;

class DomainController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth', $except=['index']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$domains = Domain::all();

        $title = 'All Domains';

        $subtitle = "view and update domains records";

		return view('domains.index', compact('domains', 'title','subtitle'));
	}

    public function domainsOlderThanOneYear()
    {
        $domains = Domain::OlderThanOneYear()->get();

        $title = 'Domains older than 1 year';

        $subtitle = "view and update domains older than 1 year";

        return view('domains.index', compact('domains', 'title','subtitle'));
    }

    public function domainsExpiringThisMonth()
    {
        $domains = Domain::expiresThisMonth()->unpaid()->get();

        $title = 'Domains expiring this month';

        $subtitle = "view and update domains expiring this month";

        return view('domains.index', compact('domains', 'title','subtitle'));
    }

    public function revenues()
    {
        $title = 'Revenue';

        $subtitle = "view revenue collections";

        $revenues = [];

        foreach(range(1,12) as $i){
            $revenues[] =  Domain::RevenueCollected($i)->count(); //->sum('id');
        }

        return view('revenue.index', compact('revenues','title','subtitle'));
    }

    public function domainsExpired()
    {
        $domains = Domain::unpaid()->get();

        $title = 'Expired Domains';

        $subtitle = "view and update expired domains";

        return view('domains.index', compact('domains', 'title','subtitle'));
    }

    public function domainsDeleted()
    {
        $domains = Domain::onlyTrashed()->get();

        $title = 'Deleted Domains';

        $subtitle = "view and restore deleted domains";

        return view('domains.deleted', compact('domains', 'title','subtitle'));
    }

    public function restore($id)
    {
        Domain::onlyTrashed()->where('id', $id)->restore();

        return redirect()->back()->with('success','Domain has been restored');
    }

    public function updatePayment(Domain $domain)
    {
        //$domain = Domain::findOrFail($id)->get();

        ($domain->paid) ? $domain->paid = FALSE : $domain->paid = TRUE;

        $domain->save();

        return redirect()->back()->with('success', 'Payment has been updated');
    }

    public function domainsActive()
    {
        $domains = Domain::active()->get();

        $title = 'Active Domains';

        $subtitle = "view and update active domains";

        return view('domains.index', compact('domains', 'title','subtitle'));
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Domain $domain)
	{
		$clients = Client::get(['company','firstname','lastname','id'])->lists('fullnameAndCompany','id');

		$method = "POST";

		$title = 'Create New Domain';

        $subtitle = "create a new domain record";

		return view('domains.create', compact('domain', 'clients', 'method', 'title','subtitle'));
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Domain $domain, DomainRequest $request)
	{

		$domain->create($request->all());

		return redirect('domains')->with('success', 'Domain Created Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Domain $domain)
    {
        $title = 'Domain Profile';

        $subtitle = "display a domain record";

        return view('domains.show', compact('domain', 'title','subtitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Domain $domain)
    {
        $clients = Client::get(['company','firstname','lastname','id'])->lists('fullnameAndCompany','id');

		$method = "PUT";

        $title = 'Update Domain';

        $subtitle = "update a domain record";

		return view('domains.update', compact('domain', 'clients', 'method', 'title','subtitle'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Domain $domain, DomainRequest $request)
	{
		$domain->update($request->all());

		return redirect('domains')->with('success', 'Domain Updated Successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Domain $domain)
	{
		$domain->delete();

		return redirect('domains')->with('success', 'Domain Deleted Successfully');
	}

}
