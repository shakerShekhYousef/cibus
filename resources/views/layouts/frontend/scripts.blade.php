<!-- COMMON SCRIPTS -->
<script src="{{asset('frontend/js/common_scripts.min.js')}}"></script>
<script src="{{asset('frontend/js/common_func.js')}}"></script>
<script src="frontend/assets/validate.js')}}"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{asset('frontend/js/modernizr.min.js')}}"></script>
<script src="{{asset('frontend/js/video_header.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif
    @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}")
    @endif
</script>
