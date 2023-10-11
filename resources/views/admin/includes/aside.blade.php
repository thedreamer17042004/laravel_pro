<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('admin.dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                </ul>
            </li>
           
         
            <li class="treeview">
                <a href="">
                    <i class="fa fa-pie-chart"></i>
                    <span>Category</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.showCategorySort')}}"><i class="fa fa-circle-o"></i> Category</a></li>
                    <li><a href="{{route('admin.category.create')}}"><i class="fa fa-circle-o"></i> Add Category</a></li>
                    <li><a href="{{route('admin.category.create')}}"><i class="fa fa-circle-o"></i> SubCategory</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="">
                    <i class="fa fa-th"></i>
                    <span>Product</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.product.index')}}"><i class="fa fa-circle-o"></i> Products</a></li>
                    <li><a href="{{route('admin.product.create')}}"><i class="fa fa-circle-o"></i> Add Product</a></li>
                    <li><a href="{{route('admin.product.create')}}"><i class="fa fa-circle-o"></i> Out of Stock</a></li>
                    {{-- <li><a href="{{route('admin.product.create')}}"><i class="fa fa-circle-o"></i> Expired</a></li> --}}
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-laptop"></i>
                    <span>Posts</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Posts</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Add Post</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-edit"></i>
                    <span>Orders</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Order</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Pending Order</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Processing Order</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Completed Order</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Cancelled Order</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-table"></i>
                    <span>Customers</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.user.index')}}"><i class="fa fa-circle-o"></i> Customer</a></li>
                  
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-book"></i>
                    <span>Coupon</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Coupon</a></li>
                  
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-share"></i>
                    <span>Profile</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> My Profile</a></li>
                  
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-folder"></i>
                    <span>Access Control</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Permission</a></li>
                    <li><a href="{{route('admin.role.index')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
                  
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-envelope"></i>
                    <span>Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Settings</a></li>
                  
                </ul>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
