<?php namespace CRM\Http\Controllers;

use CRM\Client;
use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\Tender;

use CRM\Http\Requests\TenderRequest;

use Illuminate\Http\Request;

class TenderController extends Controller {

    /**
     *
     * @return Response
     */

    public function index()
    {
        $tenders = Tender::all();

        $title = 'All Tenders';

        $subtitle = "view and update tenders records";

        return view('tenders.index', compact('tenders', 'title','subtitle'));
    }

    public function all()
    {
        $tendersDueInTwoWeeks = Tender::dueInTwoWeeks()->get();

        $title = 'All Tenders Due In Two Weeks';

        $subtitle = "view and update tenders records";

        return view('tenders.all', compact('tendersDueInTwoWeeks', 'title','subtitle'));
    }

    public function completedTenders()
    {
        $tenders = Tender::completed()->get();

        $title = 'All Completed Tenders';

        $subtitle = "view and update tenders records";

        return view('tenders.index', compact('tenders', 'title','subtitle'));
    }


    public function pendingTenders()
    {
        $tenders = Tender::pending()->get();

        $title = 'All Pending Tenders';

        $subtitle = "view and update tenders records";

        return view('tenders.index', compact('tenders', 'title','subtitle'));
    }

    public function updateStatus(Tender $tender)
    {
        if($tender->status){
            $tender->status = false;
        } else {
            $tender->status = true;
        }

        $tender->save();

        return redirect('tenders-all')->with('success','Tender Status Updated Successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return object
     */
    public function create(Tender $tender)
    {
        $title = 'Create Tender';

        $subtitle = "create a new tender record";

        $clients = Client::get(['company','firstname','lastname','id'])->lists('fullnameAndCompany','id');

        return view('tenders.create', compact('tender', 'title','subtitle','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Tender $tender, TenderRequest $request)
    {
        $tender->create($request->all());

        return redirect('tenders')->with('success', 'Tender Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Tender $tender)
    {
        $title = 'Tender Profile';

        $subtitle = "display a tender record";

        return view('tenders.show', compact('tender','title','subtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Tender $tender)
    {
        $title = 'Update tender';

        $subtitle = "update a tender record";

        $clients = Client::get(['company','firstname','lastname','id'])->lists('fullnameAndCompany','id');

        return view('tenders.update', compact('tender','title','subtitle', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Tender $tender, TenderRequest $request)
    {
        $tender->update($request->all());

        return redirect('tenders')->with('success', 'Tender Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Tender $tender)
    {
        $tender->delete();

        return redirect('tenders')->with('success', 'Tender Deleted Successfully');
    }

}
