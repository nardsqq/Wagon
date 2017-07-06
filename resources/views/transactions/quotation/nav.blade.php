         
          <div class="list-group">
            <a href="{{ url('/admin/dashboard') }}" class="list-group-item"><i class="fa fa-tasks" aria-hidden="true"></i> Dashboard</a>
            <a href="{{ url('/admin/maintenance/productcategory') }}" class="list-group-item"><i class="fa fa-cogs" aria-hidden="true"></i> Maintenance</a>
            <a href="#" class="list-group-item active main-color-bg"><i class="fa fa-bar-chart" aria-hidden="true"></i> Transactions</a>
            <a href="#" class="list-group-item"><i class="fa fa-file" aria-hidden="true"></i> Forms</a>
          </div>
          <div><p><b>Client and Ship</b></p></div>
          <div class="list-group">
            <a href="{{ url('/admin/transactions/client') }}" class="list-group-item"><i class="fa fa-building fa-fw" aria-hidden="true"></i>&nbsp; Add New Client</a>
            <a href="{{ url('/admin/transactions/ship') }}" class="list-group-item"><i class="fa fa-ship fa-fw" aria-hidden="true"></i>&nbsp; Add New Ship</a>
          </div>
          <div><p><b>Processes</b></p></div>
          <div class="list-group">
            <a href="{{ url('/admin/transactions/inquiry') }}" class="list-group-item"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp; New Inquiry</a>
            <a href="{{ url('/admin/transactions/quotation') }}" class="list-group-item  active main-color-bg"><i class="fa fa-quote-left fa-fw" aria-hidden="true"></i>&nbsp; Create Quotation</a>
            <a href="{{ url('/admin/transactions/purchaseorder') }}" class="list-group-item"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp; New Purchase Order</a>
            <a href="{{ url('/admin/transactions/joborder') }}" class="list-group-item"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; New Job Order</a>
            <a href="{{ url('/admin/transactions/deliveryschedule') }}" class="list-group-item"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>&nbsp; Set Delivery Schedule</a>
            <a href="{{ url('/admin/transactions/jobdeploymentschedule') }}" class="list-group-item"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i>&nbsp; Set Job Deployment Schedule</a>
          </div>
          <div><p><b>Logistics</b></p></div>
          <div class="list-group">
            <a href="{{ url('/admin/transactions/vehiclerequest') }}" class="list-group-item"><i class="fa fa-car fa-fw" aria-hidden="true"></i>&nbsp; Create Vehicle Request</a>
            <a href="{{ url('/admin/transactions/obanditinerary') }}" class="list-group-item"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>&nbsp; New OB and Itinerary Form</a>
            <a href="{{ url('/admin/transactions/gatepass') }}" class="list-group-item"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp; Create Gate Pass</a>
          </div>