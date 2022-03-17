<footer class="footer pt-3">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())

                    </script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="#" class="font-weight-bold" target="_blank">Ramson
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</main>

<!--   Core JS Files   -->
<script src="{{ url('assets/js/plugins/jquery-3.6.0.min.js') }}"></script>
<script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/core/popper.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/toastr.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/js/plugins/sweetalert2.min.js') }}"></script>
@stack('scripts')
<script src="{{ asset('assets/js/here.js') }}"></script>

<script>
    window.hereApiKey = {
        {
            env('HERE_API_KEY')
        }
    }

</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}">
</script>
