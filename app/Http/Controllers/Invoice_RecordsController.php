<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\Invoice_Records;
use Input;
use CRM\Client;

use Carbon\Carbon;

use CRM\Http\Requests\Invoice_RecordsRequest;

use Illuminate\Http\Request;

class Invoice_RecordsController extends Controller {

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
        $invoices = Invoice_Records::all();

        $title = 'All Invoices Records';

        $subtitle = "view and update invoices records";

        return view('invoices.index', compact('invoices', 'title','subtitle'));
    }

    public function settledInvoices()
    {
        $invoices = Invoice_Records::settled()->get();

        $title = 'All Settled Invoice Records';

        $subtitle = "view and update invoices records";

        return view('invoices.index', compact('invoices', 'title', 'subtitle'));
    }

    public function pendingInvoices()
    {
        $invoices = Invoice_Records::pending()->get();

        $title = 'All Pending Invoice Records';

        $subtitle = "view and update invoices records";

        return view('invoices.index', compact('invoices', 'title', 'subtitle'));
    }

    public function all()
    {
        $overdueinvoices = Invoice_Records::overdue()->get();
        $todayinvoices = Invoice_Records::today()->get();
        $tomorrowinvoices = Invoice_Records::tomorrow()->get();
        $thisweekinvoices = Invoice_Records::thisWeek()->get();
        $nextweekinvoices = Invoice_Records::nextWeek()->get();
        $thismonthinvoices = Invoice_Records::thisMonth()->get();
        $nextmonthinvoices = Invoice_Records::nextMonth()->get();
        $nexttwomonthsinvoices = Invoice_Records::nextTwoMonths()->get();
        $nextthreemonthsinvoices = Invoice_Records::nextThreeMonths()->get();
        $nextfourmonthsinvoices = Invoice_Records::nextFourMonths()->get();
        $nextfivemonthsinvoices = Invoice_Records::nextFiveMonths()->get();
        $nextsixmonthsinvoices = Invoice_Records::nextSixMonths()->get();
        $nextsevenmonthsinvoices = Invoice_Records::nextSevenMonths()->get();
        $nexteightmonthsinvoices = Invoice_Records::nextEightMonths()->get();
        $nextninemonthsinvoices = Invoice_Records::nextNineMonths()->get();
        $nexttenmonthsinvoices = Invoice_Records::nextTenMonths()->get();
        $nextelevenmonthsinvoices = Invoice_Records::nextElevenMonths()->get();

        $title = 'All Invoice Records';

        $subtitle = "view all the invoices records per time";

        return view('invoices.all', compact(
            'overdueinvoices',
            'todayinvoices',
            'tomorrowinvoices',
            'thisweekinvoices',
            'nextweekinvoices',
            'thismonthinvoices',
            'nextmonthinvoices',
            'nexttwomonthsinvoices',
            'nextthreemonthsinvoices',
            'nextfourmonthsinvoices',
            'nextfivemonthsinvoices',
            'nextsixmonthsinvoices',
            'nextsevenmonthsinvoices',
            'nexteightmonthsinvoices',
            'nextninemonthsinvoices',
            'nexttenmonthsinvoices',
            'nextelevenmonthsinvoices',

            'title', 'subtitle'));
    }

    private function recreateInvoice($invoice)
    {
        // Create a new invoice from based on the frequency
        if($invoice->client_service->frequency != 0){
            //Generate an invoice
            Invoice_Records::create([
                'invoice_id' => Invoice_Records::nextInvoiceID(),
                'client_service_id' => $invoice->client_service_id,
                'client_id' => $invoice->client_id,
                'total' => $invoice->total,
                'tax_details' => 'VAT',
                'status' => false,
                'due_date' => Carbon::parse($invoice->due_date)->addDays($invoice->client_service->frequency)
            ]);
        }

    }

    public function updateStatus(Invoice_Records $invoice)
    {
        if($invoice->status){
            $invoice->status = false;
            $invoice->save();
        } else {
            $invoice->status = true;
            $invoice->save();

            $this->recreateInvoice($invoice);
        }

        return redirect()->back()->with('success','Invoice Status Updated Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = Invoice_Records::where('invoice_id', $id)->first();

        $invoice = Invoice_Records::where('invoice_id', $id)->get();

        $k = [];

        foreach($invoice as $key){
            $k[] = $key->total;
            $subtotal = array_sum($k);
        }

        $title = 'Invoice Record Profile';

        $subtitle = "display an invoice record";

        return view('invoices.show', compact('invoice', 'title','subtitle', 'data', 'subtotal'));
    }

    public function updateInvoice($id)
    {
        $data = Input::except('_method', '_token');
        $tax = (Input::has('tax')) ? Input::get('tax') : 0 ;

        $data['tax'] = $tax;

        Invoice_Records::where('invoice_id', $id)->update($data);

        return redirect('inv/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Invoice_Records $invoice)
    {
        Invoice_Records_Item::where('invoice_id', $invoice->id)->delete();

        $invoice->delete();

        return redirect('invoices')->with('success','Invoice Records Deleted Successfully');
    }

}
