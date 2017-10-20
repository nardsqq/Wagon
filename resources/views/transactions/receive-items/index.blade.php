@extends('main')
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Transactions</h1>
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
        <li>Transactions</li>
        <li>Receive Items</li>
      </ol>
    </div>
  </section>

  @include('transactions.receive-items.modal')
  <div class="modal-dialog modal-lg" id="show-details"></div>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage <i>Item Receiving</i> here.</strong>
            <br>
            <small>View Details of <i>Item Received</i>.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Receive Item(s)</button>
              </div>
              <div class="panel-title">
                <h4>Receive Items</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('transactions.receive-items.table')
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

  <script src="{{ asset('/js/ajax/transactions/receive-items-ajax.js/') }}"></script>
  
  <script src="{{ asset('/js/vue.js/') }}"></script>
  <script>
    var itemLine = {
      props: ['item', 'index'],
      data() {
        return {
          qty: 1,
          total: 0,
        }
      },
      computed: {
        inventory_cost: function(){
          this.$emit('change-value');
          return this.total / this.qty;
        }
      },
      methods: {
        removeItem: function(){
          this.$emit('remove-item', this.index);
        }
      },
      template: `
        <tr>
          <td class="text-center"><button type="button" @click="removeItem()" class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button></td>
          <td class="text-center">@{{ index + 1 }}</td>
          <td class="text-center">@{{ item.strVarPartNum }}</td>
          <td class="text-center">
            <input hidden readonly name="items[]" :value="item.intVarID">
            @{{ item.full_detail }}
          </td>
          <td class="text-center">
            <input type="number" min="0" v-model.number="total" class="form-control" name="total[]">
          </td>
          <td class="text-center">
            <input type="number" min="0" v-model.number="qty" class="form-control" name="qty[]">
          </td>
          <td class="text-center">
            <input type="text" name="inventory_cost[]" readonly :value="inventory_cost" class="form-control">
            <span>Current Inventory Cost: @{{ item.decInventoryCost }}</span>
          </td>
        </tr>
      `
    };
    Vue.component('item-line', itemLine)
    var receive_vue = new Vue({
      el: '#add_rec',
      data: {
        selected: [],
        variants: {!! $variants !!},
        total: 0,
      },
      {{--  computed: {
        total(){
            var sum = 0;
            console.log(this.selected);
            _.forEach(this.$children, function(p){ 
              sum += (p.total); 
              console.log(sum, p.total);
            });
            return sum;
        }
      },   --}}
      methods: {
        removeSelected(index){
            this.selected.splice(index, 1);
        },
        getTotal(){
          var sum = 0;
          console.log(this.selected);
          _.forEach(this.$children, function(p){ 
            sum += (p.total); 
            console.log(sum, p.total);
          });
          this.total = sum;
          return sum;
        }
      },
      watch: {
        selected: function(s){
          if(this.selected.length < 1)
            this.total = 0;
        }
      }
    })
  </script>
@endsection
