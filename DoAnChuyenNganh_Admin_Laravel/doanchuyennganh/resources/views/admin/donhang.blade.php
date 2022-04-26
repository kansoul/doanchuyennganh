@extends('admin.admin')

@section('title')
Dashboard | DANH SÁCH KHÁCH HÀNG
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">DANH SÁCH GIỎ HÀNG </h4>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Thêm giỏ hàng</button>
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
								<h5 class="modal-title" id="exampleModalLabel">THÊM GIỎ HÀNG</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
							</div>
							<div class="modal-body has-success">
								<form action="addcart" method="POST" >
									{{ csrf_field() }}
									{{ method_field('POST') }}
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">ID Sản phẩm :</label>
										<input type="number" class="form-control" name="id_sp" id="recipient-name">
									</div>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">ID Khách hàng :</label>
										<input type="number" class="form-control" name="id_customer" id="recipient-name">
									</div>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Số lượng :</label>
										<input type="number" class="form-control" name="qlt" id="recipient-name">
									</div>

                                    <div class="form-group">
										<label for="recipient-name" class="col-form-label">Note :</label>
										<input type="number" class="form-control" name="note" id="recipient-name">
									</div>
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Status :</label>
										<input type="number" class="form-control" name="status" id="recipient-name">
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
							<th> Mã khách hàng</th>
							<th> Tên khách hàng</th>
                            <th> Tên sản phẩm</th>
                            <th> Số lượng</th>
                            <th> Tổng giá cả</th>
							<th> Ghi chú </th>
							<th> Tình trạng </th>
							<th class="text-center">Tác vụ</th>
						</thead>
							<tbody >
								@php
						$count = 1;
						
						@endphp
						@foreach ($cart as $row)
						<tr>
						@php
						$p=$row->qlt
						
						@endphp
						@php
						$c=$row->price
						
						@endphp

						@php
						$pri=$p * $c
						
						@endphp
						
						
							<td class="text-center">{{$count++ }}</td>
							<td>{{ $row->mkh}}</td>
                            <td>{{ $row->name}}</td>
                            <td>{{ $row->title}}</td>
                            <td>{{ $row->qlt}}</td>
							<td>{{ $pri }}</td>
							<td>{{ $row->note }}</td>
							<td>{{ $row->status }}</td>
			
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
												<form action="update-cart/{{ $row->id}}" method="POST" enctype="multipart/form-data">
													{{ csrf_field() }}
													{{ method_field('PUT') }}

                                                    <fieldset disabled>
														<div class="form-group">
														  <label for="disabledTextInput">ID</label>
														  <input type="text" id="disabledTextInput" class="form-control"  name="id" value="{{ $row->id}}" >
														</div>
													</fieldset>

                                                    <div class="form-group">
														<label for="recipient-name" class="col-form-label">ID Sản phẩm :</label>
														<input type="number" class="form-control" name="id_sp" id="recipient-name" value="{{ $row -> id_sp}}">
													</div>
													<div class="form-group">
														<label for="recipient-name" class="col-form-label">ID Khách hàng :</label>
														<input type="number" class="form-control" name="id_customer" id="recipient-name" value="{{ $row -> id_customer}}">
													</div>
													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Số lượng :</label>
														<input type="number" class="form-control" name="qlt" id="recipient-name" value="{{ $row -> qlt}}">
													</div>

													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Note :</label>
														<input type="number" class="form-control" name="note" id="recipient-name" value="{{ $row -> note}}">
													</div>
													<div class="form-group">
														<label for="recipient-name" class="col-form-label">Status :</label>
														<input type="number" class="form-control" name="status" id="recipient-name" value="{{ $row -> status}}">
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
								<form action="delete-cart/{{ $row->id }}" method="POST" class="btn btn-sm btn-icon">
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
							{{ $cart->links() }}
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