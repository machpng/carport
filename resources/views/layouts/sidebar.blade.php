<!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            @if(auth()->user()->role_id == 1)
                <li><a href="{{ url('home') }}"><i class="icon-bar-chart"></i><span class="hidden-tablet">&nbsp;&nbsp;首页</span></a></li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-user"></i><span class="hidden-tablet"> 账号管理</span></a>
                    <ul>
                        <li><a class="submenu" href="{{ url('user') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 列表</span></a></li>
                        <li><a class="submenu" href="{{ url('user/add') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加</span></a></li>
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> 车库管理</span></a>
                    <ul>
                        <li><a class="submenu" href="{{ url('parking') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 列表</span></a></li>
                        <li><a class="submenu" href="{{ url('parking/add') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加</span></a></li>
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> 产品管理</span></a>
                    <ul>
                        <li><a class="submenu" href="{{ url('product') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 列表</span></a></li>
                        <li><a class="submenu" href="{{ url('product/add') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加</span></a></li>
                    </ul>
                </li>
                <li>
                    <a class="dropmenu" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> 部件管理</span></a>
                    <ul>
                        <li><a class="submenu" href="{{ url('part/parking') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 列表</span></a></li>
                        <li><a class="submenu" href="{{ url('part/add') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加</span></a></li>
                    </ul>
                </li>
                <li><a href="{{ url('about') }}"><i class="icon-dashboard"></i><span class="hidden-tablet">&nbsp;&nbsp;关于我们</span></a></li>
                <li><a href="{{ url('fault') }}"><i class="icon-dashboard"></i><span class="hidden-tablet">&nbsp;&nbsp;故障记录</span></a></li>
            @else
                <li>
                    <a class="dropmenu" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> 车库维保记录</span></a>
                    <ul>
                        <li><a class="submenu" href="{{ url('parking') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 列表</span></a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>