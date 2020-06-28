<div class="sidebar" data-color="red">
  <!--
    data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="{{ route('admin') }}" class="simple-text logo-mini">
    </a>
    <a href="{{ route('admin') }}" class="simple-text logo-normal">
      Admin Panel
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@yield('admin_dashboard_menu') ">
        <a href="{{ route('admin') }}">
          <i class="now-ui-icons design_app"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="@yield('admin_user_menu')">
        <a href="{{ route('adminUser') }}">
          <i class="now-ui-icons users_single-02"></i>
          <p>User</p>
        </a>
      </li>
      <li class="@yield('admin_product_menu')">
        <a href="{{ route('adminProduct') }}">
          <i class="now-ui-icons education_paper"></i>
          <p>Product</p>
        </a>
      </li>
      <li class="@yield('admin_checkout_menu')">
        <a href="{{ route('adminCheckout') }}">
          <i class="now-ui-icons shopping_delivery-fast"></i>
          <p>Checkout</p>
        </a>
      </li>
      <li class="@yield('admin_confirm_payment_menu')">
        <a href="{{ route('adminConfirmPayment') }}">
          <i class="now-ui-icons business_bank"></i>
          <p>Konfirmasi Pembayaran</p>
        </a>
      </li>
      <li class="@yield('admin_category_menu')">
        <a href="{{ route('adminCategory') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>Category</p>
        </a>
      </li>
      <li class="@yield('admin_destination_menu')">
        <a href="{{ route('adminDestination') }}">
          <i class="now-ui-icons objects_spaceship"></i>
          <p>Destination</p>
        </a>
      </li>
      <li class="@yield('admin_review_menu')">
        <a href="{{ route('adminReview') }}">
          <i class="now-ui-icons ui-2_chat-round"></i>
          <p>Review</p>
        </a>
      </li>

      <li class="active-pro">
        <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="now-ui-icons media-1_button-power"></i>
              {{ __('Keluar') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
         </form>
      </li>
    </ul>
  </div>
</div>