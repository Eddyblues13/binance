<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>Ditexcoin | User panel</title>
    <link rel="shortcut icon" href="{{asset('dist/images/favicon.ico')}}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/weather-icons/css/pe-icon-set-weather.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/starrr/starrr.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/cryptofont/cryptofont.css') }}">
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}">
    <!-- END: Custom CSS-->

    <script>
        jQuery(document).ready(function($) {
            $(".toggle").click(function() {
                $(".toggle").toggleClass("active");
                $("body").toggleClass("night");
                $.cookie("toggle", $(".toggle").hasClass('active'));
            });

            if ($.cookie("toggle") == "true") {
                $(".toggle").addClass("active");
                $("body").addClass("night");
            }
        });
    </script>
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->
<!-- START: Body-->
<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <img src="{{asset('dist/images/logo.jpg')}}" alt="logo" width="20" class="img-fluid" />
    </div>
    <!-- END: Pre Loader-->
    <form id="logout-form" action="https://ditexcoin.com/logout" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="5QLTsaPXiXFK5BRq0rSxK79tYG7jPVD8j79YF40y">
    </form>
    <!-- START: Header-->
    <div id="header-fix" class="header fixed-top">
        <nav class="navbar navbar-expand-lg  p-0">
            <div class="navbar-header h4 mb-0 align-self-center d-flex">
                <a class="horizontal-logo align-self-center d-flex d-lg-none">
                    <span class="h5 align-self-center mb-0 ">iPONGDEV</span>
                </a>
                <a href="#" class="sidebarCollapse ml-2" id="collapse"><i class="icon-menu body-color"></i></a>
            </div>
            <div class="d-inline-block position-relative">
                {{-- <button id="tourfirst" data-toggle="dropdown" aria-expanded="false"
                    class="btn btn-primary p-2 rounded mx-3 h4 mb-0 line-height-1 d-none d-lg-block">
                    <span class="text-white font-weight-bold h5"><span
                            class="icon-wallet mr-2 h6  mb-0"></span>&#36;50.00</span></button> --}}

            </div>


            <div class="navbar-right ml-auto">
                <ul class="ml-auto p-0 m-0 list-unstyled d-flex">

                    <li class="mr-1 d-inline-block my-auto" style="position: relative;">
                        <div style="display: flex; align-items: center;">
                            <a href="{{route('user.deposit.page')}}"
                                style="background-color: green; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-right: 10px;">
                                Deposit
                            </a>
                            {{-- <a href="your-withdraw-link-here"
                                style="background-color: red; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-right: 10px;">
                                Withdraw
                            </a> --}}
                            <h6 style="margin: 0; flex-grow: 1;">
                                <span id="account-type">PRACTICE ACCOUNT</span><br>
                                <span id="account-balance" style="font-size: 1.2em;">9,893.940</span><br>
                                <span style="font-size: 0.8em;">Estimate Account</span>
                            </h6>
                            <span onclick="toggleDropdown()" style="cursor: pointer; margin-left: auto;">
                                &#9662;
                                <!-- Chevron down icon -->
                            </span>
                        </div>

                        <div id="account-dropdown"
                            style="display: none; position: absolute; background: white; border: 1px solid #ccc; margin-top: 5px; padding: 20px; z-index: 1000; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); width: 350px;">
                            <h6 style="margin: 0; font-size: 1.2em; font-weight: bold;">Account List</h6>

                            <div
                                style="padding: 10px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                                <div onclick="changeAccount('practice', 9893.940)"
                                    style="cursor: pointer; flex-grow: 1;">
                                    <strong>Practice Account</strong><br>
                                    <span style="font-size: 1.2em;">58,958.47 $</span><br>
                                    <span style="font-size: 0.9em; color: gray;">Estimate Balance</span>
                                </div>
                                <button onclick="creditPracticeAccount()"
                                    style="background-color: green; color: white; border: none; padding: 8px 12px; border-radius: 5px; font-weight: bold; cursor: pointer; margin-left: 10px;">
                                    Credit
                                </button>
                            </div>

                            <div
                                style="padding: 10px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                                <div onclick="changeAccount('real', 0.00000)" style="cursor: pointer; flex-grow: 1;">
                                    <strong>Real Account</strong><br>
                                    <span style="font-size: 1.2em;">0.00000 $</span><br>
                                    <span style="font-size: 0.9em; color: gray;">Estimate Balance</span>
                                </div>
                                <button onclick="depositRealAccount()"
                                    style="background-color: blue; color: white; border: none; padding: 8px 12px; border-radius: 5px; font-weight: bold; cursor: pointer; margin-left: 10px;">
                                    Deposit
                                </button>
                            </div>

                            <div onclick="withdrawAll()"
                                style="cursor: pointer; padding: 10px; text-align: center; border-top: 1px solid #eee; margin-top: 10px;">
                                <strong>Withdraw All</strong>
                            </div>
                        </div>

                    </li>


                    <li class="mr-1 d-inline-block my-auto d-block d-lg-none">
                        </i>
                        </a>
                    </li>




                    <!-- Notification Page-->
                    <li class="dropdown align-self-center mr-1 d-inline-block">
                        <a href="#" class="nav-link px-2" data-toggle="dropdown" aria-expanded="false"><i
                                class="icon-bell h4"></i>
                            <span class="badge badge-default"> <span class="ring">
                                </span><span class="ring-point">
                                </span> </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right border   py-0">
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                    href="#">
                                    <div class="media">
                                        <img src="/images/logo.jpg" alt=""
                                            class="d-flex mr-3 img-fluid rounded-circle w-50">
                                        <div class="media-body">
                                            <h6>Welcome</h6>
                                            <hr>
                                            <p class="mb-0 text-success"> From Admin</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- End Notification-->


                    <!-- START: Header Profile-->
                    <li class="dropdown user-profile d-inline-block py-1 mr-2">
                        <a href="#" class="nav-link px-2 py-0" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <div class="media-body align-self-center d-none d-sm-block mr-2">
                                    <p class="mb-0 text-uppercase line-height-1"><b>
                                        </b><br /><span>
                                        </span></p>

                                </div>
                                <img src="{{asset('dist/images/profilep.png')}}" alt=""
                                    class="d-flex img-fluid rounded-circle" width="45">
                            </div>
                        </a>

                        <div class="dropdown-menu  dropdown-menu-right p-0">
                            <a href="" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-user mr-2 h6 mb-0"></span> Profile</a>
                            <a href="" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-user mr-2 h6 mb-0"></span> Withdrawal/Wallets</a>


                            <div class="dropdown-divider"></div>
                            <div class="dropdown-divider"></div>

                            <a href=""
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item px-2 text-danger align-self-center d-flex">
                                <span class="icon-logout mr-2 h6  mb-0"></span>Sign Out</a>


                    </li>

                </ul>
            </div>
        </nav>
    </div>
    <!-- END: Header-->



    <!-- START: Main Menu-->
    <!-- START: Main Menu-->
    <div class="sidebar">
        <a href="#"
            class="sidebarCollapse float-right h6 dropdown-menu-right mr-2 mt-2 position-absolute d-block d-lg-none">
            <i class="icon-close"></i>
        </a>
        <!-- START: Logo-->
        <a href="#" class="sidebar-logo d-flex">

            <img src="{{asset('dist/images/logo.jpg')}}" alt=""
                class=" align-self-center mb-0 d-flex mr-3 img-fluid  w-100">
        </a>
        <!-- END: Logo-->

        <!-- ADMIN: Menu START-->

        <!-- ADMIN: Menu END-->

        <!-- USER: Menu STRAT-->


        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown active"><a href=""><i class="icon-home"></i>BOARD</a>
            </li>
            <li class="dropdown"><a href=""><i class="icon-wallet"></i>ORDER BOOK</a>
            </li>
            <li class="dropdown"><a href=""><i class="icon-basket"></i>MARKET</a>
            </li>
            <li class="dropdown"><a href=""><i class="icon-grid"></i>PORTFOLIO</a>
            <li class="dropdown"><a href="https://ditexcoin.com/dashboard/myplans"><i class="icon-grid"></i>CALC</a>
            <li class="dropdown"><a href="https://ditexcoin.com/dashboard/tradinghistory"><i
                        class="icon-grid"></i>NEWS</a>
                <!--- <div> 
                        <ul>
                            <li><a href="https://ditexcoin.com/dashboard/mplans"><i class="icon-loop"></i> Activate Package</a></li>
                            <li><a href="https://ditexcoin.com/dashboard/myplans"><i class="icon-eye"></i> Current Package</a></li>
                            <li><a href="https://ditexcoin.com/dashboard/tradinghistory"><i class="icon-compass"></i> Transaction ROI</a></li>                        
                        </ul> 
                    </div>-->

            </li>

            <li class="dropdown"><a href="#"><i class="icon-user"></i>Profile</a>
                <div>
                    <ul>
                        <li><a href=""><i class="icon-user-following"></i>
                                Personal Account</a></li>
                        <li><a href=""><i class="icon-pencil"></i> Update
                                Payment Details</a></li>
                    </ul>
                </div>

            </li>
            <li class="dropdown"><a href="https://ditexcoin.com/dashboard/referuser"><i
                        class="icon-link"></i>Referral</a>
            </li>
            <li class="dropdown"><a href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="icon-logout"></i>Logout</a>

            <li><a href="#"><i class=" "></i></a></li>

            </li>


        </ul>
        <!-- END: Menu-->
    </div>
    <!-- END: Main Menu-->
    <!-- END: Main Menu-->
    <!-- GetButton.io widget -->
    <script type="text/javascript">
        //     (function () {
    //     var options = {
    //         whatsapp: "+13134032154", // WhatsApp number
    //         call_to_action: "Reach-out on Whatsapp", // Call to action
    //         position: "left", // Position may be 'right' or 'left'
    //     };
    //     var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
    //     var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
    //     s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
    //     var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    // })();
    </script>
    <!-- /GetButton.io widget -->
    <!-- ADMIN DISPLAY STARTS-->

    <!-- ADMIN DISPLAY ENDS-->
    <!-- USER DISPLAY STARTS-->

    <script>
        function toggleDropdown() {
    const dropdown = document.getElementById('account-dropdown');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

function changeAccount(accountType, balance) {
    const accountLabel = document.getElementById('account-type');
    const balanceLabel = document.getElementById('account-balance');

    // Update account type and balance display
    if (accountType === 'practice') {
        accountLabel.innerHTML = 'PRACTICE ACCOUNT';
    } else if (accountType === 'real') {
        accountLabel.innerHTML = 'REAL ACCOUNT';
    }

    // Update balance with a smooth transition
    updateBalance(balance);

    toggleDropdown(); // Close the dropdown after selection
}

function updateBalance(newBalance) {
    const balanceLabel = document.getElementById('account-balance');
    
    // Animate the counter change
    const currentBalance = parseFloat(balanceLabel.innerText);
    const increment = (newBalance - currentBalance) / 100; // Change value incrementally
    let count = 0;
    
    const interval = setInterval(() => {
        count += increment;
        balanceLabel.innerText = (currentBalance + count).toFixed(3); // Update balance with 3 decimal places
        
        // Stop the interval when we reach the new balance
        if (Math.abs(count) >= Math.abs(newBalance - currentBalance)) {
            balanceLabel.innerText = newBalance.toFixed(3);
            clearInterval(interval);
        }
    }, 10); // Adjust speed of counter animation
}

function withdrawAll() {
    alert('Withdraw All clicked!'); // Replace this with actual withdraw logic
}

    </script>


    <style>
        #account-dropdown div:hover {
            background-color: #f0f0f0;
        }
    </style>