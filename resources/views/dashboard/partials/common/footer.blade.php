<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

@error('success')
@include('notifications.successMessage')
@enderror()

@if(session()->has('error'))
@include('notifications.errorMessage')
@endif


@yield('scripts')
</body>

</html>