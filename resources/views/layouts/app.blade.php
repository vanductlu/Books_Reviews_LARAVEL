<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Books Page @yield("title")</title>
		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
		<script defer src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
		<link rel="stylesheet" href="{{ asset('/fontawesome-free-6.4.2-web/css/all.css') }}">
		<link rel="stylesheet" href="{{ asset('/icons-1.3.0/icons-1.3.0/font/bootstrap-icons.css') }}">
		<script defer src="{{asset('/fontawesome-free-6.4.2-web/js/fontawesome.min.js')}}"></script>
		<style>
		</style>
</head>
<body>
	
		<!-- Header -->
		<header>
				@include('includes/header')
		</header>
		@if (session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<script defer>
			setTimeout(function() {
					document.getElementById('success-alert').style.display = 'none';
			}, 3000); // 3 giây
		</script>    
		<!-- Main Content -->
		<main class="mx-5">
				@yield('content')
		</main>
		<!-- Footer -->
		<footer>
				@include('includes/footer')
		</footer>
</body>
<script>
			const image = document.querySelector('#image-upload');
			const inputImage = document.querySelector('#Cover_Image_URL');

			inputImage.addEventListener('change', (e) => {
				const files = e.target.files;
				const fileImage = files[0];
				const url = URL.createObjectURL(fileImage);
				image.src = url;
			})
		</script>
</html>