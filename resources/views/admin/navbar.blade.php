<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <label class="form-label">Type hereadmin.</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">

                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @php
                        $todayOrders = App\Models\Order::whereDate('created_at', Carbon\Carbon::now())->get();
                        $todayUser = App\Models\User::whereDate('created_at', Carbon\Carbon::now())->get();
                    @endphp
                        @if (count($todayOrders) > 0 || count($todayUser))
                        
                        <button class=" position-relative" style="outline: none;border:none">
                         <i class="fa fa-bell cursor-pointer fa-shake text-secondary  fs-3"></i>
                          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ">
                           {{ count($todayOrders) + count($todayUser)}}
                            <span class="visually-hidden">unread messages</span>
                          </span>
                        </button>
                        @else
                        <i class="fa fa-bell cursor-pointer"></i>
                        @endif
                       
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                  

                        @if (count($todayOrders) > 0)
                            @foreach ($todayOrders as $item)
                                
                            <li class="mb-2">
                              <a class="dropdown-item border-radius-md" href="{{url('order/'.$item->id)}}">
                                  <div class="d-flex py-1">
                                      <div class="my-auto">
                                          <img src="{{asset('image/shirtinc-logo.png')}}" class="avatar avatar-sm  me-3 ">
                                      </div>
                                      <div class="d-flex flex-column justify-content-center">
                                          <h6 class="text-sm font-weight-normal mb-1">
                                              <span class="font-weight-bold">New Order</span> from {{$item->user->name}}
                                          </h6>
                                          <p class="text-xs text-secondary mb-0">
                                              <i class="fa fa-clock me-1"></i>
                                              {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                                          </p>
                                      </div>
                                  </div>
                              </a>
                          </li>

                            @endforeach
                            
                        @endif

                        @if (count($todayUser) > 0)
                        @foreach ($todayUser as $item)
                            
                        <li class="mb-2">
                          <a class="dropdown-item border-radius-md" href="{{url('user/'.$item->id)}}">
                              <div class="d-flex py-1">
                                  <div class="my-auto">
                                      <img src="{{asset('image/shirtinc-logo.png')}}" class="avatar avatar-sm  me-3 ">
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                      <h6 class="text-sm font-weight-normal mb-1">
                                          <span class="font-weight-bold">New User</span> from {{$item->name}}
                                      </h6>
                                      <p class="text-xs text-secondary mb-0">
                                          <i class="fa fa-clock me-1"></i>
                                          {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                                      </p>
                                  </div>
                              </div>
                          </a>
                      </li>

                        @endforeach
                    @endif

                    @if (count($todayUser) == 0 && count($todayOrders) == 0)
                    <li class="mb-2">
                      <div>
                        <a class="dropdown-item border-radius-md text-danger" href="javascript:;">
                        No  Notifications Yet!
                        </a>
                      </div>
                    </li>
                    @endif

                     

                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('logout') }}" class="nav-link text-white btn btn-danger btn-sm  font-weight-bold "
                        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        <i class="material-icons opacity-10 fs-6 me-1">login</i>
                        <span class="d-sm-inline d-none">Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
