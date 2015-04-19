<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\Invoice;
use CRM\Invoice_Item;
use CRM\Client;

use CRM\Http\Requests\InvoiceRequest;

use Illuminate\Http\Request;

class InvoiceController extends Controller {

    /**
     * Inject some Middleware
     *
     */
    public function __construct()
    {
        //$this->middleware('admin',['except'=>'index']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $invoices = Invoice::all();

        $title = 'All Invoices';

        $subtitle = "view and update invoices records";

		return view('invoices.index', compact('invoices', 'title','subtitle'));
	}

    public function completedInvoices()
    {
        $invoices = Invoice::completed()->get();

        $title = 'All Settled Invoices';

        $subtitle = "view and update invoices records";

        return view('invoices.index', compact('invoices', 'title', 'subtitle'));
    }

    public function pendingInvoices()
    {
        $invoices = Invoice::pending()->get();

        $title = 'All Pending Invoices';

        $subtitle = "view and update invoices records";

        return view('invoices.index', compact('invoices', 'title', 'subtitle'));
    }

    public function all()
    {
        $overdueinvoices = Invoice::overdue()->get();
        $todayinvoices = Invoice::today()->get();
        $tomorrowinvoices = Invoice::tomorrow()->get();
        $thisweekinvoices = Invoice::thisWeek()->get();
        $nextweekinvoices = Invoice::nextWeek()->get();
        $thismonthinvoices = Invoice::thisMonth()->get();
        $nextmonthinvoices = Invoice::nextMonth()->get();
        $otherinvoices = Invoice::Other()->get();

        $title = 'All Invoices';

        $subtitle = "view and update invoices records per time";

        return view('invoices.all', compact('overdueinvoices','todayinvoices','tomorrowinvoices','thisweekinvoices','nextweekinvoices','thismonthinvoices','nextmonthinvoices','otherinvoices', 'title', 'subtitle'));
    }

    public function updateStatus(Invoice $invoice)
    {
        if($invoice->status){
            $invoice->status = false;
        } else {
            $invoice->status = true;
        }

        $invoice->save();

        return redirect('invoices')->with('success','Invoice Status Updated Successfully');
    }

    public function getClientServices(InvoiceRequest $request)
    {
        $client = Client::find($request->get('client_id'));

        $data = $client->client_service()->get();

        $invoice = new Invoice;

        $title = 'Create New Invoice';

        $subtitle = "create a new invoice record";

        $frequency = [0=>'Just Once', 1=>'Monthly', 3=>'After 3 Months', 6=>'After 6 Months', 12=>'Yearly'];

        return view('invoices.newinvoice', compact('data', 'invoice', 'title','subtitle', 'client','frequency'));

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Client $client)
	{
        $clients = Client::get(['company','firstname','lastname','id'])->lists('fullnameAndCompany','id');

        $title = 'Create New Invoice';

        $subtitle = "create a new invoice record";


        return view('invoices.create', compact('client', 'title','subtitle', 'clients','frequency'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(InvoiceRequest $request)
	{
        //dd($request->all());

        //protected $fillable = ['client_id','date_due','comments','frequency','total','status'];

        $invoice = new Invoice();

        $request = $request->all();

        $request['total'] = array_sum($request['client_service_id']);

        $invoice->create($request);

        $inv = \DB::getPdo()->lastInsertId();

        foreach($request['client_service_id'] as $key => $charge){

            $data = [
                'client_id' => $request['client_id'],
                'invoice_id' => $inv,
                'client_service_id' => $key,
                'charge' => $charge
            ];

            Invoice_Item::create($data);
        }

        return redirect('invoices')->with('success','Invoice Created Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Invoice $invoice)
	{
        $title = 'Invoice Profile';

        $subtitle = "display an Invoice record";

        return view('invoices.show', compact('invoice', 'title','subtitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Invoice $invoice)
	{
        $title = 'Update Invoice';

        $subtitle = "update a domain record";

        return view('invoices.update', compact('invoice', 'title','subtitle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Invoice $invoice, InvoiceRequest $request)
	{
       $invoice->update($request->all());

        return redirect('invoices')->with('success','Invoice Updated Successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Invoice $invoice)
    {
        $invoice->invoiceItems->delete();

        $invoice->delete();

        return redirect('invoices')->with('success','Invoice Deleted Successfully');
	}

}
