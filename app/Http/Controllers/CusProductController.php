<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CusProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//customer product
    public function index()
    {
        //        
        return view('cusproduct.product.index');
    }
    public function pagination($numpage)
    {
        if($numpage == 'All')
        {
            $products = Product::all();
            return view('cusproduct.product.productlist', ['products' => $products, 'all' => 'all']);
        }
        else
            $products = Product::paginate($numpage);
        return view('cusproduct.product.productlist', ['products' => $products]);
    }
    public function show($id)
    {
        //
        // session_start();
        // session_destroy();
        $product = Product::find($id);
        //checkview 5 minute add a view
        if(!isset($_COOKIE[$product->id]))
        {
            setcookie($product->id,"true", time() +300);
            $product->MostViewed += 1;
            $product->save();
        }
        return view('cusproduct.product.show', ['product' => $product]);
    }

//cart
    public function cart($idproductdetail, $Quantity, $Size, $xacdinh)
    {
        session_start();
        $productdetail = ProductDetail::findorfail($idproductdetail);
        $IdProductSQ;
        $InStock = 0;
        foreach($productdetail->ProductSQ as $productsq)
            if($Size == $productsq->Size)
            {
                $InStock = $productsq->Quantity;
                $IdProductSQ = $productsq->id;
            }
        if(!isset($_SESSION["productdetails"][$IdProductSQ]))
        {
            //create cart
            $productdetails = array();
            if($productdetail->Product->PricePromotion > 0)
            {
                $productdetail->Product->Price = $productdetail->Product->PricePromotion;
            }
            
            

            $productdetails[$IdProductSQ] = array('id' => $productdetail->id, 'IdProduct' => $productdetail->Product->id,'Name' => $productdetail->Product->Name, 'Image' => $productdetail->Image, 'Price' => $productdetail->Product->Price, 'InStock' => $InStock,'Quantity' => $Quantity, 'Size' => $Size);
            $_SESSION["productdetails"][$IdProductSQ] = $productdetails[$IdProductSQ];
        }
        else
        {
            //update cart xacminh dùng để biết đc đó là sửa giá trị ở cart hay là bấm nút add to cart
            if($xacdinh == 'ADD TO CART')
                $_SESSION["productdetails"][$IdProductSQ]['Quantity'] += $Quantity;
            else
                $_SESSION["productdetails"][$IdProductSQ]['Quantity'] = $Quantity;
        }
    }

    public function deleteproductincart($IdProductSQ)
    {
        session_start();
        unset($_SESSION["productdetails"][$IdProductSQ]);
    }

//signup
    public function signup()
    {
        return view('cusproduct.signup');
    }
    public function postsignup(Request $request)
    {
        //
        $this->validate($request, 
            [                
                'Email' => 'unique:customers',
                'User' => 'unique:customers',
            ],
            [
                'Email.unique' => 'Email already exists',
                'User.unique' => 'User already exists',
            ]);
        if($request->AccountNumber != '')
        {
            $this->validate($request, 
                [                
                    'AccountNumber' => 'unique:customers'
                ],
                [
                    'AccountNumber.unique' => 'AccountNumber already exists'
                ]);
        }
        $customer = new Customer;
        $customer->fill($request->all());
        $customer->save();        
        return redirect()->route('cusproduct.index');
    }

//login and logout
    public function login()
    {
        return view('cusproduct.login');
    }
    public function postlogin(Request $request)
    {
        if($request->radioLogin == 'not_login')
                return redirect(route('order.create'));

        if(Auth::guard('customers')->attempt(['User'=>$request->User, 'password'=>$request->password, 'IsActive' => 1]))
        {
            if($request->radioLogin == 'is_login')
                return redirect(route('order.create'));
            return redirect(route('cusproduct.index'));
        }
        else
        {
            // return redirect()->back()->withInput()->with('notify','User Or Password Not Correct Or User Blocking');
            echo 'false';
        }
    }
    public function logout()
    {
        Auth::guard('customers')->logout();
        return redirect(route('cusproduct.index'));
    }
}
