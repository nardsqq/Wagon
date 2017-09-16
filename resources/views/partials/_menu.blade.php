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
                <li class="{{ Request::is('admin/maintenance/product-category') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/product-category') }}"><i class="fa fa-bookmark fa-fw" aria-hidden="true"></i>&nbsp; Product Category</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/attributes') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/attributes') }}"><i class="fa fa-adjust fa-fw" aria-hidden="true"></i>&nbsp; Attributes</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/product') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/product') }}"><i class="fa fa-cart-plus fa-fw" aria-hidden="true"></i>&nbsp; Product</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/brand') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/brand') }}"><i class="fa fa-certificate fa-fw" aria-hidden="true"></i>&nbsp; Brand</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/product-build') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/product-build') }}"><i class="fa fa-cube fa-fw" aria-hidden="true"></i>&nbsp; Product Build</a>
                </li>
                <li><a href="#"><i class="fa fa-cubes fa-fw"></i>&nbsp; Variants</a></li>
  						</ul>
  					</li>
  					<li class="col-sm-4">
  						<ul>
                <li class="dropdown-main-header"><center>Job Appointments and Services</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Workforce</li>
  							<li class="{{ Request::is('admin/maintenance/skill') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/skill') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Skill</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/role') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/role') }}"><i class="fa fa-suitcase fa-fw" aria-hidden="true"></i>&nbsp; Role</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/personnel') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/personnel') }}"><i class="fa fa-male fa-fw" aria-hidden="true"></i>&nbsp; Personnel</a>
                </li>
  							<li class="dropdown-header">Services</li>
                <li class="{{ Request::is('admin/maintenance/service-type') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/service-type') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Service Type</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/service-area') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/service-area') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Service Area</a>
                </li>
  						</ul>
  					</li>
  					<li class="col-sm-4">
  						<ul>
                <li class="dropdown-main-header"><center>Logistics and Payments</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Transportation</li>
                <li class="{{ Request::is('admin/maintenance/vehicle-type') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/vehicle-type') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Vehicle Type</a>
                </li>
  							<li><a href="#"><i class="fa fa-circle fa-fw"></i>&nbsp; Specifications</a></li>
                <li class="{{ Request::is('admin/maintenance/vehicle') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/vehicle') }}"><i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp; Vehicle</a>
                </li>
  							<li class="divider"></li>
  							<li class="dropdown-header">Payment</li>
  							<li class="{{ Request::is('admin/maintenance/base-price') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/base-price') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Base Price</a>
                </li>
  							<li class="{{ Request::is('admin/maintenance/discount') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/discount') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Discount</a>
                </li>
                 <li class="{{ Request::is('admin/maintenance/mode-of-payment') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/mode-of-payment') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Mode Of Payment</a>
                </li>
                   <li class="{{ Request::is('admin/maintenance/terms-of-payment') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/terms-of-payment') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Terms Of Payment</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/delivery-charge') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/delivery-charge') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Delivery Charge</a>
                </li>
                <li class="{{ Request::is('admin/maintenance/price-validity') ? "active" : "" }}">
                  <a href="{{ url('/admin/maintenance/price-validity') }}"><i class="fa fa-circle fa-fw" aria-hidden="true"></i>&nbsp; Price Validity</a>
                </li>
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
                <li class="{{ Request::is('admin/transactions/sales-order') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/sales-order') }}"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp; Sales Orders</a>
                </li>
                <li class="{{ Request::is('admin/transactions/job-order') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/job-order') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; Job Orders</a>
                </li>
                <li class="{{ Request::is('admin/transactions/invoice') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/invoice') }}"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Invoice</a>
                </li>
              </ul>
            </li>
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-main-header"><center>Logistics</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Requisition for Transport</li>
                <li class="{{ Request::is('admin/transactions/vehicle-request') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/vehicle-request') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Vehicle Requests</a>
                </li>
                <li class="{{ Request::is('admin/transactions/official-business') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/official-business') }}"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>&nbsp; Official Business</a>
                </li>
                <li class="{{ Request::is('admin/transactions/gate-pass') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/gate-pass') }}"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Gate Pass Records</a>
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
