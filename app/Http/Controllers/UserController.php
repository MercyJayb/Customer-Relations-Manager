<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\User;

use CRM\Level;

use Input;

use CRM\Http\Requests\UserRequest;

use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($level = null)
	{
		$users = User::all();

        $title = 'All Users';

        $subtitle = "view and update users records";

		if($level == 'admins'){
            $users = User::where('level_id','=', 1)->get();
            $title = 'Administrators';
            $subtitle = "view and update administrators";
        }

		if($level == 'developers') {
            $users = User::where('level_id', '=', 2)->get();
            $title = 'Technical Teams';
            $subtitle = "view and update technical teams";
        }

		if($level == 'salespersons'){
            $users = User::where('level_id','=', 3)->get();
            $title = 'Sales Persons';
            $subtitle = "view and update sales persons";
        }

		return view('users.index', compact('users', 'title', 'subtitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(User $user)
	{
		$levels = Level::lists('level_name','id');

		$method = "POST";

        $title = 'Create User';

        $subtitle = "create a new user record";

		return view('users.create', compact('user', 'levels', 'method', 'title', 'subtitle'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(User $user, UserRequest $request)
	{
		$user->create($request->all());

		return redirect('users')->with('success', 'User Created Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $user)
	{
		$title = 'User Profile';

        $subtitle = "display a user record";

		return view('users.show', compact('user','title', 'subtitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{

		$levels = Level::lists('level_name','id');

		$method = "PUT";

        $title = 'Edit User';

        $subtitle = "update a user record";

		return view('users.update', compact('user', 'levels', 'method', 'title', 'subtitle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(User $user, UserRequest $request)
	{
		$user->update($request->except('_method','_token'));

		return redirect('users')->with('success', 'User Updated Successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::findorFail($id)->delete();

		return redirect('users')->with('success', 'User Deleted Successfully');
	}
	
	public function lock()
	{
		\Auth::logout();

		return view('lock');
		
	}

	public function unlock()
    {
        
			$login = \Auth::attempt(array(
				'username' => 'adamstuva',
				'password' => Input::get('password')
			));

            //$login = \Auth::loginUsingId(1);


			if($login){
				return redirect('/');
			} else {
				return redirect('lock')->with('error','Incorrect password');
			}
	}

    public function profile()
    {
        $user = \Auth::user();

        return  view('users.profile', compact('user'));
    }



}
