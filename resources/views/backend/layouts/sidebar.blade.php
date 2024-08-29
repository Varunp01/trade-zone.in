<div class="quixnav">

    <div class="quixnav-scroll">
        @if (session()->has('user_id'))
        <ul class="metismenu" id="menu">

            <li class="nav-label first">Main Menu</li>

            <li>
                <a href="{{ route('user.dashboard') }}">

                    <i class="ti-layout-grid2"></i><span class="nav-text">Dashboard</span>

                </a>


            </li>


            <li class="menu-item">

                <a id="post_main_bt" href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Status</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                <li>

                    <a href="{{ route('user.status') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">View Status</span>

                    </a>

                    </li>
                    
                </ul>

            </li>
             <li class="menu-item">

                <a id="post_main_bt" href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Team</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                <li>

                    <a href="{{ route('user.team.direct') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">Direct Team</span>

                    </a>

                    </li>
                     <li>

                    <a href="{{ route('user.team.level',[base64_encode(session()->get('referal_code')),'1']) }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">Level Team</span>

                    </a>

                    </li>
                    
                </ul>

            </li>
             <li class="menu-item">

                <a href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Report</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>

                    <li>

                        <a href="{{ route('view.withdraw') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">View Withdraw</span>

                        </a>

                    </li>
                    <li>

                        <a href="{{ route('view.roy') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">View Roi</span>

                        </a>

                    </li>
                      <li>

                        <a href="{{ route('view.referal') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">View Referal</span>

                        </a>

                    </li>
                </ul>

            </li>
             <li class="menu-item">

                <a href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Invest More</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                    <li>

                        <a href="{{ route('add.payment') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">Add Payment</span>

                        </a>

                    </li>
                    <li>

                        <a href="{{ route('view.payment.status') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">View Status</span>

                        </a>

                    </li>
                </ul>

            </li> 
             <li class="menu-item">

                <a href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Account</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                    <li>

                        <a href="{{ route('user.profile') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">Update Profile</span>

                        </a>

                    </li>
                     <li>

                        <a href="{{ route('user.kyc') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">Complete Kyc</span>

                        </a>

                    </li>

                </ul>

            </li> 


        </ul>

        @else

        <ul class="metismenu" id="menu">

            <li class="nav-label first">Main Menu</li>

            <li>
                <a href="{{ route('admin.dashboard') }}">

                    <i class="ti-layout-grid2"></i><span class="nav-text">Dashboard</span>

                </a>


            </li>


            <li class="menu-item">

                <a id="post_main_bt" href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Users</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                <li>

                    <a href="{{ route('admin.view.user') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">View Active User</span>

                    </a>

                    </li>
                     <li>

                    <a href="{{ route('admin.view.user.inactive') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">View Inactive user</span>

                    </a>

                    </li>
                    
                </ul>

            </li>
            <li class="menu-item">

                <a id="post_main_bt" href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Vip Investor</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                <li>

                    <a href="{{ route('admin.add.investor') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">Add Investor</span>

                    </a>

                    </li>
                     <li>

                    <a href="{{ route('admin.view.investor') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">View Investor</span>

                    </a>

                    </li>
                    
                 </ul>
                </li>
                <li class="menu-item">

                    <a id="post_main_bt" href="#">

                        <i class="icon icon-layout-25"></i><span class="nav-text">Md Group</span><i
                            class="fa-solid fa-chevron-down slide_down_ic"></i>

                    </a>
                <ul>
                <li>

                    <a href="{{ route('admin.add.mdgroup') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">Add Md Group</span>

                    </a>

                    </li>
                     <li>

                    <a href="{{ route('admin.view.mdgroup') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">View Md Group</span>

                    </a>

                    </li>
                    
                </ul>

            </li>
            <li class="menu-item">

                <a id="post_main_bt" href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Fix Deposit</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                <li>

                    <a href="{{ route('admin.add.fix') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">Add Fix Investor</span>

                    </a>

                    </li>
                     <li>

                    <a href="{{ route('admin.view.fix') }}">

                        <i class="icon icon-layout-25"></i><span class="nav-text">View Fix Investor</span>

                    </a>

                    </li>
                    
                </ul>

            </li>
             <li class="menu-item">

                <a href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Withraw Request</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                    <li>

                        <a href="{{ route('admin.view.withdraw','0') }}">

                            <i class="ti-link"></i><span class="nav-text">Pending</span>

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('admin.view.withdraw','1') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">Approved</span>

                        </a>

                    </li>
                    
                     <li>

                        <a href="{{ route('admin.view.withdraw','2') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">Cancel</span>

                        </a>

                    </li>
                </ul>

            </li>
            <li class="menu-item">

                <a href="#">

                    <i class="icon icon-layout-25"></i><span class="nav-text">Payment Request</span><i
                        class="fa-solid fa-chevron-down slide_down_ic"></i>

                </a>

                <ul>
                    <li>

                        <a href="{{ route('admin.view.payment','0') }}">

                            <i class="ti-link"></i><span class="nav-text">Pending</span>

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('admin.view.payment','1') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">Approved</span>

                        </a>

                    </li>
                    
                     <li>

                        <a href="{{ route('admin.view.payment','2') }}">

                            <i class="icon icon-single-04"></i><span class="nav-text">Cancel</span>

                        </a>

                    </li>
                </ul>

            </li>


        </ul>

        @endif       



    </div>

</div>

