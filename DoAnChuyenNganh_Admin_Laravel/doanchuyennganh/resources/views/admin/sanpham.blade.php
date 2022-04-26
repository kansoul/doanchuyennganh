@extends('admin.admin')

@section('title')
Dashboard | DANH SÁCH SẢN PHẨM
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">DANH SÁCH SẢN PHẨM </h4>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Thêm sản phẩm</button>
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
								<h5 class="modal-title" id="exampleModalLabel">NHẬP SẢN PHẨM</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="addsanpham" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Tên sản phẩm :</label>
										<input type="text" class="form-control" name="title" id="title">
									</div>

									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Loại sản phẩm :</label>
										<input type="text" class="form-control" name="type" id="type">
									</div>
									<br/>
									<div class="form-group">
										<label for="exampleFormControlFile1">Chọn ảnh 1</label>
										<input type="file" class="form-control" id="img1"  name="img1"/>
									</div>
									<br/>
									<br/>
									<br/>
									<div class="form-group">
										<label for="exampleFormControlFile1">Chọn ảnh 2 (nếu có)</label>
										<input type="file" class="form-control" id="img2"  name="img2"/>
									</div>
									<br/>
									<br/>
									<br/>
									<div class="form-group">
										<label for="exampleFormControlFile1">Chọn ảnh 3 (nếu có)</label>
										<input type="file" class="form-control" id="img3"  name="img3"/>
									</div>
									<br/>
									<br/>
									<br/>
                                    <div class="form-group">
										<label for="recipient-name" class="col-form-label">Số lượng :</label>
										<input type="number" class="form-control" name="qlt" id="qlt">
									</div>

                                    <div class="form-group">
										<label for="recipient-name" class="col-form-label">Giá cả :</label>
										<input type="number" class="form-control" name="price" id="price">
									</div>

									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Mã sản phẩm :</label>
										<input type="text" class="form-control" name="msp" id="msp">
									</div>

									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Thông tin :</label>
										<input type="text" class="form-control" name="description" id="isPopular">
									</div>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Yêu thích :</label>
										<input type="number" class="form-control" name="isPopular" id="isPopular">
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
							<th> Tên sản phẩm</th>
							<th> Ảnh 1</th>
							<th> Ảnh 2</th>
							<th> Ảnh 3</th>
							<th> Loại sản phẩm</th>
                            <th> Số lượng</th>
                            <th> Giá cả</th>
                            <th> Mã sản phẩm</th>
							<th> Thông tin</th>
							<th> Yêu thích</th>
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						@endphp
						@foreach ($sanpham as $row)
						<tr>
							<td class="text-center">{{$count++ }}</td>
							<td>{{ $row->title}}</td>
							<td>  <img src="{{url('/upload/product/'.$row->img1)}}" width="150" height="150"></td>
							<td>  <img src="{{url('/upload/product/'.$row->img2)}}" width="150" height="150"></td>
							<td>  <img src="{{url('/upload/product/'.$row->img3)}}" width="150" height="150"></td>
                            <td>{{ $row->type}}</td>
                            <td>{{ $row->qlt}}</td>
                            <td>{{ $row->price}}</td>
							<td>{{ $row->msp }}</td>
							<td>{{ $row->description }}</td>
							<td>{{ $row->isPopular }}</td>
			
							<td class="td-actions text-center">
								<a href="#">
									
									<button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sửa sản phẩm" data-target="#acc{{$row->id}}" data-whatever="@getbootstrap"><i class="now-ui-icons business_badge"></i></button>
								</a>

								<div class="modal fade" id="acc{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Sửa thông tin sản phảm</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body has-success">
												<form action="update-sanpham/{{ $row->id}}" method="POST" enctype="multipart/form-data">
													{{ csrf_field() }}
													{{ method_field('PUT') }}

													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Tên sản phẩm :</label>
														<input type="text" class="form-control" name="title" id="title" value="{{ $row -> title}}">
													</div>

													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Loại sản phẩm :</label>
														<input type="text" class="form-control" name="type" id="type" value="{{ $row -> type}}">
													</div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Chọn ảnh 1</label>
														<input type="file" class="form-control" id="img1"  name="img1"/>
													</div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Chọn ảnh 2 (nếu có)</label>
														<input type="file" class="form-control" id="img2"  name="img2"/>
													</div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Chọn ảnh 3 (nếu có)</label>
														<input type="file" class="form-control" id="img3"  name="img3"/>
													</div>
													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Số lượng :</label>
														<input type="number" class="form-control" name="qlt" id="qlt" value="{{ $row -> qlt}}">
													</div>

													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Giá cả :</label>
														<input type="number" class="form-control" name="price" id="price" value="{{ $row -> price}}">
													</div>

													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Mã sản phẩm :</label>
														<input type="text" class="form-control" name="msp" id="msp" value="{{ $row -> msp}}">
													</div>

													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Thông tin :</label>
														<input type="text" class="form-control" name="description" id="description" value="{{ $row -> description}}">
													</div>
													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Yêu thích :</label>
														<input type="number" class="form-control" name="isPopular" id="isPopular"value="{{ $row -> isPopular}}">
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
								<form action="delete-sanpham/{{ $row->id }}" method="POST" class="btn btn-sm btn-icon">
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
							{{ $sanpham->links() }}
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
@endsection