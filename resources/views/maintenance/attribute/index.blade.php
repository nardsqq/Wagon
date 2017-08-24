@extends('main')

@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Maintenance</h1>
        </div>
        <div class="col-md-2">

        </div>
      </div>
    </div>
  </header>

  <div class="container fadeIn">
    @include('partials._menu')
  </div>

  <section id="breadcrumb">
    <div class="container animated fadeIn">
      <ol class="breadcrumb">
        <li>Admin</li>
        <li>Maintenance</li>
        <li>Attributes</li>
      </ol>
    </div>
  </section>

  @include('maintenance.attribute.modal')

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
        {{-- test --}}
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Attribute</button>
              </div>
              <div class="panel-title">
                <h4>Attribute</h4>
              </div>
            </div>
            <div class="panel-body">
              <div class="alert alert-success alert-white rounded">
                <div class="icon">
                  <i class="fa fa-info-circle"></i>
                </div>
                <strong>Manage <i>Attributes</i> here.</strong>
                <br>
                <small>Perform <i>Add</i>, <i>Update</i>, <i>Deactivate</i> and <i>Delete</i> Operations.</small>
              </div>
              <div id="attrib-add-panel" class="panel panel-success" style="display: none;">
                <div class="panel-heading">
                  <div class="panel-title"><h4>Add Attribute</h4></div>
                </div>
                <div class="panel-body">
                  {!! Form::open(['route' => 'attributes.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                      <label for="intAttribType" class="col-sm-2 control-label">Attribute Type</label>
                      <div class="col-sm-10">
                        <select name="intAttribType" id="intAttribType" class="form-control">
                          @foreach ($attribs as $attrib)
                            <option value="{{$attrib->intAttribID}}">{{ $attrib->strAttribName }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="strAttribName" class="col-sm-2 control-label">Attribute Name</label>
                      <div class="col-sm-10">
                        <input type="text" id="strAttribName" name="strAttribName" class="form-control">
                      </div>
                    </div>

                    <div class="btn-group pull-right">
                      <button id="attrib-hide-panel" type="button" class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-success">Save New Attribute</button>
                    </div>

                  {!! Form::close() !!}
                </div>
              </div>
              <div id="table-container">
                @include('maintenance.attribute.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('scripts')

  <!-- Delay table load until everything else is loaded -->
  <script>
    $(window).on('load', function(){
        $('#dataTable').removeAttr('style');
    })
  </script>

  <script src="{{ asset('/js/ajax/attributes-ajax.js/') }}"></script>

@endsection
