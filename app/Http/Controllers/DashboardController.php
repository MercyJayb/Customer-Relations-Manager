<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;

use CRM\Http\Controllers\Controller;

use CRM\User;


use Illuminate\Http\Request;

class DashboardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		$admins = User::where('level_id','=', 1)->get();
		$techs = User::where('level_id','=', 2)->get();
		$sales = User::where('level_id','=', 3)->get();

		return view('dashboard')
				->with('users', $users)
				->with('admins', $admins)
				->with('techs', $techs)
                ->with('title','Dashboard')
                ->with('subtitle','overview and stats')
				->with('sales', $sales);

	}

}
