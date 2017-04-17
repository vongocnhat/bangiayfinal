<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\NL_Checkout;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        return view('quanly.order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cusproduct.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        //set temp customer
        $_SESSION['customer'] = $request->toArray();
        if(!empty($_SESSION["productdetails"]))
        {
            
            $TotalQuantity = 0;
            $TotalPrice = 0;
            foreach ($_SESSION["productdetails"] as $value) {
                $TotalQuantity += $value['Quantity'];
                // if PricePromotion > 0 Price = PricePromotion
                $TotalPrice += $value['Price']*$value['Quantity'];
            }

            //////////////////////////////////Ngan Luong
            $this->NganLuong($request, $TotalPrice, $TotalQuantity);
        }
        else
        {
            return redirect(route('cusproduct.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $orderdetails = OrderDetail::where('IdOrder', $id)->get();
        return view('quanly.orderdetail.index', ['orderdetails' => $orderdetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $orderdetails = OrderDetail::where('IdOrder', $id)->get();
        foreach ($orderdetails as $orderdetail)
        {
            $orderdetail->delete();
        }
        $order = Order::findorfail($id);
        $Name = $order->Name;
        $order->delete();
        return redirect()->route('order.index')->with('notify', 'Deleted Order: '.$Name.' Successfully');
    }

    public function NganLuong(Request $request, $TotalPrice, $TotalQuantity)
    {
        if (isset($_POST['submit'])) {
            // Lấy các tham số để chuyển sang Ngânlượng thanh toán:

         //$ten= $_POST["txt_test"];
            $receiver= "volam22714611@gmail.com";
            //Mã đơn hàng 
            $order_code= time();
            //Khai báo url trả về 
            // $return_url= $_SERVER['HTTP_REFERER']. "/success.php";
            $return_url= route('order.success');
            // Link nut hủy đơn hàng
            $cancel_url= $_SERVER['HTTP_REFERER'];
            //Giá của cả giỏ hàng 
            $txh_name = $request->Name;
            $txt_email = $request->Email;
            $txt_phone = $request->Phone;
            $price = $TotalPrice;
            //Thông tin giao dịch
            $transaction_info="Thong tin giao dich";
            $currency= "vnd";
            $quantity= $TotalQuantity;
            $tax=0;
            $discount=0;
            $fee_cal=0;
            $fee_shipping=0;
            $product_description = '';
            $i = 0;            
            foreach ($_SESSION["productdetails"] as $productdetail) {
                $i++;
                $product_description .= $i.'. '.$productdetail['Name'].' | ';
            }                
            $order_description="Thông tin đơn hàng: ".$product_description;
            $buyer_info=$txh_name."*|*".$txt_email."*|*".$txt_phone;
            $affiliate_code="";
            //Khai báo đối tượng của lớp NL_Checkout
            $nl= new NL_Checkout();
            $nl->nganluong_url = 'https://www.nganluong.vn/checkout.php';
            $nl->merchant_site_code = '50448';
            $nl->secure_pass = '888b19322eb42977e71bb3d303bfa71b';
            //Tạo link thanh toán đến nganluong.vn
            $url= $nl->buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount, $fee_cal, $fee_shipping, $order_description, $buyer_info, $affiliate_code);
            //$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
            
            
            //echo $url; die;
            if ($order_code != "") {
                //một số tham số lưu ý
                //&cancel_url=http://yourdomain.com --> Link bấm nút hủy giao dịch
                //&option_payment=bank_online --> Mặc định forcus vào phương thức Ngân Hàng
                $url .='&cancel_url='. $cancel_url;
                //$url .='&option_payment=bank_online';
                
                echo '<meta http-equiv="refresh" content="0; url='.$url.'" >';
                //&lang=en --> Ngôn ngữ hiển thị google translate
            }
        }
    }

    public function success()
    {
        if (isset($_GET['payment_id'])) {
            // Lấy các tham số để chuyển sang Ngânlượng thanh toán:
            $transaction_info =$_GET['transaction_info'];
            $order_code =$_GET['order_code'];
            $price =$_GET['price'];
            $payment_id =$_GET['payment_id'];
            $payment_type =$_GET['payment_type'];
            $error_text =$_GET['error_text'];
            $secure_code =$_GET['secure_code'];
            //Khai báo đối tượng của lớp NL_Checkout
            $nl= new NL_Checkout();
            $nl->merchant_site_code = '50448';
            $nl->secure_pass = '888b19322eb42977e71bb3d303bfa71b';
            //Tạo link thanh toán đến nganluong.vn
            $checkpay= $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
            
            if ($checkpay) {    
                // echo 'Payment success: <pre>';
                // bạn viết code vào đây để cung cấp sản phẩm cho người mua

                //order
                $order = new Order;                
                session_start();
                foreach($_SESSION['customer'] as $key => $customer )
                {
                    if($key != '_token' && $key !='submit')
                    {
                        $order->$key = $customer;
                    }
                }
                $TotalQuantity = 0;
                $TotalPrice = 0;
                foreach($_SESSION['productdetails'] as $productdetail)
                {
                    $TotalQuantity += $productdetail['Quantity'];
                    $TotalPrice += $productdetail['Price'] * $productdetail['Quantity'];
                    //order detail
                    $orderdetail = new OrderDetail;
                    $orderdetail->IdOrder = $order_code;
                    $orderdetail->IdProductDetail = $productdetail['id'];
                    $orderdetail->Quantity = $productdetail['Quantity'];
                    $orderdetail->save();

                    //tăng số lượng hàng đã bán trong view product
                    $product = Product::findorfail($productdetail['IdProduct']);
                    $product->BestSeller += $productdetail['Quantity'];
                    $product->save();
                }
                $order->TotalQuantity = $TotalQuantity;
                $order->TotalPrice = $TotalPrice;
                $order->id = $order_code;
                $order->save();

                unset($_SESSION['customer']);
            }
            else{
                echo "payment failed";
            }
        }
    }
}