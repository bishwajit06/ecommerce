<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach(App\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)

                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if($parent->icon_image == "default.png")
                            <img style="height: 16px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                        @else($category->image == "default.png")
                            <img src="{{ asset('storage/category/icon/'.$parent->icon_image) }}"/>
                        @endif
                        &nbsp{{ $parent->name }}
                    </a>

                    @if(App\Category::orderBy('name','asc')->where('parent_id', $parent->id)->count() > 0)
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    @foreach(App\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
                                        <div class="col-sm-12 col-md-12">
                                            <ul class="links list-unstyled">
                                                <li><a href="{{route('category.show',$child->slug)}}">{{$child->name}}</a></li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- /.yamm-content -->
                        </ul>
                @endif
                <!-- /.dropdown-menu -->
                </li>
                <!-- /.menu-item -->
            @endforeach

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->

</div>
