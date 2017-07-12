    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse test-padding" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="{{ url('/admin/maintenance/productcategory') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i> Maintenance <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/admin/maintenance/productcategory') }}"><i class="fa fa-cart-arrow-down fa-fw" aria-hidden="true"></i>&nbsp; Product Category</a></li>
                <li class="active"><a href="{{ url('/admin/maintenance/product') }}"><i class="fa fa-cart-plus fa-fw" aria-hidden="true"></i>&nbsp; Product</a></li>
                <li><a href="{{ url('/admin/maintenance/productinventorystatus') }}"><i class="fa fa-pie-chart fa-fw" aria-hidden="true"></i>&nbsp; Product Inventory Status</a></li>
                <li><a href="{{ url('/admin/maintenance/productinventory') }}"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i>&nbsp; Product Inventory</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/maintenance/department') }}"><i class="fa fa-industry fa-fw" aria-hidden="true"></i>&nbsp; Department</a></li>
                <li><a href="{{ url('/admin/maintenance/position') }}"><i class="fa fa-suitcase fa-fw" aria-hidden="true"></i>&nbsp; Position</a></li>
                <li><a href="{{ url('/admin/maintenance/personnel') }}"><i class="fa fa-male fa-fw" aria-hidden="true"></i>&nbsp; Personnel</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/maintenance/servicecategory') }}"><i class="fa fa-thumbs-o-up fa-fw" aria-hidden="true"></i>&nbsp; Service Category</a></li>
                <li><a href="{{ url('/admin/maintenance/service') }}"><i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i>&nbsp; Service</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/maintenance/vehicletype') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Vehicle Type</a></li>
                <li><a href="{{ url('/admin/maintenance/vehicle') }}"><i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp; Vehicle</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bar-chart" aria-hidden="true"></i>Transactions <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/admin/transactions/client') }}"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>&nbsp;Clients</a></li>
                <li role="role" class="divider"></li>
                <li><a href="{{ url('/admin/transactions/inquiry') }}"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Inquiries</a></li>
                <li><a href="{{ url('/admin/transactions/quotation') }}"><i class="fa fa-quote-left fa-fw" aria-hidden="true"></i>&nbsp;Quotations</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/transactions/purchaseorder') }}"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp;Sales Orders</a></li>
                <li><a href="{{ url('/admin/transactions/joborder') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp;Job Orders</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/transactions/salesinvoice') }}"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp;Sales Invoice</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/admin/transactions/vehiclerequest') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp;Vehicle Requests</a></li>
                <li><a href="{{ url('/admin/transactions/obanditinerary') }}"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>&nbsp;Official Business Forms</a></li>
                <li><a href="{{ url('/admin/transactions/gatepass') }}"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp;Gate Pass Records</a></li>
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