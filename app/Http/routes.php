<?php

Route::get('lock', 'UserController@lock');
Route::post('unlock', 'UserController@unlock');


Route::bind('tasks', function($id){
	return CRM\Task::findOrFail($id);
});

Route::bind('clients', function($id){
    return CRM\Client::findOrFail($id);
});

Route::bind('services', function($id){
	return CRM\Service::findOrFail($id);
});

Route::bind('projects', function($id){
    return CRM\Project::findOrFail($id);
});

Route::bind('domains', function($id){
    return CRM\Domain::findOrFail($id);
});

Route::bind('invoice_records', function($id){
    return CRM\Invoice_Records::findOrFail($id);
});

Route::bind('client_services', function($id){
    return CRM\ClientService::findOrFail($id);
});

Route::bind('tenders', function($id){
    return CRM\Tender::findOrFail($id);
});

get('stop', function(){
    return view('errors.stop')->with('title', 'Permission denied');
});

get('pdf/{invoice_id}', function($invoice_id){

    $factory = [

        'items' => CRM\Invoice_Records::where('invoice_id', $invoice_id)->get(),

        'bag' => CRM\Invoice_Records::where('invoice_id', $invoice_id)->first()
    ];


    $invoice = PDF::loadView('invoices.pdf2', $factory);

    return $invoice->stream();

});

//Invoices
get('invoices-update-status/{invoice_records}','Invoice_RecordsController@updateStatus');

get('invoices-settled','Invoice_RecordsController@settledInvoices');

get('invoices-pending','Invoice_RecordsController@pendingInvoices');

get('invoices-all','Invoice_RecordsController@all');

get('inv/{id}', 'Invoice_RecordsController@show');

//Fake Tenders
get('faketenders-all','FakeTendersController@all');

get('faketenders-completed','FakeTendersController@completedFakeTenders');

get('faketenders-pending','FakeTendersController@pendingFakeTenders');

get('faketenders-update-status/{faketenders}','FakeTendersController@updateStatus');

//Tenders
get('tenders-all','TenderController@all');

get('tenders-completed','TenderController@completedTenders');

get('tenders-pending','TenderController@pendingTenders');

get('tenders-update-status/{tenders}','TenderController@updateStatus');


get('revenues', 'DomainController@revenues');

//Projects
get('projects-completed','ProjectController@completedProjects');

get('projects-pending','ProjectController@pendingProjects');

get('projects-update-status/{projects}','ProjectController@updateStatus');


//Tasks
get('tasks-update-status/{tasks}','TaskController@updateStatus');

get('tasks-all', 'TaskController@all');

get('tasks-today', 'TaskController@todayTasks');

get('tasks-latest','TaskController@latestTasks');

get('tasks-completed','TaskController@completedTasks');

post('tasks-post-comment','TaskController@addComment');

// Domains
get('domains-older-than-1-year', 'DomainController@domainsOlderThanOneYear');

get('domains-expiring-this-month', 'DomainController@domainsExpiringThisMonth');

get('domains-active', 'DomainController@domainsActive');

get('domains-expired', 'DomainController@domainsExpired');

get('domains-deleted', 'DomainController@domainsDeleted');

get('update-payment/{domains}', 'DomainController@updatePayment');

delete('restore/{id}', 'DomainController@restore');


Route::get('/', 'DashboardController@index');

Route::get('profile', 'UserController@profile');

Route::get('home', 'HomeController@index');

get('addservice/{clients}','ClientServiceController@addServiceToClient');

post('addservice/{clients}', 'ClientServiceController@store');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::resource('clients','ClientController');
Route::resource('client_services','ClientServiceController');
Route::resource('projects','ProjectController');
Route::resource('tasks','TaskController');
Route::resource('users','UserController');
Route::resource('domains','DomainController');
Route::resource('invoice_records','Invoice_RecordsController');
Route::resource('tenders','TenderController');
Route::resource('services','ServiceController');

Route::get('user/{level?}','UserController@index');
