@extends('frontend.master')
@section('title', 'Chi tiết')
@section('main')
	<link rel="stylesheet" href="css/details.css">


						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$item->pro_name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img width="250px" src="{{asset('lib/storage/app/avatar/'.$item->pro_img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{number_format($item->pro_price, 0, ',', '.')}}</span></p>
									<p>Bảo hành: 1 đổi 1 trong {{$item->pro_warranty}}</p>
									<p>Phụ kiện: {{$item->pro_accessories}}</p>
									<p>Tình trạng: {{$item->pro_condition}}</p>
									<p>Khuyến mại: {{$item->pro_promotion}}</p>
									<p>Còn hàng: @if($item->pro_status == 1) Còn hàng @else Hết hàng @endif</p>
									<p class="add-cart text-center"><a href="#">Đặt hàng online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">
								{!!$item->pro_description!!}
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="cmt_content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi bình luận</button>
									</div>
									{{csrf_field()}}
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach($comments as $cmt)
							<ul>
								<li class="com-title">
									{{$cmt->cmt_name}}
									<br>
									<span>{{date('d/m/y H:i:s', strtotime($cmt->created_at))}}</span>
								</li>
								<li class="com-details">
									{{$cmt->cmt_content}}
								</li>
							</ul>
							@endforeach
							<ul>
								<li class="com-title">
									Vietpro Education
									<br>
									<span>2017-19-01 10:00:00</span>	
								</li>
								<li class="com-details">
									HTC One X 32GB là sản phẩm đáng chờ đợi nhất trong năm nay, với cấu hình mạnh và giá thành tương đối mềm so với các dòng Smart Phone của các hãng khác
								</li>
							</ul>
							<ul>
								<li class="com-title">
									Vietpro Education
									<br>
									<span>2017-19-01 10:00:00</span>	
								</li>
								<li class="com-details">
									HTC One X 32GB là sản phẩm đáng chờ đợi nhất trong năm nay, với cấu hình mạnh và giá thành tương đối mềm so với các dòng Smart Phone của các hãng khác
								</li>
							</ul>
						</div>
@stop