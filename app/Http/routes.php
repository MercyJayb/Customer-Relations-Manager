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

    $invoice = CRM\Invoice_Records::where('invoice_id', $invoice_id)->get();
    $bag = CRM\Invoice_Records::where('invoice_id', $invoice_id)->first();

    $logo = URL::asset('assets/images/invoicelogo.png');
    $css = URL::asset('assets/css/invoice/styles.css');

    $date = Carbon\Carbon::parse($bag->created_at)->format('F d, Y');

    $due_date = Carbon\Carbon::parse($bag->due_date)->format('m/d/Y');





    $data = "
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <link rel='stylesheet' href=$css media='all' />
  </head>
  <body>
    <header class='clearfix'>
      <div id='logo'>
        <img src=$logo>
      </div>

      <div id='company' class='clearfix'>
        <div>Date: $date</div>
        <div>Invoice #: $invoice_id</div>

      </div>
      <div id='project'>
        <div>Africa Blue Webs</div>
        <div>'We Develop Your Dream'</div>
      </div>
       <div id='project'>
        <div>To: {$bag->client->company}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;{$bag->client->company}</div>
      </div>
    </header>
    <main>
    <table>
        <thead>
          <tr>
            <th class='service'>Salesperson</th>
            <th class='desc'>Payment Terms</th>
            <th>Due Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class='service'>Tuva Adams Tuva</td>
            <td class='desc'>Due upon Receipt</td>
            <td class='unit'>{$due_date}</td>
          </tr>
          </tbody>
    </table>
    <br><br>
    <table>
        <thead>
          <tr>
            <th class='service'>Qty</th>
            <th class='desc'>Description</th>
            <th></th>
            <th>Unit Price</th>
            <th>Line Total</th>
          </tr>
        </thead>
        <tbody>

            <tr>
            <td class='service'>1</td>
            <td class='desc'>Test service</td>
            <td class='unit'></td>
            <td class='qty'>1000</td>
            <td class='total'>1000</td>
          </tr>
        <tr>
            <td colspan='4'>SUBTOTAL</td>
            <td class='total'>1000.00</td>
          </tr>
          <tr>
            <td colspan='4'>TAX 16%</td>
            <td class='total'>$1,300.00</td>
          </tr>
          <tr>
            <td colspan='4' class='grand total'>GRAND TOTAL</td>
            <td class='grand total'>6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id='notices'>
        <div>NOTICE:</div>
        <div class='notice'>Make all checks payable to Africa Blue Webs <br>
                Thank you for your business! <br>
            </div>
      </div>
    </main>
    <footer>
                Luther Plaza, 4th Fl. P.O. Box 26194 - 00100 Nairobi., Tel: +254 (20) 2345 229, +254 (735) 874816, +254 (787) 355336
    </footer>
  </body>
</html>
";


    $pdf = \PDF::loadHTML($data);

    return $pdf->stream();



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
