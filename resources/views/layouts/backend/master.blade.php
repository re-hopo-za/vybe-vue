<!DOCTYPE html>
<html lang="fa">

@include('layouts.backend.head')

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

@include('layouts.backend.sidebar')

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('layouts.backend.topbar')

            @yield('content')

        </div>
        <!-- End of Main Content -->

        @include('layouts.backend.footer')

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title font-weight-bold" id="exampleModalLabel">خروج از حساب کاربری</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">آیا می‌خواهید خارج شوید؟!</div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary btn-md" type="button" data-dismiss="modal">بستن</button>
                <a class="btn btn-primary btn-md" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.backend.scripts')

</body>

</html>
