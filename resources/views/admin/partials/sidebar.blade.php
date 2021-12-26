<aside class="main-sidebar">
<section class="sidebar">
  
      <ul class="sidebar-menu" data-widget="tree">

        <li class="treeview">
          <a href="{{route('admin.index')}}">
            <li><i class="fa fa-dashboard"></i>@lang('Dashboard')</li>
          </a>
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
            <li><a href="{{route('admin.products.create')}}"><i class="fa fa-circle-o"></i> Add Product</a></li>
            <li><a href="{{route('admin.products.index')}}"><i class="fa fa-circle-o"></i> All Products</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Report</a></li>
          </ul>
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
            <li><a href="{{route('admin.category.index')}}"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="{{route('admin.Sub_Category.index')}}"><i class="fa fa-circle-o"></i> Sub Category</a></li>
            <li><a href="{{route('admin.Child_Category.index')}}"><i class="fa fa-circle-o"></i> Child Category</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>General Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.faviconcreate')}}"><i class="fa fa-circle-o"></i> Favicons</a></li>
            <li><a href="{{route('admin.logocreate')}}"><i class="fa fa-circle-o"></i> Logo</a></li>
            <li><a href="{{route('admin.slidercreate')}}"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Banner
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('admin.topbannercreate')}}"><i class="fa fa-circle-o"></i> Top Banners</a></li>
                <li><a href="{{route('admin.middlebannercreate')}}"><i class="fa fa-circle-o"></i> Middle Banners</a></li>
                <li><a href="{{route('admin.bottombannercreate')}}"><i class="fa fa-circle-o"></i> Bottom Banners</a></li>
                
              </ul>
            </li>

            <li><a href="{{route('admin.partnercreate')}}"><i class="fa fa-circle-o"></i> Partners</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> CHefs Banner</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Menu Page Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.contactcreate')}}"><i class="fa fa-circle-o"></i> Contact Page</a></li>
            <li><a href="{{route('admin.socialcreate')}}"><i class="fa fa-circle-o"></i> Social Links</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Footer</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Blog Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.blogcategorycreate')}}"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="{{route('admin.blogpostcreate')}}"><i class="fa fa-circle-o"></i> Posts</a></li>
          </ul>
        </li>
        <li class="treeview">
            <li><a href="{{route('admin.setting.general')}}"><i class="fa fa-circle-o"></i> Setting general</a></li>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Subscriber And Message</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.subscribers')}}"><i class="fa fa-circle-o"></i> Subscriber</a></li>
            <li><a href="{{route('admin.messages')}}"><i class="fa fa-circle-o"></i> Message</a></li>
          </ul>
        </li>

      </ul>
    </section>
</aside>
