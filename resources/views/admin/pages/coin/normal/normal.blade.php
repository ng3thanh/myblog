@extends('admin.layout') 

@section('title', 'Bitcoin | Normal Tracking')

@section('css')
<link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Bitcoin | Normal Tracking</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="coin-tracking" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Market</th>
								<th>Base Volumn</th>
								<th>Price Exchange (%)</th>
								<th>Open Buy Order(s)</th>
								<th>Open Sell Order(s)</th>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $key => $val)
							<tr>
								<td><a href="{{ URL::route('ncoin.show', $val->coin_name) }}">{{ $val->coin_name }}</a></td>
								<td>{{ $val->base_volume }}</td>
								<td>{{ $val->change_rate }}</td>
								<td>{{ $val->open_buy_orders }}</td>
								<td>{{ $val->open_sell_orders }}</td>
							</tr>
						@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Market</th>
								<th>Base Volumn</th>
								<th>Price Exchange (%)</th>
								<th>Open Buy Order(s)</th>
								<th>Open Sell Order(s)</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->

@endsection 

@section('script')
<script>
  $(function () {
    $('#coin-tracking').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection
