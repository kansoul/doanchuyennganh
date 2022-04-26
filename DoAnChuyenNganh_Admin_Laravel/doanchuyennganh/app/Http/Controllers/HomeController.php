<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\type;
use App\customer;
use App\cart;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function trangadmin()
    {
    	return view('admin.admin');	
    }
    //sanpham
    public function sanphamtrangchu()
    {
        $sanpham = sanpham::all();
        $sanpham = sanpham::paginate(10);

        return view('admin.sanpham')->with('sanpham',$sanpham);
    }

    public function addsanpham(Request $request){
        $getimg1 = '';
	    if($request->hasFile('img1')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img1' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img1.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe1 = $request->file('img1');
		$getimg1 = time().'_'.$hinhthe1->getClientOriginalName();
		$destinationPath1 = public_path('upload/product');
		$hinhthe1->move($destinationPath1, $getimg1);
	    }
        //////////////////////////////
        $getimg2 = '';
	    if($request->hasFile('img2')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img2' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img2.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe2 = $request->file('img2');
		$getimg2 = time().'_'.$hinhthe2->getClientOriginalName();
		$destinationPath2 = public_path('upload/product');
		$hinhthe2->move($destinationPath2, $getimg2);
	    }
        $getimg3 = '';
	    if($request->hasFile('img3')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img3' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img3.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe3 = $request->file('img3');
		$getimg3 = time().'_'.$hinhthe3->getClientOriginalName();
		$destinationPath3 = public_path('upload/product');
		$hinhthe3->move($destinationPath3, $getimg3);
	    }
        sanpham::create([
            'title' => $request['title'],
            'img1'=>$getimg1 ,
            'img2'=>$getimg2 ,
            'img3'=>$getimg3 ,
            'type'=>$request['type'] ,
            'qlt'=>$request['qlt'] ,
            'price'=>$request['price'] ,
            'msp'=>$request['msp'] ,
            'description'=>$request['description'],
            'isPopular'=>$request['isPopular'] 
        ]);
        return redirect()->route('sanpham')->with('status','Thêm thành công');
    }

    public function updatesanpham(Request $request ,$id)
    {
        $getimg1 = '';
	    if($request->hasFile('img1')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img1' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img1.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe1 = $request->file('img1');
		$getimg1 = time().'_'.$hinhthe1->getClientOriginalName();
		$destinationPath1 = public_path('upload/product');
		$hinhthe1->move($destinationPath1, $getimg1);
	    }
        //////////////////////////////
        $getimg2 = '';
	    if($request->hasFile('img2')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img2' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img2.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe2 = $request->file('img2');
		$getimg2 = time().'_'.$hinhthe2->getClientOriginalName();
		$destinationPath2 = public_path('upload/product');
		$hinhthe2->move($destinationPath2, $getimg2);
	    }
        $getimg3 = '';
	    if($request->hasFile('img3')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img3' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img3.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe3 = $request->file('img3');
		$getimg3 = time().'_'.$hinhthe3->getClientOriginalName();
		$destinationPath3 = public_path('upload/product');
		$hinhthe3->move($destinationPath3, $getimg3);
	    }
        $sanpham = sanpham::find($id);
        $sanpham ->title = $request->input('title');
        $sanpham ->img1 = $getimg1;
        $sanpham ->img2 = $getimg2;
        $sanpham ->img3 = $getimg3;
        $sanpham ->type = $request->input('type');
        $sanpham ->qlt = $request->input('qlt');
        $sanpham ->price = $request->input('price');
        $sanpham ->msp = $request->input('msp');
        $sanpham ->description = $request->input('description');
        $sanpham ->isPopular = $request->input('isPopular');
        $sanpham ->update();

        return redirect()->route('sanpham')->with('status','Cập nhật thành công');
    }

    public function deletesanpham(Request $request,$id)
    {
        $sanpham =sanpham::findOrFail($id);
        $sanpham->delete();
        return redirect()->route('sanpham')->with('status','Xóa thành công');
    }

    //loaisp
    public function loaisp()
    {
        $type = type::all();
        $type = type::paginate(10);

        return view('admin.type')->with('type',$type);
    }

    public function addtype(Request $request){
        //dd($request);
        $gethinhthe = '';
	    if($request->hasFile('img')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe = $request->file('img');
		$gethinhthe = time().'_'.$hinhthe->getClientOriginalName();
		$destinationPath = public_path('upload/slide');
		$hinhthe->move($destinationPath, $gethinhthe);
	    }
        //dd($gethinhthe);
        type::create([
            'name' => $request['name'],
            'img' => $gethinhthe,
            'hot' => $request['hot'],
        ]);
        return redirect()->route('type')->with('status','Thêm thành công');
    }

    public function updatetype(Request $request ,$id)
    {
        $type = type::find($id);
        
        $gethinhthe1 = '';
	    if($request->hasFile('img')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe = $request->file('img');
		$gethinhthe1 = time().'_'.$hinhthe->getClientOriginalName();
		$destinationPath = public_path('upload/slide');
        //$hinhthe->delete($destinationPath, $type ->img);
		$hinhthe->move($destinationPath, $gethinhthe1);
        
        }
        
        $type ->name = $request->input('name');
        $type ->img = $gethinhthe1;
        $type ->hot = $request->input('hot');
        $type ->update();

        return redirect()->route('type')->with('status','Cập nhật thành công');
    }

    public function deletetype(Request $request,$id)
    {
        $type =type::findOrFail($id);
        $type->delete();
        return redirect()->route('type')->with('status','Xóa thành công');
    }

    //customer
    public function customer()
    {
        $customer = customer::all();
        $customer = customer::paginate(10);

        return view('admin.customer')->with('customer',$customer);
    }

    public function addcustomer(Request $request){
        $getimg1 = '';
	    if($request->hasFile('img')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img1' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img1.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe1 = $request->file('img');
		$getimg1 = time().'_'.$hinhthe1->getClientOriginalName();
		$destinationPath1 = public_path('upload/user');
		$hinhthe1->move($destinationPath1, $getimg1);
	    }
        customer::create([
            'name' => $request['name'],
            'img' => $getimg1,
            'phone'=>$request['phone'] ,
            'address'=>$request['address'] ,
            'username'=>$request['username'] ,
            'password'=>$request['password'] ,
            'mkh'=>$request['mkh']
        ]);
        return redirect()->route('customer')->with('status','Thêm thành công');
    }

    public function updatecustomer(Request $request ,$id)
    {   
        $getimg1 = '';
	    if($request->hasFile('img')){
		//Hàm kiểm tra dữ liệu
		    $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'img1' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'img1.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				
			]
		    );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe1 = $request->file('img');
		$getimg1 = time().'_'.$hinhthe1->getClientOriginalName();
		$destinationPath1 = public_path('upload/user');
		$hinhthe1->move($destinationPath1, $getimg1);
	    }
        $customer = customer::find($id);

        $customer ->name = $request->input('name');
        $customer ->img = $getimg1;
        $customer ->phone = $request->input('phone');
        $customer ->address = $request->input('address');
        $customer ->username = $request->input('username');
        $customer ->password = $request->input('password');
        $customer ->mkh = $request->input('mkh');
        $customer ->update();
        
        return redirect()->route('customer')->with('status','Cập nhật thành công');
    }

    public function deletecustomer(Request $request,$id)
    {
        $customer =customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer')->with('status','Xóa thành công');
    }

    //cart
    public function cart()
    {
        $cart = DB::table('cart as n')
        ->join('product as sp', 'n.id_sp', '=', 'sp.id')
        ->join('customer as cs', 'n.id_customer', '=', 'cs.id')
        ->select('n.*','sp.title','sp.price','cs.name','cs.mkh')
        ->paginate(10);

        return view('admin.donhang')->with('cart',$cart);
    }

	public function updatecart(Request $request ,$id)
    {   
        
        $cart = cart::find($id);

        $cart ->id_customer = $request->input('id_customer');
        $cart ->id_sp = $request->input('id_sp');
        $cart ->qlt = $request->input('qlt');
        $cart ->note = $request->input('note');
		$cart ->status = $request->input('status');

        $cart ->update();
        
        return redirect()->route('cart')->with('status','Cập nhật thành công');
    }

	public function addcart(Request $request){
		cart::create([
            'id_customer' => $request['id_customer'],
            'id_sp' => $request['id_sp'],
            'qlt' => $request['qlt'],
			
			'note' => $request['note'],
			'status' => $request['status'],
        ]);
        return redirect()->route('cart')->with('status','Thêm thành công');
	}

    public function deletecart(Request $request,$id)
    {
        $cart =cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('donhang')->with('status','Xóa thành công');
    }



}
