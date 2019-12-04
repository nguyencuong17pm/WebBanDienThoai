@extends('admin.master')
@section('title', 'Chi Tiết Hóa Đơn')
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
				<div class="panel-heading">Thông tin khách hàng</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th width="20%">Tên khách hàng</th>
										<th width="20%">E-mail</th>
										<th width="20%">Số điện thoại</th>
										<th>Ngày mua</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{$customers->cus_id}}</td>
										<td>{{$customers->cus_name}}</td>
										<td>{{$customers->cus_email}}</td>
										<td>{{$customers->cus_phone}}</td>
										<td>{{$customers->created_at}}</td>
									</tr>
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Sản phẩm mua</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Giá</th>
									</tr>
								</thead>
								<tbody>
									<?php $tongSL = 0; $tongGia = 0; ?>
									@foreach($bill_detail as $b)
										<?php $tongSL += intval($b->bd_qty); $tongGia += intval($b->bd_gia); ?>
									<tr>
										<td>{{$b->bill_id}}</td>
										<td>{{$b->bd_tensp}}</td>
										<td>{{$b->bd_qty}}</td>
										<td>{{number_format($b->bd_gia)}} đ</td>
									</tr>
									@endforeach
									<tr style="color: red">
										<td colspan="2">Tổng tiền</td>
										<td colspan="1"> {{$tongSL}}</td>
										<td colspan="1"> {{number_format($tongGia)}} đ</td>
									</tr>
								</tbody>
							</table>
							<label>Trạng thái</label>
							<form method="post">
								<select required name="status" class="form-control" style="width: 30%">
									<option value="0">Chưa xử lý</option>
									<option value="1">Đang giao</option>
									<option value="2">Đã xử lý</option>
									<option value="3">Hủy đơn hàng</option>
			                    </select>
			                    <input type="submit" class="btn btn-primary" value="Xử lý" style="margin-top: 15px">
			                    {{csrf_field()}}
		                	</form>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop