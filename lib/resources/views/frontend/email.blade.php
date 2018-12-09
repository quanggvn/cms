
	<link rel="stylesheet" href="css/email.css">
						<div id="khach-hang">
							<h3>Thông tin khách hàng</h3>
							<p>
								<span class="info">Khách hàng: </span>
								{{$info['name']}}
							</p>
							<p>
								<span class="info">Email: </span>
								{{$info['email']}}
							</p>
							<p>
								<span class="info">Điện thoại: </span>
								{{$info['phone']}}
							</p>
							<p>
								<span class="info">Địa chỉ: </span>
								{{$info['add']}}
							</p>
						</div>						
						<div id="hoa-don">
							<h3>Hóa đơn mua hàng</h3>							
							<table class="table-bordered table-responsive">
								<tr class="bold">
									<td width="30%">Tên sản phẩm</td>
									<td width="25%">Giá</td>
									<td width="20%">Số lượng</td>
									<td width="15%">Thành tiền</td>
								</tr>
								@foreach($cart as $item)
								<tr>
									<td>{{$item->name}}</td>
									<td class="price">{{number_format($item->price, 0, ',','.')}} VNĐ</td>
									<td>{{$item->qty}}</td>
									<td class="price">{{number_format($item->price*$item->qty, 0, ',','.')}} VNĐ</td>
								</tr>
								@endforeach
								<tr>
									<td>Tổng tiền:</td>
									<td colspan="3", align="right" >{{$total}} VND</td>
								</tr>
							</table>
						</div>
						<div id="xac-nhan">
							<br>
							<p align="justify">
								<b>Quý khách đã đặt hàng thành công!</b><br />
								• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
								• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
								<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
							</p>
						</div>

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Vietpro Academy thành lập năm 2009. Chúng tôi đào tạo chuyên sâu trong 2 lĩnh vực là Lập trình Website & Mobile nhằm cung cấp cho thị trường CNTT Việt Nam những lập trình viên thực sự chất lượng, có khả năng làm việc độc lập, cũng như Team Work ở mọi môi trường đòi hỏi sự chuyên nghiệp cao.</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 0968795507</p>
						<p>Email: giapvanngocquang@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: B8A Võ Văn Dũng - Hoàng Cầu Đống Đa - Hà Nội</p>
						<p>Address 2: Số 25 Ngõ 178/71 - Tây Sơn Đống Đa - Hà Nội</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Học viện Công nghệ Vietpro - www.vietpro.edu.vn</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2017 Vietpro Academy. All Rights Reserved</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->
