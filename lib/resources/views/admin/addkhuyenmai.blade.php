@extends('admin.master')
@section('title', 'Khuyến Mãi')
@section('main')	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Khuyến mãi</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Thêm Khuyến mãi</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								@include('errors.note')
								<div class="form-group" >
									<label>Tên khuyến mãi</label>
									<input required type="text" name="name" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ảnh khuyến mãi</label>
									<input required id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
								</div>
								<div class="form-group" >
									<label>Liên kết</label>
									<input required type="text" name="lienket" class="form-control">
								</div>
								<div class="form-group" >
									<label>Trạng thái</label>
									<select required name="status" class="form-control">
										<option value="0">Chưa kích hoạt</option>
										<option value="1">Đã kích hoạt</option>
				                    </select>
								</div>
								<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
								<a href="{{asset('admin/khuyenmai')}}" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
						{{csrf_field()}}
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop