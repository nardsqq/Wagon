<nav class="navbar navbar-default navbar-fixed-top container-fluid" id="remove-border">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img style="width: 230px; padding-bottom: 30px;" src="{{URL::asset('/images/MRNIND.png')}}" alt="logo"></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle isModified" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, Admin <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Account</a></li>
            <li><a href="#"><i class="fa fa-folder-open fa-fw" aria-hidden="true"></i>&nbsp; System Settings</a></li>
            <li role="role" class="divider"></li>
            <li><a href="#"><i class="fa fa-power-off fa-fw" aria-hidden="true"></i>&nbsp; Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
