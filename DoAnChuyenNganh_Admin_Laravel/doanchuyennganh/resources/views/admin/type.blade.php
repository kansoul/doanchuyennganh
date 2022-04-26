@extends('admin.admin')

@section('title')
Dashboard | DANH SÁCH LOẠI SẢN PHẨM
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">DANH SÁCH LOẠI SẢN PHẨM </h4>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Thêm loại sản phẩm</button>
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
								<h5 class="modal-title" id="exampleModalLabel">NHẬP LOẠI SẢN PHẨM</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="addtype" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Tên loại sản phẩm :</label>
										<input type="text" class="form-control" name="name" id="recipient-name">
									</div>
									
									<div class="form-group">
										<label for="exampleFormControlFile1">Chọn ảnh</label>
										<input type="file" class="form-control" id="lylich"  name="img"/>
									</div>
									<br>
									<br>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Lên trang nhất (Yes/No):</label>
										<input type="text" class="form-control" name="hot" id="recipient-name">
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
							<th> Tên loại sản phẩm</th>
							<th> Ảnh</th>
							<th> Slide</th>
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						@endphp
						@foreach ($type as $row)
						<tr>
							<td class="text-center">{{$count++ }}</td>
							<td>{{ $row->name}}</td>
							
							<td>  <img src="{{url('/upload/slide/'.$row->img)}}" width="150" height="150"></td>
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
												<form action="update-type/{{ $row->id}}" method="POST" enctype="multipart/form-data">
													{{ csrf_field() }}
													{{ method_field('PUT') }}

                                                    <fieldset disabled>
														<div class="form-group">
														  <label for="disabledTextInput">ID loại sản phẩm</label>
														  <input type="text" id="disabledTextInput" class="form-control"  name="xeid" value="{{ $row->id}}" >
														</div>
													</fieldset>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Tên loại sản phẩm :</label>
                                                        <input type="text" class="form-control" name="name" id="recipient-name" value="{{ $row -> name}}">
                                                    </div>
													<div class="form-group">
														<label for="exampleFormControlFile1">Chọn ảnh</label>
														<input type="file" class="form-control-file" name="img" id="exampleFormControlFile1 value="{{ $row -> img}}">
													</div>
													<div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Slide :</label>
                                                        <input type="text" class="form-control" name="hot" id="recipient-name" value="{{ $row -> hot}}">
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
								<form action="delete-type/{{ $row->id }}" method="POST" class="btn btn-sm btn-icon">
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
							{{ $type->links() }}
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