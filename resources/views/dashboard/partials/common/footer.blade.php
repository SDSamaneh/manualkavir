<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

@error('success')
@include('notifications.successMessage')
@enderror()

@if(session()->has('error'))
@include('notifications.errorMessage')
@endif


@if(session('success'))
<div>{{ session('success') }}</div>
@endif

@if(session('error'))
<div>{{ session('error') }}</div>
@endif



@yield('scripts')
</body>

</html>