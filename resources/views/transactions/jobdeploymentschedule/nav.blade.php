    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse test-padding" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Dashboard</a></li>
            <li><a href="{{ url('/admin/maintenance/productcategory') }}"><i class="fa fa-cogs" aria-hidden="true"></i> Maintenance</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bar-chart" aria-hidden="true"></i>Transactions <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/admin/transactions/client') }}"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>&nbsp; Add New Client</a></li>
                <li role="role" class="divider"></li>
                <li><a href="{{ url('/admin/transactions/inquiry') }}"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp; New Inquiry</a></li>
                <li><a href="{{ url('/admin/transactions/quotation') }}"><i class="fa fa-quote-left fa-fw" aria-hidden="true"></i>&nbsp; Create Quotation</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/transactions/purchaseorder') }}"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp; New Purchase Order</a></li>
                <li><a href="{{ url('/admin/transactions/deliveryschedule') }}"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>&nbsp; Set Delivery Schedule</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/transactions/joborder') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; New Job Order</a></li>
                <li  class="active"><a href="{{ url('/admin/transactions/jobdeploymentschedule') }}"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i>&nbsp; Set Job Deployment Schedule</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/transactions/vehiclerequest') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Create Vehicle Request</a></li>
                <li><a href="{{ url('/admin/transactions/obanditinerary') }}"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>&nbsp; New OB and Itinerary Form</a></li>
                <li><a href="{{ url('/admin/transactions/gatepass') }}"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Create Gate Pass</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-question fa-fw" aria-hidden="true"></i>&nbsp; Queries</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i>&nbsp; Reports <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; Sales Report</a></li>
                <li role="role" class="divider"></li>
                <li><a href="#"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Service Ticket</a></li>
                <li role="role" class="divider"></li>
                <li><a href="#"><i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>&nbsp; Delivery Receipt</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>