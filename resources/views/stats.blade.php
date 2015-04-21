<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-tasks fa-stack-1x fa-inverse"></i> </span>
                <h2 class="StepTitle">Manage Tasks</h2>
                <p class="text-small">
                    Add, update and delete tasks on the go!.
                </p>
                <p class="text-small">
                    <span style="color:black">{{ CRM\Task::overdue()->count() }} - Overdue Tasks</span>
                </p>
                <p class="links cl-effect-1">
                    <a href="{{ url('tasks-all') }}">
                        view more
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-laptop fa-stack-1x fa-inverse"></i> </span>
                <h2 class="StepTitle">Manage Domains</h2>
                <p class="text-small">
                    This tool enables you to view of all your invoices.
                </p>
                <p class="text-small">
                    <span style="color:black">{{ CRM\Domain::Unpaid()->count() }} - Expired Domains</span>
                </p>
                <p class="cl-effect-1">
                    <a href="{{ url('domains') }}">
                        view more
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                <h2 class="StepTitle">Manage Projects</h2>
                <p class="text-small">
                    Store, modify and delete your projects.
                </p>
                <p class="text-small">
                    <span style="color:black">{{ CRM\Project::overdue()->count() }} - Overdue Projects</span>
                </p>
                <p class="links cl-effect-1">
                    <a href="{{ url('projects') }}">
                        view more
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-credit-card fa-stack-1x fa-inverse"></i> </span>
                <h2 class="StepTitle">Manage Invoices</h2>
                <p class="text-small">
                    Track your invoices on the go!.
                </p>
                <p class="text-small">
                    <span style="color:#030506">10 - Overdue Invoices</span>
                </p>
                <p class="links cl-effect-1">
                    <a href="{{ url('invoices-all') }}">
                        view more
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-archive fa-stack-1x fa-inverse"></i> </span>
                <h2 class="StepTitle">Manage Tenders</h2>
                <p class="text-small">
                    This tool enables you to view of all your tenders.
                </p>
                <p class="text-small">
                    <span style="color:black">{{ CRM\Tender::all()->count() }} - Total Tenders</span>
                </p>
                <p class="cl-effect-1">
                    <a href="{{ url('tenders') }}">
                        view more
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-white no-radius text-center">
            <div class="panel-body">
                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-group fa-stack-1x fa-inverse"></i> </span>
                <h2 class="StepTitle">Manage Clients</h2>
                <p class="text-small">
                    Store, modify and delete your clients.
                </p>
                <p class="text-small">
                    <span style="color:black">{{ CRM\Client::all()->count() }} - Total Clients</span>
                </p>
                <p class="links cl-effect-1">
                    <a href="{{ url('clients') }}">
                        view more
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>