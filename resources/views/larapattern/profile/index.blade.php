<x-larapattern-layout>

    <x-slot name="title">
        {{ __('dashboard.content.profile.title  ') }}
    </x-slot>

    <div class="bg-white border rounded">
        <div class="row no-gutters">
            <div class="col-lg-4 col-xl-3">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="card text-center widget-profile px-0 border-0">
                        <div class="card-img mx-auto rounded-circle">
                            <label for="change-avatar" style="cursor: pointer">
                                {{-- <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" class="img-thumbnail" alt="user image"> --}}
                                <img src="{{ auth()->user()->laravatar_url }}" class="" width="100%" alt="user image">
                                {{-- <img src="{{ asset('storage/'.auth()->user()->avatar) }}" class="" width="100%" alt="user image"> --}}
                            </label>
                            {!! Form::model(auth()->user(), ['url' => route('administrator.profile.avatar.update', auth()->user()->uuid), 'files' => true, 'method' => 'put']) !!}
                                <input type="file" name="avatar" class="d-none" id="change-avatar" onchange="submit();">
                            {!! Form::close() !!}
                        </div>
                        <div class="card-body pl-1 pr-1">
                            <h4 class="pt-2 pb-1 text-dark">{{ auth()->user()->name }}</h4>
                            <p class="pb-2">{{ auth()->user()->email }}</p>
                            <span class="btn btn-primary btn-sm btn-pill my-1">{{ auth()->user()->role->name }}</span>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-between ">
                        <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">1503</h6>
                            <p>Friends</p>
                        </div>
                        <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">2905</h6>
                            <p>Followers</p>
                        </div>
                        <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">1200</h6>
                            <p>Following</p>
                        </div>
                    </div> --}}
                    {{-- <hr class="w-100"> --}}
                    <div class="contact-info pt-4">
                        <h5 class="text-dark mb-1">{{ __('dashboard.content.profile.card.left.contact-information') }}</h5><hr class="w-100">
                        {{-- <p class="text-dark font-weight-medium pt-4 mb-1">Email address</p>
                        <p class="font-size-13">{{ auth()->user()->email }}</p> --}}
                        <p class="text-dark font-weight-medium pt-4 mb-1">Phone Number</p>
                        <p class="font-size-13">+99 9539 2641 31</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">{{ __('dashboard.content.profile.card.left.social-profile') }}</p>
                        <p class="pb-3 social-button">
                            <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                            <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                                <i class="mdi mdi-linkedin"></i>
                            </a>
                            <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                            <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
                                <i class="mdi mdi-skype"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xl-9">
                <div class="profile-content-right py-5">
                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">{{ __('dashboard.content.profile.card.right.accordion-title.setting') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true">{{ __('dashboard.content.profile.card.right.accordion-title.time-line') }}</a>
                        </li>
                    </ul>
                    {!! Form::model($user, ['url' => route('administrator.profile.update', $user->uuid), 'method' => 'put', 'id' => 'user-form']) !!}

                        <div class="tab-content px-3 px-xl-5" id="myTabContent">

                            {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mt-5">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="media widget-media p-4 bg-white border">
                                                <div class="icon rounded-circle mr-4 bg-primary">
                                                    <i class="mdi mdi-account-outline text-white "></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4 class="text-primary mb-2">5300</h4>
                                                    <p>New Users</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="media widget-media p-4 bg-white border">
                                                <div class="icon rounded-circle bg-warning mr-4">
                                                    <i class="mdi mdi-cart-outline text-white "></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4 class="text-primary mb-2">1953</h4>
                                                    <p>Order Placed</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="media widget-media p-4 bg-white border">
                                                <div class="icon rounded-circle mr-4 bg-danger">
                                                    <i class="mdi mdi-cart-outline text-white "></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4 class="text-primary mb-2">1450</h4>
                                                    <p>Total Sales</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!-- Notification Table -->
                                            <div class="card card-default" data-scroll-height="550"
                                                style="height: 550px; overflow: hidden;">
                                                <div class="card-header justify-content-between ">
                                                    <h2>Latest Notifications</h2>
                                                    <div>
                                                        <button class="text-black-50 mr-2 font-size-20"><i
                                                                class="mdi mdi-cached"></i></button>
                                                        <div class="dropdown show d-inline-block widget-dropdown">
                                                            <a class="dropdown-toggle icon-burger-mini" href="#"
                                                                role="button" id="dropdown-notification"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" data-display="static"></a>
                                                            <ul class="dropdown-menu dropdown-menu-right"
                                                                aria-labelledby="dropdown-notification">
                                                                <li class="dropdown-item"><a href="#">Action</a></li>
                                                                <li class="dropdown-item"><a href="#">Another action</a>
                                                                </li>
                                                                <li class="dropdown-item"><a href="#">Something else
                                                                        here</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="slimScrollDiv"
                                                    style="position: relative; overflow: hidden; width: auto; height: 100%;">
                                                    <div class="card-body slim-scroll"
                                                        style="overflow: hidden; width: auto; height: 100%;">
                                                        <div class="media pb-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                                                <i class="mdi mdi-cart-outline font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3 ">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New
                                                                    Order</a>
                                                                <p>Selena has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                                        </div>

                                                        <div class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                                                                <i class="mdi mdi-email-outline font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New
                                                                    Enquiry</a>
                                                                <p>Phileine has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 9 AM</span>
                                                        </div>


                                                        <div class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                                                <i class="mdi mdi-stack-exchange font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                    href="#">Support Ticket</a>
                                                                <p>Emma has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                                        </div>

                                                        <div class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                                                <i class="mdi mdi-cart-outline font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New
                                                                    order</a>
                                                                <p>Ryan has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                                        </div>

                                                        <div class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                                                                <i class="mdi mdi-calendar-blank font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark" href="">Comapny
                                                                    Meetup</a>
                                                                <p>Phileine has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                                        </div>

                                                        <div class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                                                <i class="mdi mdi-stack-exchange font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark"
                                                                    href="#">Support Ticket</a>
                                                                <p>Emma has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                                        </div>

                                                        <div class="media py-3 align-items-center justify-content-between">
                                                            <div
                                                                class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                                                                <i class="mdi mdi-email-outline font-size-20"></i>
                                                            </div>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New
                                                                    Enquiry</a>
                                                                <p>Phileine has placed an new order</p>
                                                            </div>
                                                            <span class=" font-size-12 d-inline-block"><i
                                                                    class="mdi mdi-clock-outline"></i> 9 AM</span>
                                                        </div>

                                                    </div>
                                                    <div class="slimScrollBar"
                                                        style="background: rgb(153, 153, 153); width: 5px; position: absolute; top: 0px; opacity: 0; display: block; border-radius: 7px; z-index: 99; right: 1px;">
                                                    </div>
                                                    <div class="slimScrollRail"
                                                        style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                                                    </div>
                                                </div>
                                                <div class="mt-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card card-default todo-table" id="todo" data-scroll-height="550"
                                                style="height: 550px; overflow: hidden;">
                                                <div class="card-header justify-content-between">
                                                    <h2>To Do List</h2>
                                                    <a class="btn btn-primary btn-pill" id="add-task" href="#"
                                                        role="button"> Add task </a>
                                                </div>
                                                <div class="slimScrollDiv"
                                                    style="position: relative; overflow: hidden; width: auto; height: 100%;">
                                                    <div class="card-body slim-scroll"
                                                        style="overflow: hidden; width: auto; height: 100%;">
                                                        <div class="todo-single-item d-none" id="todo-input">
                                                            <form>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Enter Todo" autofocus="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="todo-list" id="todo-list">
                                                            <div
                                                                class="todo-single-item d-flex flex-row justify-content-between finished">
                                                                <i class="mdi"></i>
                                                                <span>Finish Dashboard UI Kit update</span>
                                                                <span class="badge badge-primary">Finished</span>
                                                            </div>
                                                            <div
                                                                class="todo-single-item d-flex flex-row justify-content-between current">
                                                                <i class="mdi"></i>
                                                                <span>Create new prototype for the landing page</span>
                                                                <span class="badge badge-primary">Today</span>
                                                            </div>
                                                            <div
                                                                class="todo-single-item d-flex flex-row justify-content-between ">
                                                                <i class="mdi"></i>
                                                                <span> Add new Google Analytics code to all main files
                                                                </span>
                                                                <span class="badge badge-danger">Yesterday</span>
                                                            </div>

                                                            <div
                                                                class="todo-single-item d-flex flex-row justify-content-between ">
                                                                <i class="mdi"></i>
                                                                <span>Update parallax scroll on team page</span>
                                                                <span class="badge badge-success">Dec 15, 2018</span>
                                                            </div>

                                                            <div
                                                                class="todo-single-item d-flex flex-row justify-content-between ">
                                                                <i class="mdi"></i>
                                                                <span>Update parallax scroll on team page</span>
                                                                <span class="badge badge-success">Dec 15, 2018</span>
                                                            </div>
                                                            <div
                                                                class="todo-single-item d-flex flex-row justify-content-between ">
                                                                <i class="mdi"></i>
                                                                <span>Create online customer list book</span>
                                                                <span class="badge badge-success">Dec 15, 2018</span>
                                                            </div>
                                                            <div
                                                                class="todo-single-item d-flex flex-row justify-content-between ">
                                                                <i class="mdi"></i>
                                                                <span>Lorem ipsum dolor sit amet, consectetur.</span>
                                                                <span class="badge badge-success">Dec 15, 2018</span>
                                                            </div>

                                                            <div
                                                                class="todo-single-item d-flex flex-row justify-content-between mb-1">
                                                                <i class="mdi"></i>
                                                                <span>Update parallax scroll on team page</span>
                                                                <span class="badge badge-success">Dec 15, 2018</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="slimScrollBar"
                                                        style="background: rgb(153, 153, 153); width: 5px; position: absolute; top: 0px; opacity: 0; display: block; border-radius: 7px; z-index: 99; right: 1px;">
                                                    </div>
                                                    <div class="slimScrollRail"
                                                        style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                                                    </div>
                                                </div>
                                                <div class="mt-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <!-- Recent Order Table -->
                                            <div class="card card-table-border-none" id="recent-orders">
                                                <div class="card-header justify-content-between">
                                                    <h2>Recent Orders</h2>
                                                    <div class="date-range-report ">
                                                        <span>Sep 15, 2021 - Oct 14, 2021</span>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 pb-5">
                                                    <table class="table card-table table-responsive table-responsive-large"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Order ID</th>
                                                                <th>Product Name</th>
                                                                <th class="d-none d-xl-table-cell">Units</th>
                                                                <th class="d-none d-xl-table-cell">Order Date</th>
                                                                <th class="d-none d-xl-table-cell">Order Cost</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>24541</td>
                                                                <td>
                                                                    <a class="text-dark" href=""> Coach Swagger</a>
                                                                </td>
                                                                <td class="d-none d-xl-table-cell">1 Unit</td>
                                                                <td class="d-none d-xl-table-cell">Oct 20, 2018</td>
                                                                <td class="d-none d-xl-table-cell">$230</td>
                                                                <td>
                                                                    <span class="badge badge-success">Completed</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div
                                                                        class="dropdown show d-inline-block widget-dropdown">
                                                                        <a class="dropdown-toggle icon-burger-mini" href=""
                                                                            role="button" id="dropdown-recent-order1"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false" data-display="static"></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dropdown-recent-order1">
                                                                            <li class="dropdown-item">
                                                                                <a href="#">View</a>
                                                                            </li>
                                                                            <li class="dropdown-item">
                                                                                <a href="#">Remove</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>24541</td>
                                                                <td>
                                                                    <a class="text-dark" href=""> Toddler Shoes, Gucci
                                                                        Watch</a>
                                                                </td>
                                                                <td class="d-none d-xl-table-cell">2 Units</td>
                                                                <td class="d-none d-xl-table-cell">Nov 15, 2018</td>
                                                                <td class="d-none d-xl-table-cell">$550</td>
                                                                <td>
                                                                    <span class="badge badge-warning">Delayed</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div
                                                                        class="dropdown show d-inline-block widget-dropdown">
                                                                        <a class="dropdown-toggle icon-burger-mini"
                                                                            href="#" role="button"
                                                                            id="dropdown-recent-order2"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false" data-display="static"></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dropdown-recent-order2">
                                                                            <li class="dropdown-item">
                                                                                <a href="#">View</a>
                                                                            </li>
                                                                            <li class="dropdown-item">
                                                                                <a href="#">Remove</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>24541</td>
                                                                <td>
                                                                    <a class="text-dark" href=""> Hat Black Suits</a>
                                                                </td>
                                                                <td class="d-none d-xl-table-cell">1 Unit</td>
                                                                <td class="d-none d-xl-table-cell">Nov 18, 2018</td>
                                                                <td class="d-none d-xl-table-cell">$325</td>
                                                                <td>
                                                                    <span class="badge badge-warning">On Hold</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div
                                                                        class="dropdown show d-inline-block widget-dropdown">
                                                                        <a class="dropdown-toggle icon-burger-mini"
                                                                            href="#" role="button"
                                                                            id="dropdown-recent-order3"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false" data-display="static"></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dropdown-recent-order3">
                                                                            <li class="dropdown-item">
                                                                                <a href="#">View</a>
                                                                            </li>
                                                                            <li class="dropdown-item">
                                                                                <a href="#">Remove</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>24541</td>
                                                                <td>
                                                                    <a class="text-dark" href=""> Backpack Gents,
                                                                        Swimming Cap Slin</a>
                                                                </td>
                                                                <td class="d-none d-xl-table-cell">5 Units</td>
                                                                <td class="d-none d-xl-table-cell">Dec 13, 2018</td>
                                                                <td class="d-none d-xl-table-cell">$200</td>
                                                                <td>
                                                                    <span class="badge badge-success">Completed</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div
                                                                        class="dropdown show d-inline-block widget-dropdown">
                                                                        <a class="dropdown-toggle icon-burger-mini"
                                                                            href="#" role="button"
                                                                            id="dropdown-recent-order4"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false" data-display="static"></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dropdown-recent-order4">
                                                                            <li class="dropdown-item">
                                                                                <a href="#">View</a>
                                                                            </li>
                                                                            <li class="dropdown-item">
                                                                                <a href="#">Remove</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>24541</td>
                                                                <td>
                                                                    <a class="text-dark" href=""> Speed 500 Ignite</a>
                                                                </td>
                                                                <td class="d-none d-xl-table-cell">1 Unit</td>
                                                                <td class="d-none d-xl-table-cell">Dec 23, 2018</td>
                                                                <td class="d-none d-xl-table-cell">$150</td>
                                                                <td>
                                                                    <span class="badge badge-danger">Cancelled</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div
                                                                        class="dropdown show d-inline-block widget-dropdown">
                                                                        <a class="dropdown-toggle icon-burger-mini"
                                                                            href="#" role="button"
                                                                            id="dropdown-recent-order5"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false" data-display="static"></a>
                                                                        <ul class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dropdown-recent-order5">
                                                                            <li class="dropdown-item">
                                                                                <a href="#">View</a>
                                                                            </li>
                                                                            <li class="dropdown-item">
                                                                                <a href="#">Remove</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> --}}

                            <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="mt-5">
                                    @include('admin.user-management.accounts.user._partials.form', ['user' => auth()->user(), 'edited' => true])
                                </div>
                            </div>

                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                                <div class="media mt-5 profile-timeline-media">
                                    <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                        <img src="{{ asset('images/user/u3.jpg') }}" alt="Generic placeholder image">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 text-dark">Larissa Gebhardt</h6>
                                        <span>Designer</span>
                                        <span class="float-right">5 mins ago</span>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore
                                            magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris
                                            nisi ut aliquip.
                                        </p>
                                        <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                            <img src="{{ asset('images/product/pa1.jpg') }}" alt="Product">
                                        </div>
                                        <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                            <img src="{{ asset('images/product/pa2.jpg') }}" alt="Product">
                                        </div>
                                        <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                            <img src="{{ asset('images/product/pa3.jpg') }}" alt="Product">
                                        </div>
                                    </div>
                                </div>
                                <div class="media mt-5 profile-timeline-media">
                                    <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                        <img src="{{ asset('images/user/u4.jpg') }}" alt="Generic placeholder image">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 text-dark">Walter Reuter</h6>
                                        <span>Designer</span>
                                        <span class="float-right">2 hrs ago</span>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore
                                            magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris
                                            nisi ut aliquip.
                                        </p>

                                    </div>
                                </div>
                                <div class="media mt-5 profile-timeline-media">
                                    <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                        <img src="{{ asset('images/user/u7.jpg') }}" alt="Generic placeholder image">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 text-dark">Albrecht Straub</h6>
                                        <span>Designer</span>
                                        <span class="float-right">5 days ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore
                                            magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris
                                            nisi ut aliquip.</p>
                                        <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                            <img src="{{ asset('images/product/pa4.jpg') }}" alt="Product">
                                        </div>
                                    </div>
                                </div>
                                <div class="media mt-5 profile-timeline-media">
                                    <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                        <img src="{{ asset('images/user/u8.jpg') }}" alt="Generic placeholder image">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 text-dark">Selena Wagner</h6>
                                        <span>Designer</span>
                                        <span class="float-right">Mar 05, 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore
                                            magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris
                                            nisi ut aliquip.</p>
                                        <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                            <img src="{{ asset('images/product/pa5.jpg') }}" alt="Product">
                                        </div>
                                        <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                            <img src="{{ asset('images/product/pa6.jpg') }}" alt="Product">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\Administrator\ProfileUpdateRequest', '#user-form') !!}
    @endpush
</x-larapattern-layout>
