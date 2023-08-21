<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Syndron</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="{{ url('index') }}"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
                </li>
                <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="{{ url('app-emailbox') }}"><i class="bx bx-right-arrow-alt"></i>Email</a>
                </li>
                <li> <a href="{{ url('app-chat-box') }}"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
                </li>
                <li> <a href="{{ url('app-file-manager') }}"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
                </li>
                <li> <a href="{{ url('app-contact-list') }}"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
                </li>
                <li> <a href="{{ url('app-to-do') }}"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
                </li>
                <li> <a href="{{ url('app-invoice') }}"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
                </li>
                <li> <a href="{{ url('app-fullcalender') }}"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cube'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ url('admin/category') }}"><i class="bx bx-right-arrow-alt"></i>Categories</a>
                </li>
                <li> <a href="{{ url('admin/category/create') }}"><i class="bx bx-right-arrow-alt"></i>Add New
                        Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{url("admin/brands")}}">
                <div class="parent-icon"><i class='bx bx-bold'></i>
                </div>
                <div class="menu-title">Brands</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-box'></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
            <ul>
                <li> <a href="{{ route("product.index") }}"><i class="bx bx-right-arrow-alt"></i>Products</a>
                </li>
                <li> <a href="{{ route("product.create") }}"><i class="bx bx-right-arrow-alt"></i>Add New
                        Products</a>
                </li>
                <li> <a href="{{ url('ecommerce-add-new-products') }}"><i class="bx bx-right-arrow-alt"></i>Add New
                        Variants</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
