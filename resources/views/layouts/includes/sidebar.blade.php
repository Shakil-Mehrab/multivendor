         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                   <!-- sidebar menu -->
                   <ul class="sidebar-menu">
                    @if(auth()->user()->role_id==1)
                      <li class="active">
                         <a href="{{url('/dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                         <span class="pull-right-container">
                         </span>
                         </a>
                      </li>
                      <li class="">
                        <a href="{{url('/admin/banners')}}"><i class="fa fa-image"></i><span>Banners</span>
                        <span class="pull-right-container">
                        </span>
                        </a>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>Order</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="{{url('admin/view-order')}}">View Order</a></li>
                        </ul>
                     </li>
                      <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>Categories</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-category')}}">Add Category</a></li>
                        <li><a href="{{url('admin/view-categories')}}">View Categories</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-gift"></i><span>Coupons</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-coupon')}}">Add Coupon</a></li>
                        <li><a href="{{url('admin/view-coupons')}}">View Coupons</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>Discount</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-discount')}}">Add Discount</a></li>
                        <li><a href="{{url('admin/view-discount')}}">View Discount</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>Shop</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="{{url('admin/view-shop')}}">View Shop</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>User</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="{{url('admin/view-user')}}">View User</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>Country</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-country')}}">Add Country</a></li>
                        <li><a href="{{url('admin/view-country')}}">View Country</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>City</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-city')}}">Add City</a></li>
                        <li><a href="{{url('admin/view-city')}}">View City</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>Delivery Branch</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-delivery/branch')}}">Add Branch</a></li>
                        <li><a href="{{url('admin/view-delivery/branch')}}">View Branch</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-product-hunt"></i><span>Products</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-product')}}">Add Product</a></li>
                        <li><a href="{{url('admin/view-products')}}">View Products</a></li>
                        </ul>
                     </li>
                    @else
                    <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i><span>Shop</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="{{url('admin/view-shop')}}">View Shop</a></li>
                        </ul>
                     </li>
                    <li class="treeview">
                        <a href="#">
                        <i class="fa fa-product-hunt"></i><span>Products</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="{{url('admin/add-product')}}">Add Product</a></li>
                        <li><a href="{{url('admin/view-products')}}">View Products</a></li>
                        </ul>
                     </li>
                    @endif
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-gift"></i><span>Logout</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="#">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-responsive-nav-link>
                            </form>
                            </a></li>


                        </ul>
                     </li>
                   </ul>
                </div>
                <!-- /.sidebar -->
             </aside>
             <!-- =============================================== -->
