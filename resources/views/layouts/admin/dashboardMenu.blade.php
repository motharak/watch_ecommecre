<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('uploads')}}/{{session('picture')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{session('username')}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{url('/admin/dashboard')}}" class="nav-item nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('adminUser')}}" class="nav-item nav-link {{request()->is('admin/users') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Users</a>
                    <a href="{{route('adminCategory')}}" class="nav-item nav-link {{ request()->is('admin/category') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Category</a>
                    <a href="{{url('/admin/product')}}" class="nav-item nav-link {{ request()->is('admin/product') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Product</a>
                </div>
            </nav>
        </div>
