<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse js-navbar-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="{{ url('/admin') }}"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i>&nbsp; Dashboard</a>
        </li>
        <li class="dropdown dropdown-large">
          <a href="{{ url('/admin/maintenance/productcategory') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cogs fa-fw" aria-hidden="true"></i>&nbsp; Maintenance <span class="caret"></span>
          </a>
  				<ul class="dropdown-menu dropdown-menu-large row">
  					<li class="col-sm-4">
  						<ul>
                <li class="dropdown-main-header"><center>Itemization and Inventory</center></li>
                <li class="divider"></li>
  							<li class="dropdown-header">Assets</li>
                <li class="{{ Request::is('admin/maintenance/warehouse') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/warehouse') }}"><i class="fa fa-archive fa-fw" aria-hidden="true"></i>&nbsp; Warehouse</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/product-category') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/product-category') }}"><i class="fa fa-bookmark fa-fw" aria-hidden="true"></i>&nbsp; Product Category</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/brand') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/brand') }}"><i class="fa fa-certificate fa-fw" aria-hidden="true"></i>&nbsp; Brand</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/attributes') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/attributes') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Attributes</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/product') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/product') }}"><i class="fa fa-cart-plus fa-fw" aria-hidden="true"></i>&nbsp; Product</a>
                </li>
                <li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Feature Sets</a></li>
                <li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Variants</a></li>
                <li class="{{ Request::is('admin/maintenance/productinventory') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/productinventory') }}"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i>&nbsp; Inventory</a>
                </li>
  						</ul>
  					</li>
  					<li class="col-sm-4">
  						<ul>
                <li class="dropdown-main-header"><center>Job Appointments and Services</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Workforce</li>
                <li class="{{ Request::is('admin/maintenance/role') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/role') }}"><i class="fa fa-suitcase fa-fw" aria-hidden="true"></i>&nbsp; Role</a>
                </li>
  							<li class="{{ Request::is('admin/maintenance/skill') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/skill') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Skill</a>
                </li>
                <li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Skill Set</a></li>
                <li class="{{ Request::is('admin/maintenance/personnel') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/personnel') }}"><i class="fa fa-male fa-fw" aria-hidden="true"></i>&nbsp; Personnel</a>
                </li>
  							<li class="dropdown-header">Services</li>
                <li class="{{ Request::is('admin/maintenance/service-type') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/service-type') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Service Type</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/service') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/service') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Service Area</a>
                </li>
  						</ul>
  					</li>
  					<li class="col-sm-4">
  						<ul>
                <li class="dropdown-main-header"><center>Logistics and Payments</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Transportation</li>
                <li class="{{ Request::is('admin/maintenance/vehicletype') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/vehicletype') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Vehicle Type</a>
                </li>
  							<li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Specifications</a></li>
                <li class="{{ Request::is('admin/maintenance/vehicle') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/vehicle') }}"><i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp; Vehicle</a>
                </li>
  							<li class="divider"></li>
  							<li class="dropdown-header">Payment</li>
  							<li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Price</a></li>
  							<li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Discount</a></li>
                <li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Mode of Payment</a></li>
                <li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Delivery Charge</a></li>
                <li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Price Validity</a></li>
  						</ul>
  					</li>
  				</ul>
  			</li>
        <li class="dropdown dropdown-large">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>&nbsp; Transactions <span class="caret"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-large row">
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-main-header"><center>Preliminary Procedures</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Request for Quotation</li>
                <li class="{{ Request::is('admin/transactions/client') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/client') }}"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>&nbsp; Client</a>
                </li>
                <li class="{{ Request::is('admin/transactions/quotation') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/quotation') }}"><i class="fa fa-quote-left fa-fw" aria-hidden="true"></i>&nbsp; Quotation</a>
                </li>
              </ul>
            </li>
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-main-header"><center>Orders Phase</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Placing a Job or Sales Order</li>
                <li class="{{ Request::is('admin/transactions/salesorder') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/salesorder') }}"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp; Sales Orders</a>
                </li>
                <li class="{{ Request::is('admin/transactions/joborder') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/joborder') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; Job Orders</a>
                </li>
                <li class="{{ Request::is('admin/transactions/salesinvoice') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/salesinvoice') }}"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Invoice</a>
                </li>
              </ul>
            </li>
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-main-header"><center>Logistics</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Requisition for Transport</li>
                <li class="{{ Request::is('admin/transactions/vehiclerequest') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/vehiclerequest') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Vehicle Requests</a>
                </li>
                <li class="{{ Request::is('admin/transactions/obanditinerary') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/obanditinerary') }}"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>&nbsp; Official Business</a>
                </li>
                <li class="{{ Request::is('admin/transactions/gatepass') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/gatepass') }}"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Gate Pass Records</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-question fa-fw" aria-hidden="true"></i>&nbsp; Queries</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i>&nbsp; Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; Sales Report</a></li>
            <li><a href="#"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Service Ticket</a></li>
            <li><a href="#"><i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>&nbsp; Delivery Receipt</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
