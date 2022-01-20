<aside class="main-sidebar">
<section class="sidebar">
  
      <ul class="sidebar-menu" data-widget="tree">

        <li class="treeview">
          <a href="{{route('admin.index')}}" class="active">
            <li><i class="fa fa-dashboard"></i>@lang('Dashboard')</li>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Web Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.homePages')}}"><i class="fa fa-circle-o"></i>@lang('Web Pages')</a></li>
            <li><a href="{{route('admin.webMaintence')}}"><i class="fa fa-circle-o"></i>@lang('Web Maintenence')</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.products.create')}}"><i class="fa fa-circle-o"></i> @lang('Add Product')</a></li>
            <li><a href="{{route('admin.products.index')}}"><i class="fa fa-circle-o"></i> @lang('All Products')</a></li>
            <li><a href="{{route('admin.bestSeller')}}"><i class="fa fa-circle-o"></i> @lang('Best Product')</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.allOrder')}}"><i class="fa fa-circle-o"></i> @lang('All Orders')</a></li>
            <li><a href="{{route('admin.pendingOrder')}}"><i class="fa fa-circle-o"></i> @lang('Pending Orders')</a></li>
            <li><a href="{{route('admin.processingOrder')}}"><i class="fa fa-circle-o"></i> @lang('Processing Orders')</a></li>
            <li><a href="{{route('admin.completeOrder')}}"><i class="fa fa-circle-o"></i> @lang('Complete Orders')</a></li>
            <li><a href="{{route('admin.declinedOrder')}}"><i class="fa fa-circle-o"></i> @lang('Declined Orders')</a></li>
          </ul>
        </li>
        <li class="active treeview">
            <li><a href="{{route('admin.brand')}}"><i class="fa fa-circle-o"></i> @lang('Brands')</a></li>
        </li>
        <li class="active treeview">
            <li><a href="{{route('admin.coupons')}}"><i class="fa fa-circle-o"></i> @lang('Coupons')</a></li>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Categories Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.category.index')}}"><i class="fa fa-circle-o"></i> @lang('Category')</a></li>
            <li><a href="{{route('admin.Sub_Category.index')}}"><i class="fa fa-circle-o"></i> @lang('Sub Category')</a></li>
            <li><a href="{{route('admin.Child_Category.index')}}"><i class="fa fa-circle-o"></i> @lang('Child Category')</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="">
            <i class="fa fa-pie-chart"></i>
            <span>@lang('General Settings')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.themeColor')}}"><i class="fa fa-circle-o"></i> @lang('Theme Color')</a></li>
            <li><a href="{{route('admin.loader')}}"><i class="fa fa-circle-o"></i> @lang('Loader')</a></li>
            <li><a href="{{route('admin.slidercreate')}}"><i class="fa fa-circle-o"></i> @lang('Sliders')</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> @lang('Banner')
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('admin.topbannercreate')}}"><i class="fa fa-circle-o"></i> @lang('Top Banners')</a></li>
                <li><a href="{{route('admin.middlebannercreate')}}"><i class="fa fa-circle-o"></i> @lang('Middle Banners')</a></li>
                <li><a href="{{route('admin.bottombannercreate')}}"><i class="fa fa-circle-o"></i> @lang('Bottom Banners')</a></li>
                
              </ul>
            </li>
            <li><a href="{{route('admin.pickup')}}"><i class="fa fa-circle-o"></i> @lang('PickUp Location')</a></li>
            <li><a href="{{route('admin.shippingMethod')}}"><i class="fa fa-circle-o"></i> @lang('Shipping Method')</a></li>
            <li><a href="{{route('admin.returnPolicy')}}"><i class="fa fa-circle-o"></i> @lang('Product Return Policy')</a></li>
            <li><a href="{{route('admin.partnercreate')}}"><i class="fa fa-circle-o"></i> @lang('Partners')</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> @lang('CHefs Banner')</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>@lang('Menu Page Settings')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.contactcreate')}}"><i class="fa fa-circle-o"></i> @lang('Contact Page')</a></li>
            <li><a href="{{route('admin.socialcreate')}}"><i class="fa fa-circle-o"></i> @lang('Social Links')</a></li>
            <li><a href="{{route('admin.fqa')}}"><i class="fa fa-circle-o"></i> @lang('FAQ Page')</a></li>
            <li><a href="{{route('admin.termsAndConditions')}}"><i class="fa fa-circle-o"></i> @lang('Terms & Condiotions')</a></li>
            <li><a href="{{route('admin.PrivacyAndPolicy')}}"><i class="fa fa-circle-o"></i> @lang('Privacy & Policy')</a></li>
            <li><a href="{{route('admin.footerManu')}}"><i class="fa fa-circle-o"></i> @lang('Footer')</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <li><a href=""><i class="fa fa-circle-o"></i> @lang('Home Page Customize')</a></li>
      </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>@lang('Blog Page')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="active treeview-menu">
            <li><a href="{{route('admin.blogcategorycreate')}}"><i class="fa fa-circle-o"></i> @lang('Category')</a></li>
            <li><a href="{{route('admin.blogpostcreate')}}"><i class="fa fa-circle-o"></i> @lang('Posts')</a></li>
          </ul>
        </li>
        <li class="active treeview">
            <li><a href="{{route('admin.setting.general')}}"><i class="fa fa-circle-o"></i> @lang('Setting general')</a></li>
        </li>
        <li class="active treeview">
            <li><a href="{{route('admin.customers')}}"><i class="fa fa-circle-o"></i> @lang('Customers')</a></li>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>@lang('Subscriber And Message')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.subscribers')}}"><i class="fa fa-circle-o"></i> @lang('Subscriber')</a></li>
            <li><a href="{{route('admin.messages')}}"><i class="fa fa-circle-o"></i> @lang('Message')</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <li><a href="{{route('admin.manageStaffs')}}"><i class="fa fa-circle-o"></i> @lang('Manage Staffs')</a></li>
      </li>

      </ul>
    </section>
</aside>
