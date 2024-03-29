@extends('admin.master')
@section('title', 'Sản Phẩm')
@section('main')		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Sửa sản phẩm</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group" >
									<label>Tên sản phẩm</label>
									<input required type="text" name="name" class="form-control" value="{{$prodlist->prod_name}}">
								</div>
								<div class="form-group" >
									<label>Giá sản phẩm</label>
									<input required type="number" name="price" class="form-control" value="{{$prodlist->prod_gia}}">
								</div>
								<div class="form-group" >
									<label>Giá khuyến mãi</label>
									<input required type="number" name="giakhuyenmai" class="form-control" value="{{$prodlist->prod_giakhuyenmai}}">
								</div>
								<div class="form-group" >
									<label>Ảnh sản phẩm</label>
									<input id="img" type="file" name="img" class="form-control" onchange="changeImg(this)" value="{{asset('lib/storage/app/avatar/'.$prodlist->pro_img)}}">
								</div>
								<div class="form-group" >
									<label>Phụ kiện</label>
									<input required type="text" name="accessories" class="form-control" value="{{$prodlist->prod_phukien}}">
								</div>
								<div class="form-group" >
									<label>Bảo hành</label>
									<input required type="text" name="warranty" class="form-control" value="{{$prodlist->prod_baohanh}}">
								</div>
								<div class="form-group" >
									<label>Qùa tặng</label>
									<input required type="text" name="promotion" class="form-control" value="{{$prodlist->prod_quatang}}">
								</div>
								<div class="form-group" >
									<label>Tình trạng</label>
									<input required type="text" name="condition" class="form-control" value="{{$prodlist->prod_tinhtrang}}">
								</div>
								<div class="form-group" >
									<label>Trạng thái</label>
									<select required name="status" class="form-control">
										<option value="1" @if($prodlist->prod_trangthai == 1) checked @endif>Còn hàng</option>
										<option value="0" @if($prodlist->prod_trangthai == 0) checked @endif>Hết hàng</option>
				                    </select>
								</div>
								<div class="form-group" >
									<label>Sản phẩm khuyến mãi</label><br>
									Có: <input type="radio" name="khuyenmai" value="1" @if($prodlist->prod_khuyenmai == 1) selected @endif>
									Không: <input type="radio" checked name="khuyenmai" value="0" @if($prodlist->prod_khuyenmai == 0) selected @endif>
								</div>
								<div class="form-group" >
									<label>Miêu tả</label>
									<textarea class="ckeditor" required name="description">{{$prodlist->prod_mieuta}}</textarea>
									<script type="text/javascript">
									var editor = CKEDITOR.replace('description',{
										language:'vi',
										filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
										filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
										filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
										filebrowserFlashUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
									});
									</script>
								</div>
								<div class="form-group" >
									<label>Danh mục</label>
									<select required name="cate" class="form-control">
										@foreach($catelist as $cate)
										<option value="{{$cate->cate_id}}" @if($prodlist->prod_cate == $cate->cate_id) selected @endif>{{$cate->cate_name}}</option>
										@endforeach
				                    </select>
								</div>
								<div class="form-group" >
									<label>Sản phẩm nổi bật</label><br>
									Có: <input type="radio" name="featured" value="1" @if($prodlist->prod_spdatbiet == 1) selected @endif>
									Không: <input type="radio" checked name="featured" value="0" @if($prodlist->prod_spdatbiet == 0) selected @endif>
								</div>
								<input type="submit" name="submit" value="Lưu" class="btn btn-primary">
								<a href="#" class="btn btn-danger">Hủy bỏ</a>
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