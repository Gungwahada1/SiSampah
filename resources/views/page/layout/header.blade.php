<div class="header">    
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
        </div>
        <div class="header-right">
            <ul class="clearfix">
                @if(Auth::user()->level=="Nasabah")
                <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge badge-pill gradient-2 badge-primary" id="test1">

                    </span>
                </a>
                <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                    <div class="dropdown-content-heading d-flex justify-content-between">
                        <span class="" id="test2"></span>  
                        <a href="javascript:void()" class="d-inline-block">
                            <span class="badge badge-pill gradient-2" id="test3"></span>
                        </a>
                    </div>
                    <div class="dropdown-content-body">
                        <ul id="test4">
                        </ul>
                    </div>
                </div>
            </li>
            @endif
            <?php  
            $pp=DB::table('users')->join('biodata','biodata.id_user','=','users.id')->where('users.id',Auth::user()->id)->get();
            ?>
            <li class="icons dropdown">
                <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                    <span class="activity active"></span>
                    @foreach($pp as $p)
                    @if($p->foto==NULL)
                    <img src="{{asset('template/images/user/1.png')}}" height="40" width="40" alt="">
                    @else
                    <img src="{{asset('foto')}}/{{$p->foto}}" height="40" width="40" alt="">
                    @endif
                    @endforeach
                </div>
                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                    <div class="dropdown-content-body">
                        <ul>
                            <li>
                                <a href="{{route('profil')}}"><i class="icon-user"></i> <span>Profile</span></a>
                            </li>
                            <hr class="my-2">
                            <li><a href="{{route('logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>