        <div id="page-wrapper">
            <div class="container-fluid" >
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><button class="anmenu btn btn-success">Ẩn Menu</button></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    @if(session('notify'))
                        <div class="alert alert-success">
                            {{ session('notify') }}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    @yield('content')
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>