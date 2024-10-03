<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        WebFont.load({
            google: {families: ["Public Sans:300,400,500,600,700"]},
            custom: {
                families: [
                    "simple-line-icons",
                ],
                urls: [" {{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });


    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

    @yield('styles')
</head>
<body>
<div class="wrapper">
    @include('admin.includes.sidebar')

    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                @include('admin.includes.logo-header')
            </div>
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                @include('admin.includes.navbar-header')
            </nav>
            <!-- End Navbar -->
        </div>

        <div class="container">
            <div class="page-inner">
                @yield('container')
            </div>
        </div>

        @include('admin.includes.footer')

    </div>

    <!-- Custom template | don't include it in your project! -->
    <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
            <div class="switcher">
                <div class="switch-block">
                    <h4>Logo Header</h4>
                    <div class="btnSwitch">
                        <button
                            type="button"
                            class="selected changeLogoHeaderColor"
                            data-color="dark"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="blue"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="purple"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="light-blue"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="green"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="orange"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="red"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="white"
                        ></button>
                        <br/>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="dark2"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="blue2"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="purple2"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="light-blue2"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="green2"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="orange2"
                        ></button>
                        <button
                            type="button"
                            class="changeLogoHeaderColor"
                            data-color="red2"
                        ></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Navbar Header</h4>
                    <div class="btnSwitch">
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="dark"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="blue"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="purple"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="light-blue"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="green"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="orange"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="red"
                        ></button>
                        <button
                            type="button"
                            class="selected changeTopBarColor"
                            data-color="white"
                        ></button>
                        <br/>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="dark2"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="blue2"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="purple2"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="light-blue2"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="green2"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="orange2"
                        ></button>
                        <button
                            type="button"
                            class="changeTopBarColor"
                            data-color="red2"
                        ></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Sidebar</h4>
                    <div class="btnSwitch">
                        <button
                            type="button"
                            class="changeSideBarColor"
                            data-color="white"
                        ></button>
                        <button
                            type="button"
                            class="selected changeSideBarColor"
                            data-color="dark"
                        ></button>
                        <button
                            type="button"
                            class="changeSideBarColor"
                            data-color="dark2"
                        ></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-toggle">
            <i class="icon-settings"></i>
        </div>
    </div>
    <!-- End Custom template -->
</div>


<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>

<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<!-- Kaiadmin JS -->
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/setting-demo2.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
            pageLength: 5,
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        var column = this;
                        var select = $(
                            '<select class="form-select"><option value=""></option></select>'
                        )
                            .appendTo($(column.footer()).empty())
                            .on("change", function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val ? "^" + val + "$" : "", true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + "</option>"
                                );
                            });
                    });
            },
        });

        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
            $("#add-row")
                .dataTable()
                .fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action,
                ]);
            $("#addRowModal").modal("hide");
        });
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':

            toastr.options.timeOut = 10000;
            toastr.info("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':

            toastr.options.timeOut = 10000;
            toastr.success("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
        case 'warning':

            toastr.options.timeOut = 10000;
            toastr.warning("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
        case 'error':

            toastr.options.timeOut = 10000;
            toastr.error("{{ Session::get('message') }}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
    }
    @endif
</script>

@yield('scripts')
</body>
</html>
