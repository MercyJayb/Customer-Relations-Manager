<?php namespace CRM\Http\Controllers;

use CRM\Http\Requests;
use CRM\Http\Controllers\Controller;

use CRM\Task;
use CRM\Comment;

use Carbon\Carbon;

use CRM\Http\Requests\TaskRequest;
use CRM\Http\Requests\CommentRequest;

use Illuminate\Http\Request;

class TaskController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = Task::all();

        $title = 'All Tasks';

        $subtitle = "view and update tasks records";

		return view('tasks.index', compact('tasks', 'title', 'subtitle'));
	}

    public function todayTasks()
    {
        $tasks = Task::today()->get();

        $title = 'All Today Tasks';

        $subtitle = "view and update tasks records";

        return view('tasks.index', compact('tasks', 'title', 'subtitle'));
    }

    public function latestTasks()
    {
        $tasks = Task::orderBy('created_at','desc')->get();

        $title = 'All Latest Tasks';

        $subtitle = "view and update tasks records";

        return view('tasks.index', compact('tasks', 'title', 'subtitle'));
    }

    public function completedTasks()
    {
        $tasks = Task::completed()->get();

        $title = 'All Completed Tasks';

        $subtitle = "view and update tasks records";

        return view('tasks.index', compact('tasks', 'title', 'subtitle'));
    }

    public function updateStatus(Task $task)
    {
        if($task->status){
            $task->status = false;
        } else {
            $task->status = true;
        }

        $task->save();

        return redirect('tasks-all')->with('success','Task Status Updated Successfully');
    }


    public function all()
    {
        $overduetasks = Task::overdue()->get();
        $todaytasks = Task::today()->get();
        $tomorrowtasks = Task::tomorrow()->get();
        $thisweektasks = Task::thisWeek()->get();
        $nextweektasks = Task::nextWeek()->get();
        $thismonthtasks = Task::thisMonth()->get();
        $nextmonthtasks = Task::nextMonth()->get();
        $othertasks = Task::Other()->get();

        $title = 'All Tasks';

        $subtitle = "view and update tasks records per time";

        return view('tasks.all', compact('overduetasks','todaytasks','tomorrowtasks','thisweektasks','nextweektasks','thismonthtasks','nextmonthtasks','othertasks', 'title', 'subtitle'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Task $task)
	{
        $time = [
            '06:00' => '6.00am',
            '07:00' => '7.00am',
            '08:00' => '8.00am',
            '09:00' => '9.00am',
            '10:00' => '10.00am',
            '11:00' => '11.00am',
            '12:00' => '12.00pm',
            '13:00' => '1.00pm',
            '14:00' => '2.00pm',
            '15:00' => '3.00pm',
            '16:00' => '4.00pm',
            '17:00' => '5.00pm',
            '18:00' => '6.00pm',
            '19:00' => '7.00pm',
            '20:00' => '8.00pm',
            '21:00' => '9.00pm',
            '22:00' => '10.00pm',
            '23:00' => '11.00pm'
        ];

        $title = 'Create Task';

        $subtitle = "create a new task record";

		return view('tasks.create', compact('task','title','subtitle', 'time'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Task $task, TaskRequest $request)
	{
        $request = $request->all();

        //Carbon::createFromFormat('m/d/Y', $request['start_at'])->format('Y-m-d')

        $request['start_at'] = $request['start_at'].' '.$request['time'].':00';

        $task->create($request);

		return redirect('tasks-all')->with('success', 'Task Created Successfully');
	}

    public function addComment(Task $task, CommentRequest $request)
    {
        $request = $request->all();
        $request['user_id'] = 1;
        //$request['task_id'] = 1;
        Comment::create($request);

        return redirect('tasks/'.$request['task_id'])->with('success', 'Task Note Added Successfully');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Task $task)
	{
        $title = 'Task Profile';

        $subtitle = "display a task record";

		return view( 'tasks.show' )->with(compact('task','title', 'subtitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Task $task)
	{

        $time = [
            '06:00' => '6.00am',
            '07:00' => '7.00am',
            '08:00' => '8.00am',
            '09:00' => '9.00am',
            '10:00' => '10.00am',
            '11:00' => '11.00am',
            '12:00' => '12.00pm',
            '13:00' => '1.00pm',
            '14:00' => '2.00pm',
            '15:00' => '3.00pm',
            '16:00' => '4.00pm',
            '17:00' => '5.00pm',
            '18:00' => '6.00pm',
            '19:00' => '7.00pm',
            '20:00' => '8.00pm',
            '21:00' => '9.00pm',
            '22:00' => '10.00pm',
            '23:00' => '11.00pm'
        ];

        $title = 'Update Task';

        $subtitle = "update a task record";

		return view('tasks.update')->with(compact('task','title', 'subtitle','time'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Task $task, TaskRequest $request)
	{
		$request = $request->all();

		//$request['start_at'] = Carbon::createFromFormat('d/m/Y', $request['start_at']);

        $request['start_at'] = $request['start_at'].' '.$request['time'].':00';

		$task->update($request);

		return redirect('tasks-all')->with('success', 'Task Updated Successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Task $task)
	{
		$task->delete();

		return redirect('tasks')->with('success', 'Task Deleted Successfully');
	}

}
