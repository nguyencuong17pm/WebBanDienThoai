@extends('admin.master')
@section('title', 'Chương Trình Khuyến Mãi')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Khuyến Mãi</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách chương trình khuyến mãi</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<a href="{{asset('admin/khuyenmai/add')}}" class="btn btn-primary">Thêm chương trình</a>
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th width="10%">ID</th>
										<th>Tên chương trình</th>
										<th>Ngày thêm</th>
										<th>Trạng thái</th>
										<th width="15%">Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($khuyenmai as $km)
									<tr>
										<td>{{$km->km_id}}</td>
										<td>{{$km->km_name}}</td>
										<td>{{$km->created_at}}</td>
										<td>
											@if($km->km_trangthai == 1) 
												Đã kích hoạt 
											@else
												Chưa kích hoạt
											@endif
										</td>
										<td>
											<a href="{{asset('admin/khuyenmai/edit/'.$km->km_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
											<a href="{{asset('admin/khuyenmai/delete/'.$km->km_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
										</td>
									</tr>
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