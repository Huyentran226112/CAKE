<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
                <!-- <li>
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li> -->
                <!-- Category -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-list-alt"></i>QUẢN LÍ THỂ LOẠI </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-tasks"></i><a href="/categories">Thể loại </a></li>
                        <li><i class="fa fa-trash-o"></i><a href="/trash">Thùng rác</a></li>
                    </ul>
                </li>

                <!-- Product -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-fire"></i>QUẢN LÍ SẢN PHẨM</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('products.index')}}">Sản phẩm</a></li>
                        <li><i class="fa fa-trash-o"></i><a href="{{route('products.trash')}}">Thùng rác</a></li>
                    </ul>
                </li>
                <!-- User -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa ti-user"></i>QUẢN LÍ NHÂN VIÊN </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user"></i><a href="">Nhân viên</a></li>
                        <li><i class="fa fa-users"></i><a href="">Nhóm nhân viên</a></li>
                    </ul>
                </li>

                <!-- Customer -->
                <li class="menu-item">
                    <a href="{{route('orders.index')}}"><i class="menu-icon fa fa-shopping-cart"></i>QUẢN LÍ ĐƠN
                        HÀNG</a>
                </li>

                <!-- Customer -->
                <li class="menu-item">
                    <a href=""><i class="menu-icon fa fa-users"></i>QUẢN LÍ KHÁCH HÀNG</a>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>