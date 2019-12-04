@extends('admin.master')
@section('title', 'Hóa Đơn')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Hóa đơn</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách hóa đơn chưa xử lý</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Tên khách hàng</th>
										<th>E-mail</th>
										<th>Số điện thoại</th>
										<th>Ngày mua</th>
										<th>Trạng thái</th>
										<th width="16%">Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $cus)
									@if($cus->bill_trangthai == NULL)
									<tr>
										<td>{{$cus->cus_id}}</td>
										<td>{{$cus->cus_name}}</td>
										<td>{{$cus->cus_email}}</td>
										<td>{{$cus->cus_phone}}</td>
										<td>{{$cus->created_at}}</td>
										<td>@if($cus->bill_trangthai == NULL) Chưa xử lý @endif</td>
										<td>
											<a href="{{asset('admin/bill/edit/'.$cus->bill_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
											<a href="{{asset('admin/bill/delete/'.$cus->bill_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-warning">
				<div class="panel-heading">Danh sách hóa đơn đang giao</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Tên khách hàng</th>
										<th>E-mail</th>
										<th>Số điện thoại</th>
										<th>Ngày mua</th>
										<th>Trạng thái</th>
										<th width="16%">Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $cus)
									@if($cus->bill_trangthai == 1)
									<tr>
										<td>{{$cus->cus_id}}</td>
										<td>{{$cus->cus_name}}</td>
										<td>{{$cus->cus_email}}</td>
										<td>{{$cus->cus_phone}}</td>
										<td>{{$cus->created_at}}</td>
										<td>@if($cus->bill_trangthai == 1) Đang giao @endif</td>
										<td>
											<a href="{{asset('admin/bill/edit/'.$cus->bill_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
											<a href="{{asset('admin/bill/delete/'.$cus->bill_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-success">
				<div class="panel-heading">Danh sách hóa đơn đã giao</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Tên khách hàng</th>
										<th>E-mail</th>
										<th>Số điện thoại</th>
										<th>Ngày mua</th>
										<th>Trạng thái</th>
										<th width="16%">Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $cus)
									@if($cus->bill_trangthai == 2)
									<tr>
										<td>{{$cus->cus_id}}</td>
										<td>{{$cus->cus_name}}</td>
										<td>{{$cus->cus_email}}</td>
										<td>{{$cus->cus_phone}}</td>
										<td>{{$cus->created_at}}</td>
										<td>@if($cus->bill_trangthai == 2) Đã giao @endif</td>
										<td>
											<a href="{{asset('admin/bill/edit/'.$cus->bill_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
											<a href="{{asset('admin/bill/delete/'.$cus->bill_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-danger">
				<div class="panel-heading">Danh sách hóa đơn đã hủy</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Tên khách hàng</th>
										<th>E-mail</th>
										<th>Số điện thoại</th>
										<th>Ngày mua</th>
										<th>Trạng thái</th>
										<th width="16%">Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $cus)
									@if($cus->bill_trangthai == 3)
									<tr>
										<td>{{$cus->cus_id}}</td>
										<td>{{$cus->cus_name}}</td>
										<td>{{$cus->cus_email}}</td>
										<td>{{$cus->cus_phone}}</td>
										<td>{{$cus->created_at}}</td>
										<td>@if($cus->bill_trangthai == 3) Hủy đơn hàng @endif</td>
										<td>
											<a href="{{asset('admin/bill/edit/'.$cus->bill_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
											<a href="{{asset('admin/bill/delete/'.$cus->bill_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop