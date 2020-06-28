<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductAsk;
use App\ProductAskReply;
use App\User;
use App\Destination;
use App\Category;
use App\CheckoutStatus;
use App\Notifications\ProductAskNotification;
use App\Notifications\ProductAskReplyNotification;
use Illuminate\Support\Facades\Auth;
use Srmklive\FlashAlert\Facades\FlashAlert;
use Notification;

class ProductController extends Controller
{


    protected $product;

    protected $user;

    protected $destination;

    protected $category;

    protected $product_ask;

    protected $checkout_status;

    protected $product_ask_reply;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Product $product , 
        User $user , 
        Destination $destination,
        Category $category,
        ProductAsk $product_ask,
        CheckoutStatus $checkout_status,
        ProductAskReply $product_ask_reply
    )
    {
        $this->product = $product;
        $this->user = $user;
        $this->destination = $destination;
        $this->category = $category;
        $this->product_ask = $product_ask;
        $this->checkout_status = $checkout_status;
        $this->product_ask_reply = $product_ask_reply;
        //$this->middleware('guest');
    }

    //render Product page
    public function index(Request $request)
    {
        //check if search query
        if(isset($request->search_query)){
            $products = $this->product->where('product_name','like','%'.$request->search_query.'%')->where('is_active' , 1)->whereDate('arrival_date','>=',now())->paginate(8);
        }else{
            //get product data
            $products = $this->product->where('is_active' , 1)->whereDate('arrival_date','>=',now())->orderBy('created_at','asc')->paginate(8);
        }

        //check if sort selected
        if(isset($request->sort)){
            if($request->sort == 'newest'){
                $products = $this->product->where('is_active' , 1)->whereDate('arrival_date','>=',now())->orderBy('created_at','asc')->paginate(8);
            }
            elseif($request->sort == 'popularity'){
                $products = $this->product->where('is_active' , 1)->whereDate('arrival_date','>=',now())->orderBy('capacity','desc')->paginate(8);
            }elseif($request->sort == 'lowprice'){
                $products = $this->product->where('is_active' , 1)->whereDate('arrival_date','>=',now())->orderBy('product_price','desc')->paginate(8);
            }elseif($request->sort == 'highprice'){
                $products = $this->product->where('is_active' , 1)->whereDate('arrival_date','>=',now())->orderBy('product_price','asc')->paginate(8);
            }
        }

        //check if category selected
        if(isset($request->category)){
            $cat_data = [];
            foreach ($request->category as $key => $value) {
                array_push($cat_data, $key);
            }
            //get product data by category
            if(isset($request->category) && !isset($request->destination)){
                $products = $this->product->whereIn('category_id',$cat_data)->where('is_active' , 1)->whereDate('arrival_date','>=',now())->paginate(8);
            }
        }
        if(isset($request->destination)){
            $dest_data = [];
            foreach ($request->destination as $key => $value) {
                array_push($dest_data, $key);
            }
            if(!isset($request->category) && isset($request->destination)){
            //get product data by destination
                $products = $this->product->whereIn('destination_id',$dest_data)->where('is_active' , 1)->whereDate('arrival_date','>=',now())->paginate(8);
            }
        }

        //if isset both filter
        if(isset($request->category) && isset($request->destination)){
            $products = $this->product->whereIn('destination_id',$dest_data)->whereIn('category_id',$cat_data)->where('is_active' , 1)->whereDate('arrival_date','>=',now())->paginate(8);
        }   

        //get categories data
        $categories = $this->category->where('is_active','1')->orderBy('category_name','asc')->get();

        //get destination data
        $destinations = $this->destination->where('is_active' , 1)->orderBy('destination_name','asc')->get();

        return view('storefront.products.products' , ['products' => $products , 'categories' => $categories , 'destinations' => $destinations]);
    }

    //render Product Detail
    public function productDetailView($id = null)
    {   
        if($id){
            //get detail data
            $product = $this->product->find($id);

            //var_dump($product->askProduct->count());
            //exit();
            $related_products = $this->product->where('destination_id', $product->destination_id)->whereDate('arrival_date','>=',now())->orderBy('created_at','asc')->where('is_active', 1)->paginate(6);
            return view('storefront.products.product_detail' , ['product' => $product , 'related_products' => $related_products]);
        }
    }


    //render admin Product page
    public function adminIndex()
    {
    	$products = $this->product->where('is_active',1)->orderBy('created_at','desc')->paginate(8);
        return view('admin.product' , ['products' => $products]);
    }

       //render Add Product page
    public function addProductIndex()
    {
        return view('storefront.products.add_product');
    }

    // get current user product view
    public function myProductIndex(){
        $current_user = Auth::user()->id;

        $products = $this->product->where('user_id',$current_user)->where('is_active' , 1)->orderBy('created_at','asc')->get();
        return view('storefront.accounts.myproduct' , ['products' => $products]);
    }

    // get current user product detail view
    public function myProductDetailIndex($id = null){

        if($id){
        $product = $this->product->find($id);
            if($product->is_active){
                $checkoutStatus = $this->checkout_status->all()->except([1,2]);
                return view('storefront.accounts.myproduct_detail' , ['product' => $product,'checkoutStatus' => $checkoutStatus]);
            }else{
                redirect('account/myproduct');
            }
        }
        return redirect()->back();

    }

   // get current user product add form
    public function myProductAddIndex(){
        //get destination data
        $destinations = $this->destination->where('is_active' , 1)->orderBy('destination_name','asc')->get();

        //get category data
        $categories = $this->category->where('is_active' , 1)->orderBy('category_name','asc')->get();
        
        return view('storefront.accounts.add_product' , ['destinations' => $destinations , 'categories' => $categories]);
    }

   // get current user product edit form
    public function myProductEditIndex($id = null){

        if($id){
            //get product data
            $product = $this->product->find($id);

            //get destination data
            $destinations = $this->destination->where('is_active' , 1)->orderBy('destination_name','asc')->get();

            //get category data
            $categories = $this->category->where('is_active' , 1)->orderBy('category_name','asc')->get();
            
            return view('storefront.accounts.edit_product' , ['product'=>$product,'destinations' => $destinations , 'categories' => $categories]);
        }
    } 

    //create product
    public function create(Request $request){

    //validasi form
    $validatedData = $request->validate([
        'product_name' => 'required|max:255',
        'product_price' => 'required | numeric',
        'description' => 'required|max:255',
        'product_image' => 'required',
        'destination' => 'required',
        'category' => 'required',
        'capacity' => 'required | numeric',
        'arrival_date' => 'required',
    ]);

        $current_user = Auth::user()->id;
        if($request->hasFile('product_image')){
            $filenameWithExt=$request->file('product_image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
            request()->product_image->move(public_path('productImage'), $fileNameToStore);
        }else{
            $fileNameToStore = 'product_placeholder.png';
        }

        $productData = $request->all();
        $productData['user_id'] = Auth::user()->id;
        $productData['destination_id'] = $request->destination;
        $productData['category_id'] = $request->category;
        $productData['product_image'] = $fileNameToStore;
        $productData['total_capacity'] = $request->capacity;
        $productData['capacity'] = 0;
        //create product
        $this->product->create($productData);

        FlashAlert::success('Berhasil', 'Barang '.$request->product_name.' berhasil ditambahkan');
        
        return redirect('account/myproduct');
    
    }

    //update product
    public function update(Request $request){

    //validasi form
    $validatedData = $request->validate([
        'product_name' => 'required|max:255',
        'product_price' => 'required | numeric',
        'description' => 'required|max:255',
        'destination' => 'required',
        'category' => 'required',
        'capacity' => 'required | numeric',
        'arrival_date' => 'required',
    ]);
    //find product data
        $productData = $this->product->find($request->product_id);
        if($request->hasFile('product_image')){
            $filenameWithExt=$request->file('product_image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
            request()->product_image->move(public_path('productImage'), $fileNameToStore);

            $productData['product_image'] = $fileNameToStore;
        }

        $productData['product_name'] = $request->product_name;
        $productData['product_price'] = $request->product_price;
        $productData['description'] = $request->description;
        $productData['destination_id'] = $request->destination;
        $productData['category_id'] = $request->category;
        $productData['total_capacity'] = $request->capacity;
        if($productData['total_capacity'] != $request->capacity){
            $prouctData['capacity'] = 0;
        }
        $productData['arrival_date'] = $request->arrival_date;
        //create product
        $productData->save();
        FlashAlert::success('Berhasil', $request->product_name.' berhasil diupdate');

        return redirect('account/myproduct');
    
    }

    //delete Product (soft delete)
    public function softDelete($id = null){
        if($id){
            $current_user = Auth::user();
            $product = $this->product->find($id);

            //in-activate product
            $product->is_active = 0;
            $product->save();

            //check if the one performing delete is admin
            if($current_user->is_admin){
                return redirect()->back();
            }
            FlashAlert::success('Berhasil','Barang berhasil dihapus');
            return redirect('account/myproduct');
        }
        return redirect('account/myproduct');
    }
    
    //post ask product
    public function productAsk(Request $request){
        //get current user
        $current_user = Auth::user();
        $product_ask_data =$this->product_ask->create([
            'user_id' => $current_user->id,
            'product_id' => $request->product_id,
            'content' => $request->comments
        ]);

        //find product
        $product = $this->product->find($request->product_id);
        Notification::send($product->user, new ProductAskNotification($product_ask_data));
        FlashAlert::success('Berhasil', 'Pertanyaan berhasil dipost');
        return redirect()->back();
    }

    public function productAskComment(Request $request){

        $product_ask_reply_data = $this->product_ask_reply->create([
            'product_ask_id' => $request->ask_id,
            'content' => $request->reply_comment
        ]);
        Notification::send($product_ask_reply_data->product_ask->user, new ProductAskReplyNotification($product_ask_reply_data));
        FlashAlert::success('Berhasil', 'Komen anda berhasil dipost');        
        return redirect()->back();
    }
}
