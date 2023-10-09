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
                <li> <a href="{{ route("flashsale") }}"><i class="bx bx-right-arrow-alt"></i>Flash Sale</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">Commerce</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cube'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route("category.index") }}"><i class="bx bx-right-arrow-alt"></i>Categories</a>
                </li>
                <li> <a href="{{ route("category.create") }}"><i class="bx bx-right-arrow-alt"></i>Add New
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
            </ul>
        </li>

        <li class="menu-label">Other</li>
        <li>
            <a href="{{route("quotes")}}">
                <div class="parent-icon"><i class='bx bx-bold'></i>
                </div>
                <div class="menu-title">Quotes</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
