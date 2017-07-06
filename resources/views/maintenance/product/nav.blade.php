        
<div class="list-group">
  <a href="{{ url('/admin/dashboard') }}" class="list-group-item"><i class="fa fa-tasks" aria-hidden="true"></i> Dashboard</a>
  <a href="#" class="list-group-item active main-color-bg"><i class="fa fa-cogs" aria-hidden="true"></i> Maintenance</a>
  <a href="{{ url('/admin/transactions/client') }}" class="list-group-item"><i class="fa fa-bar-chart" aria-hidden="true"></i> Transactions</a>
  <a href="#" class="list-group-item"><i class="fa fa-file" aria-hidden="true"></i> Forms</a>
</div>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading clickable">
      <h4 class="panel-title">
        <b><h5>Sales Maintenance</h5></b>
      </h4>
    </div>
    <div class="panel-body">
      <a href="{{ url('/admin/maintenance/productcategory') }}" class="list-group-item"><i class="fa fa-cart-arrow-down fa-fw" aria-hidden="true"></i>&nbsp; Product Category</a>
      <a href="{{ url('/admin/maintenance/product') }}" class="list-group-item active main-color-bg"><i class="fa fa-cart-plus fa-fw" aria-hidden="true"></i>&nbsp; Product</a>
      <a href="{{ url('/admin/maintenance/productinventorystatus') }}" class="list-group-item"><i class="fa fa-pie-chart fa-fw" aria-hidden="true"></i>&nbsp; Product Inventory Status</a>
      <a href="{{ url('/admin/maintenance/productinventory') }}" class="list-group-item"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i>&nbsp; Product Inventory</a>
    </div>
  </div>
  <div class="panel panel-default autocollapse">
    <div class="panel-heading clickable">
      <h4 class="panel-title">
        <b><h5>Service Maintenance</h5></b>
      </h4>
    </div>
    <div class="panel-body">
      <a href="{{ url('/admin/maintenance/department') }}" class="list-group-item"><i class="fa fa-industry fa-fw" aria-hidden="true"></i>&nbsp; Department</a>
      <a href="{{ url('/admin/maintenance/position') }}" class="list-group-item"><i class="fa fa-suitcase fa-fw" aria-hidden="true"></i>&nbsp; Position</a>
      <a href="{{ url('/admin/maintenance/personnel') }}" class="list-group-item"><i class="fa fa-male fa-fw" aria-hidden="true"></i>&nbsp; Personnel</a>
      <a href="{{ url('/admin/maintenance/servicecategory') }}" class="list-group-item"><i class="fa fa-thumbs-o-up fa-fw" aria-hidden="true"></i>&nbsp; Service Category</a>
      <a href="{{ url('/admin/maintenance/service') }}" class="list-group-item"><i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i>&nbsp; Service</a>
    </div>
  </div>
  <div class="panel panel-default autocollapse">
    <div class="panel-heading clickable">
      <h4 class="panel-title">
        <b><h5>Delivery Maintenance</h5></b>
      </h4>
    </div>
    <div class="panel-body">
      <a href="{{ url('/admin/maintenance/vehicletype') }}" class="list-group-item"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Vehicle Type</a>
      <a href="{{ url('/admin/maintenance/vehicle') }}" class="list-group-item"><i class="fa fa-truck fa-fw" aria-hidden="true"></i>&nbsp; Vehicle</a>
    </div>
  </div>
</div>