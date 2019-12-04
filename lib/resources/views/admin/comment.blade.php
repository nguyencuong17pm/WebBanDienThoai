@extends('admin.master')
@section('title', 'Bình Luận')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Bình Luận</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách bình luận</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>Tên khách hàng</th>
										<th>E-mail</th>
										<th>Tên sản phẩm</th>
										<th>Nội dung</th>
									</tr>
								</thead>
								<tbody>
									@foreach($comment as $com)
									<tr>
										<td>{{$com->com_name}}</td>
										<td>{{$com->com_email}}</td>
										<td>{{$com->prod_name}}</td>
										<td>{{$com->com_content}}</td>
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