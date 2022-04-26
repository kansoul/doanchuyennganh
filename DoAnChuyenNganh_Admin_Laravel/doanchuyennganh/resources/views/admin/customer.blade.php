@extends('admin.admin')

@section('title')
Dashboard | DANH SÁCH KHÁCH HÀNG
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">DANH SÁCH KHÁCH HÀNG </h4>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Thêm người dùng</button>
				<div class="input-group no-border">
                <input id="myInput" type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
				@if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status') }}
                          {{-- 	<button   type="submit" rel="tooltip"  class="flex-row-reverse btn btn-danger btn-sm btn-icon navbar-right" >
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
                        </div>
                    @endif

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">THÊM NGƯỜI DÙNG</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="addcustomer" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Họ và tên :</label>
										<input type="text" class="form-control" name="name" id="recipient-name">
									</div>
									<div class="form-group">
										<label for="exampleFormControlFile1">Chọn ảnh</label>
										<input type="file" class="form-control" id="img"  name="img"/>
									</div>								
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Số điện thoại :</label>
										<input type="number" class="form-control" name="phone" id="recipient-name">
									</div>

                                    <div class="form-group">
										<label for="recipient-name" class="col-form-label">Địa chỉ :</label>
										<input type="text" class="form-control" name="address" id="recipient-name">
									</div>

                                    <div class="form-group">
										<label for="recipient-name" class="col-form-label">Tên đăng nhập :</label>
										<input type="text" class="form-control" name="username" id="recipient-name">
									</div>

									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Mật khẩu :</label>
										<input type="password" class="form-control" name="password" id="recipient-email">
									</div>

									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Mã khách hàng :</label>
										<input type="text" class="form-control" name="mkh" id="recipient-pass">
									</div>
									
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
								<button type="submit" class="btn btn-primary">Thêm</button>
							</div>
							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary ">
						
							<th class="text-center"> STT </th>
							<th> Họ và tên</th>
							<th> Avatar</th>
							<th> Số điện thoại</th>
                            <th> Địa chỉ</th>
                            <th> Tên đăng nhập</th>
                            <th> Mật khẩu</th>
							<th> Mã khách hàng</th>
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						@endphp
						@foreach ($customer as $row)
						<tr>
							<td class="text-center">{{$count++ }}</td>
							<td>{{ $row->name}}</td>
							<td>  <img src="{{url('/upload/user/'.$row->img)}}" width="150" height="150"></td>
                            <td>{{ $row->phone}}</td>
                            <td>{{ $row->address}}</td>
                            <td>{{ $row->username}}</td>
							<td>{{ $row->password }}</td>
							<td>{{ $row->mkh }}</td>
			
							<td class="td-actions text-center">
								<a href="#">
									
									<button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sửa sản phẩm" data-target="#acc{{$row->id}}" data-whatever="@getbootstrap"><i class="now-ui-icons business_badge"></i></button>
								</a>

								<div class="modal fade" id="acc{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body has-success">
												<form action="update-customer/{{ $row->id}}" method="POST" enctype="multipart/form-data">
													{{ csrf_field() }}
													{{ method_field('PUT') }}

                                                    <fieldset disabled>
														<div class="form-group">
														  <label for="disabledTextInput">ID</label>
														  <input type="text" id="disabledTextInput" class="form-control"  name="id" value="{{ $row->id}}" >
														</div>
													</fieldset>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Họ và tên :</label>
                                                        <input type="text" class="form-control" name="name" id="recipient-name" value="{{ $row -> name}}">
                                                    </div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Chọn ảnh</label>
														<input type="file" class="form-control" id="img"  name="img"/>
													</div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Phone :</label>
                                                        <input type="number" class="form-control" name="phone" id="recipient-name" value="{{ $row -> phone}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Địa chỉ :</label>
                                                        <input type="text" class="form-control" name="address" id="recipient-name" value="{{ $row -> address}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Tên đăng nhập :</label>
                                                        <input type="text" class="form-control" name="username" id="recipient-name" value="{{ $row -> username}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Password :</label>
                                                        <input type="text" class="form-control" name="password" id="recipient-email" value="{{ $row -> password}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Mã khách hàng :</label>
                                                        <input type="text" class="form-control" name="mkh" id="recipient-pass" value="{{ $row -> mkh}}">
									                </div>
													

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
													<button type="submit" class="btn btn-primary">Cập nhật</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>


							


							<a>
								<form action="delete-customer/{{ $row->id }}" method="POST" class="btn btn-sm btn-icon">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button   type="submit" rel="tooltip"  class="btn btn-danger btn-sm btn-icon" >
										<i class="now-ui-icons ui-1_simple-remove"></i>
									</button>
								</form>
							</a>
							</td>
							<tr>
						@endforeach
						
							</tbody>
							
						</table>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							{{ $customer->links() }}
						</div>
					</div>
					</table>
				</div>
			</div>
		</div>
	</div>
	
@endsection


@section('scripts')
{{-- expr --}}
@endsectioncustomer.blade.php