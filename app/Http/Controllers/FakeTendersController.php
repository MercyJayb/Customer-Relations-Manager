<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\FakeTenders;

use CRM\Http\Requests\FakeTendersRequest;

use Illuminate\Http\Request;

class FakeTendersController extends Controller {

    /**
     *
     * @return Response
     */

    public function index()
    {
        $faketenders = FakeTenders::all();

        $title = 'All Tenders';

        $subtitle = "view and update tenders records";

        return view('faketenders.index', compact('faketenders', 'title','subtitle'));
    }

    public function all()
    {
        $fakeTendersDueInTwoWeeks = FakeTenders::dueInTwoWeeks()->get();

        $title = 'All Tenders Due In Two Weeks';

        $subtitle = "view and update tenders records";

        return view('faketenders.all', compact('fakeTendersDueInTwoWeeks', 'title','subtitle'));
    }

    public function completedFakeTenders()
    {
        $faketenders = FakeTenders::completed()->get();

        $title = 'All Completed Tender';

        $subtitle = "view and update tender records";

        return view('faketenders.index', compact('faketenders', 'title','subtitle'));
    }


    public function pendingFakeTenders()
    {
        $faketenders = FakeTenders::pending()->get();

        $title = 'All Pending Tenders';

        $subtitle = "view and update tender records";

        return view('faketenders.index', compact('faketenders', 'title','subtitle'));
    }

    public function updateStatus(FakeTenders $faketender)
    {
        if($faketender->status){
            $faketender->status = false;
        } else {
            $faketender->status = true;
        }

        $faketender->save();

        return redirect('faketenders-all')->with('success','Tender Status Updated Successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return object
     */
    public function create(FakeTenders $faketender)
    {
        $title = 'Create Tender';

        $subtitle = "create a new tender record";

        return view('faketenders.create', compact('faketender', 'title','subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FakeTenders $faketender, FakeTendersRequest $request)
    {
        $faketender->create($request->all());

        return redirect('faketenders')->with('success', 'Tender Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(FakeTenders $faketender)
    {
        $title = 'Tender Profile';

        $subtitle = "display a tender record";

        return view('faketenders.show', compact('faketender','title','subtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(FakeTenders $faketender)
    {
        $title = 'Update Tender';

        $subtitle = "update a tender record";

        return view('faketenders.update', compact('faketender','title','subtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(FakeTenders $faketender, faketenderRequest $request)
    {
        $faketender->update($request->all());

        return redirect('faketenders')->with('success', 'Tender Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(FakeTenders $faketender)
    {
        $faketender->delete();

        return redirect('faketenders')->with('success', 'Tender Deleted Successfully');
    }

}
