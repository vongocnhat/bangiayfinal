<div class="header">
    <div class="top-header">
        <a href="{{ route('cusproduct.index') }}" class="btn btn-success" style="position: fixed; padding: 5px; z-index: 1; top:0; opacity: 0.4;">Home</a>
        <div class="wrap">
            <div class="top-header-left">                
                <ul>
                    <li><a class="btn-viewcart cart" style="color: white; background-color: black; z-index: 1; position: fixed; top: 40px;"><span></span></a></li>                    
                </ul>
            </div>
            <div class="top-header-center">
                <div class="top-header-center-alert-left">
                    <h3>FREE DELIVERY</h3>
                </div>
                <div class="top-header-center-alert-right">
                    <div class="vticker">
                      {{-- <ul>
                          <li>Applies to orders of $50 or more. <label>Returns are always free.</label></li>
                      </ul> --}}
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="top-header-right">
            @if(Auth::guard('customers')->check())
                <ul>                
                    <li><a>Welcome: {{ Auth::guard('customers')->user()->Name }}</a><span> </span></li>
                    <li><a href="{{ route('cusproduct.logout') }}">Log Out</a></li>           
                </ul>
            @else
                <ul>
                    <li><a href="{{ route('cusproduct.login') }}">Log In</a><span> </span></li>
                    <li><a href="{{ route('cusproduct.signup') }}">Sign Up</a></li>
                </ul>
            @endif
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    <!--start-mid-head-->
    <div class="mid-header">
        <div class="wrap">
            <div class="mid-grid-left">
                <form>
                    <input type="text" placeholder="What Are You Looking for?" />
                </form>
            </div>
            <div class="mid-grid-right">
                <a class="logo" href="index.html"><span> </span></a>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap">
                <ul class="megamenu skyblue">
                     <li class="grid"><a class="color2" href="#">MEN</a>
                        {{--  <div class="megapanel">
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>popular</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">login</a></li>
                                        </ul>
                                    </div>
                                    <div class="h_nav"> 
                                        <h4 class="top">man</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="#">accessories</a></li>
                                            <li><a href="#">kids</a></li>
                                            <li><a href="#">style videos</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col1"> 
                                    <div class="h_nav">
                                        <h4>style zone</h4>
                                        <ul>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">brands</a></li>
                                        </ul>   
                                    </div>                       
                                </div>
                                <div class="col1"> 
                                    <div class="h_nav">
                                        <h4>style zone</h4>
                                        <ul>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">brands</a></li>
                                        </ul>   
                                    </div>                       
                                </div>
                                <div class="col1 men"> 
                                    <div class="men-pic">
                                        <img src="customer_assets/images/men.png" title="" />
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                    </li>
                    <li class="active grid"><a class="color4" href="#">women</a>
                         {{-- <div class="megapanel">
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>shop</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">brands</a></li>
                                        </ul>   
                                    </div>  
                                    <div class="h_nav">
                                        <h4>help</h4>
                                        <ul>
                                            <li><a href="products.html">trends</a></li>
                                            <li><a href="products.html">sale</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>                          
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>my company</h4>
                                        <ul>
                                            <li><a href="products.html">trends</a></li>
                                            <li><a href="products.html">sale</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>                                              
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>account</h4>
                                        <ul>
                                            <li><a href="products.html">login</a></li>
                                            <li><a href="products.html">create an account</a></li>
                                            <li><a href="products.html">create wishlist</a></li>
                                            <li><a href="products.html">my shopping bag</a></li>
                                            <li><a href="products.html">brands</a></li>
                                            <li><a href="products.html">create wishlist</a></li>
                                        </ul>   
                                    </div>                      
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>my company</h4>
                                        <ul>
                                            <li><a href="products.html">trends</a></li>
                                            <li><a href="products.html">sale</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>popular</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>
                                </div>
                                <div class="col1 women">
                                    <div class="women-pic">
                                        <img src="customer_assets/images/women.png" title="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col2"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                            </div>
                            </div>  --}}
                    </li>               
                    <li><a class="color5" href="#">KIDS</a>
                      {{--    <div class="megapanel">
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>popular</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">login</a></li>
                                        </ul>   
                                    </div>
                                    <div class="h_nav">
                                        <h4 class="top">man</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>style zone</h4>
                                        <ul>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">brands</a></li>
                                        </ul>   
                                    </div>                          
                                </div>
                                <div class="col1 kids">
                                    <div class="kids-pic">
                                        <img src="customer_assets/images/kids1.png" title="" />
                                    </div>
                                </div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                            </div>
                        </div>  --}}
                    </li>
                    <li><a class="color6" href="#">SPORTS</a>
                    {{--      <div class="megapanel">
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>shop</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">brands</a></li>
                                        </ul>   
                                    </div>  
                                    <div class="h_nav">
                                        <h4 class="top">my company</h4>
                                        <ul>
                                            <li><a href="products.html">trends</a></li>
                                            <li><a href="products.html">sale</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>                                              
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>man</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>                      
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>help</h4>
                                        <ul>
                                            <li><a href="products.html">trends</a></li>
                                            <li><a href="products.html">sale</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>                          
                                </div>
                                <div class="col1 sports">
                                    <div class="sports-pic">
                                        <img src="customer_assets/images/sport.png" title="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col2"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                            </div>
                        </div> --}} 
                    </li>
                    <li><a class="color7" href="#">NIKE SPORTSWEAR</a>
                        {{--  <div class="megapanel"> 
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>shop</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">brands</a></li>
                                        </ul>   
                                    </div>      
                                    <div class="h_nav">
                                        <h4>my company</h4>
                                        <ul>
                                            <li><a href="products.html">trends</a></li>
                                            <li><a href="products.html">sale</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>                  
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>help</h4>
                                        <ul>
                                            <li><a href="products.html">trends</a></li>
                                            <li><a href="products.html">sale</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>                          
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>my company</h4>
                                        <ul>
                                            <li><a href="products.html">trends</a></li>
                                            <li><a href="products.html">sale</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>                                              
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>account</h4>
                                        <ul>
                                            <li><a href="products.html">login</a></li>
                                            <li><a href="products.html">create an account</a></li>
                                            <li><a href="products.html">create wishlist</a></li>
                                            <li><a href="products.html">my shopping bag</a></li>
                                            <li><a href="products.html">brands</a></li>
                                            <li><a href="products.html">create wishlist</a></li>
                                        </ul>   
                                    </div>                      
                                </div>
                                <div class="col1 nike">
                                    <div class="nike-pic">
                                        <img src="customer_assets/images/nike.png" title="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col2"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                            </div>
                            </div> --}}
                    </li>
                    <li><a class="color8" href="#">NIKEiD</a>
                        {{-- <div class="megapanel">
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>style zone</h4>
                                        <ul>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">women</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">brands</a></li>
                                        </ul>   
                                    </div>                          
                                </div>
                                <div class="col1">
                                    <div class="h_nav">
                                        <h4>popular</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">men</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">login</a></li>
                                        </ul>   
                                    </div>
                                    <div class="h_nav">
                                        <h4 class="top">man</h4>
                                        <ul>
                                            <li><a href="products.html">new arrivals</a></li>
                                            <li><a href="products.html">accessories</a></li>
                                            <li><a href="products.html">kids</a></li>
                                            <li><a href="products.html">style videos</a></li>
                                        </ul>   
                                    </div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                            </div>
                        </div> --}}
                    </li> 
                    <li><a class="color8" href="{{ route('lien-he')}}">Liên Hệ</a>
                </ul>

        </div>
    </div>
</div>