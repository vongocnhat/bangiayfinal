<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(adminsTableSeeder::class);
        
        for($i=0 ; $i < 20 ; $i++)
        {
            if($i == 0)
            {
    	       	DB::table('Products')->insert([
    	            'IdCategory' => $i+1,
    	            'Name' => 'Giầy lười da thật phong cách Châu Âu - FNU 01',
    	            'BestSeller' => $i+3,
    	            'MostViewed' => $i+4,
'Description' => 'MUA HÀNG : ĐỂ LẠI SDT + TÊN CỦA BẠN + ĐỊA CHỈ ► Hotline:(04) 37 478 378 - 098 9095 830 - 964 600 366 ► Số 331 Trần Đại Nghĩa',
                    'PricePromotion' => 0,
                    'Price' => 2000,
    	            'created_at' => date("Y-m-d H:i:s")
    	        ]);
            }
            else
            {
                DB::table('Products')->insert([
                    'IdCategory' => $i+1,
                    'Name' => $i+2,
                    'BestSeller' => $i+3,
                    'MostViewed' => $i+4,
                    'Description' => $i+5,
                    'PricePromotion' => $i+2000,
                    'Price' => $i+2001,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            if($i == 0)
            {
                DB::table('ProductDetails')->insert([
                    'IdProduct' => $i+1,
                    'Image' => ($i+1).'.jpg',
                    'Image2' => ($i+1).'.2.jpg',
                    'Image3' => ($i+1).'.3.jpg',
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            }
            else
                if($i == 1)
                {
                    DB::table('ProductDetails')->insert([
                        'IdProduct' => $i+1,
                        'Image' => ($i+1).'.jpg',
                        'Image2' => "",
                        'Image3' => "",
                        'created_at' => date("Y-m-d H:i:s")
                    ]);
                }
                else
                {
                    DB::table('ProductDetails')->insert([
                            'IdProduct' => $i+1,
                            'Image' => ($i+1).'.jpg',
                            'Image2' => "",
                            'Image3' => "",
                            'created_at' => date("Y-m-d H:i:s")
                        ]);
                }
            DB::table('ProductSQs')->insert([
                    'IdProductDetail' => $i+1,
                    'Quantity' => $i+4,
                    'Size' => $i+5,
                ]);
	       	DB::table('Categories')->insert([
	            'Name' => $i+1,
	            'created_at' => date("Y-m-d H:i:s")
	        ]);
            DB::table('admins')->insert([
                'Name' => $i,
                'User' => $i+1,
                'password' => bcrypt('nhat123'),
                'IsActive'=> (bool)rand(0,1),
                'created_at' => date("Y-m-d H:i:s")
            ]);
            DB::table('customers')->insert([
                'Name' => $i,
                'Gender' => (bool)rand(0,1),
                'Birthday' => date("Y-m-d", mt_rand(820454400,851990400)),
                'City' => $i+1,
                'Ward' => $i+1,
                'Address' => $i+2,
                'Phone' => $i+3,
                'Email' => ($i+4).'@gmail.com',
                'User' => $i+5,
                'Balance' => 0,
                'AccountNumber' => $i+100,
                'password' => bcrypt('123456'),
                'IsActive'=> (bool)rand(0,1),
                'created_at' => date("Y-m-d H:i:s")
            ]);
            // DB::table('orders')->insert([
            //     'Status' => (bool)rand(0,1),
            //     'Method' => $i+2,
            //     'TotalQuantity' => $i+3,
            //     'TotalPrice' => $i+4
            // ]);
            // DB::table('orderdetails')->insert([
            //     'IdOrder' => $i+1,
            //     'IdProductDetail' => $i+1,
            //     //Price, 
            //     'Quantity' => $i+2
            // ]);
            DB::table('feedbacks')->insert([
                'IdCustomer' => $i+1,
                // 'Name',
                // 'Email',
                // 'Phone',
                'Content' => $i+2,
            ]);
        }

        DB::table('admins')->insert([
        	'Name' => 'Võ Ngọc Nhật',
		    'User' => 'admin',
		    'password' => bcrypt('nhat123'),
		    'IsActive'=> 1,
		    'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('customers')->insert([
            'Name' => 'Nguyễn Hoàng Hải',
            'Gender' => 1,
            'Birthday' => '1996/12/24',
            'City' => 'Đà Nẵng',
            'Ward' => 'Thanh Khê Đông',
            'Address' => 'Đông Á',
            'Phone' => '321321',
            'Email' => '123456@gmail.com',
            'User' => 'guest',
            'Balance' => 0,
            'AccountNumber' => '555',
            'password' => bcrypt('123456'),
            'IsActive' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
