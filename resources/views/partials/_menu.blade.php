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
                <li class="dropdown-main-header"><center>Supplier and Product Building</center></li>
                <li class="divider"></li>
  							<li class="dropdown-header">Assets</li>
                <li>
                  <a href="{{ url('/admin/maintenance/supplier') }}"><i class="fa fa-handshake-o fa-fw" aria-hidden="true"></i>&nbsp; Supplier</a>
                </li>
                <li>
                  <a href="{{ url('/admin/maintenance/product-type') }}"><i class="fa fa-bookmark fa-fw" aria-hidden="true"></i>&nbsp; Product Type</a>
                </li>
                <li>
                  <a href="{{ url('/admin/maintenance/brand') }}"><i class="fa fa-certificate fa-fw" aria-hidden="true"></i>&nbsp; Brand</a>
                </li>
                <li>
                  <a href="{{ url('/admin/maintenance/product') }}"><i class="fa fa-cart-plus fa-fw" aria-hidden="true"></i>&nbsp; Product</a>
                </li>
                <li>
                  <a href="{{ url('/admin/maintenance/product-variant') }}"><i class="fa fa-cube fa-fw" aria-hidden="true"></i>&nbsp; Product Variant</a>
                </li>
  						</ul>
  					</li>
  					<li class="col-sm-4">
  						<ul>
                <li class="dropdown-main-header"><center>Personnel and Services</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Workforce</li>
                <li>
                  <a href="{{ url('/admin/maintenance/role') }}"><i class="fa fa-suitcase fa-fw" aria-hidden="true"></i>&nbsp; Role</a>
                </li>
                <li>
                  <a href="{{ url('/admin/maintenance/personnel') }}"><i class="fa fa-male fa-fw" aria-hidden="true"></i>&nbsp; Personnel</a>
                </li>
  							<li class="dropdown-header">Services</li>
                <li>
                  <a href="{{ url('/admin/maintenance/service-type') }}"><i class="fa fa-industry fa-fw" aria-hidden="true"></i>&nbsp; Service Type</a>
                </li>
                <li>
                  <a href="{{ url('/admin/maintenance/service-area') }}"><i class="fa fa-gavel fa-fw" aria-hidden="true"></i>&nbsp; Service Area</a>
                </li>
  						</ul>
  					</li>
  					<li class="col-sm-4">
  						<ul>
                <li class="dropdown-main-header"><center>Payment Terms</center></li>
                <li class="divider"></li>
                {{-- <li class="dropdown-header">Transportation</li>
                <li>
                  <a href="{{ url('/admin/maintenance/vehicle-type') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Vehicle Type</a>
                </li>
                <li>
                  <a href="{{ url('/admin/maintenance/vehicle') }}"><i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp; Vehicle</a>
                </li>
  							<li class="divider"></li> --}}
  							<li class="dropdown-header">Terms</li>
  							<li>
                  <a href="{{ url('/admin/maintenance/discount') }}"><i class="fa fa-percent fa-fw" aria-hidden="true"></i>&nbsp; Discount</a>
                </li>
                <li>
                  <a href="{{ url('/admin/maintenance/mode-of-payment') }}"><i class="fa fa-money fa-fw" aria-hidden="true"></i>&nbsp; Mode of Payment</a>
                </li>
                {{-- <li>
                  <a href="{{ url('/admin/maintenance/delivery-charge') }}"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; Delivery Charge</a>
                </li> --}}
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
                <li class="dropdown-main-header"><center>Inventory</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Adjust and Replenish Stocks</li>
                <li>
                  <a href="{{ url('/admin/transactions/stocks') }}"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i>&nbsp; Stocks</a>
                </li>
                {{-- <li>
                  <a href="{{ url('/admin/transactions/receive-items') }}"><i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp; Receive Items</a>
                </li> --}}
              </ul>
            </li>
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-main-header"><center>Orders</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Placing a Job or Sales Order</li>
                <li class="{{ Request::is('admin/transactions/client') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/client') }}"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>&nbsp; Client</a>
                </li>
                <li class="{{ Request::is('admin/transactions/purchase-order') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/purchase-order') }}"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp; Purchase Order</a>
                </li>
                {{-- <li class="{{ Request::is('admin/transactions/quotation') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/quotation') }}"><i class="fa fa-quote-left fa-fw" aria-hidden="true"></i>&nbsp; Quotation</a>
                </li> --}}
                <li class="{{ Request::is('admin/transactions/sales-order') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/sales-order') }}"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp; Sales Order</a>
                </li>
                <li class="{{ Request::is('admin/transactions/job-order') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/job-order') }}"><i class="fa fa-industry fa-fw" aria-hidden="true"></i>&nbsp; Job Order</a>
                </li>
                <li class="{{ Request::is('admin/transactions/invoice') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/invoice') }}"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Invoice</a>
                </li>
              </ul>
            </li>
            <li class="col-sm-4">
              <ul>
                <li class="dropdown-main-header"><center>Services</center></li>
                <li class="divider"></li>
                <li class="dropdown-header">Service and Delivery</li>
                {{-- <li class="{{ Request::is('admin/transactions/vehicle-request') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/vehicle-request') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Vehicle Requests</a>
                </li> --}}
                <li class="{{ Request::is('admin/transactions/delivery') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/delivery') }}"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Delivery</a>
                </li>
                <li class="{{ Request::is('admin/transactions/deployment') ? "active" : "" }}">
                  <a href="{{ url('/admin/transactions/deployment') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; Deployment</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-question fa-fw" aria-hidden="true"></i>&nbsp; Queries <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/admin/queries/personnel') }}"><i class="fa fa-male fa-fw" aria-hidden="true"></i>&nbsp; Personnel</a></li>
            <li><a href="{{ url('/admin/queries/service-area') }}"><i class="fa fa-gavel fa-fw" aria-hidden="true"></i>&nbsp; Services</a></li>
            <li><a href="{{ url('/admin/queries/product-variant') }}"><i class="fa fa-cube fa-fw" aria-hidden="true"></i>&nbsp; Product Variants</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i>&nbsp; Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('stocks-report') }}"><i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>&nbsp; Stocks Report</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
