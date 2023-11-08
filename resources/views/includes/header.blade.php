<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<!-- Container wrapper -->
		<div class="container-fluid">
				<!-- Navbar brand -->
				<a class="navbar-brand me-2" href="">
    <img class="rounded-circle" src="{{ asset('/img/vi2.jpg') }}" height="80" />
</a>
				<!-- Collapsible wrapper -->
				<div class="collapse navbar-collapse" id="navbarButtonsExample">
				<!-- Left links -->
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
										<a class="nav-link bold" href="{{route('books.index')}}">Books Management</a>
								</li>
						</ul>
				<!-- Right links -->
				</div>
<!-- Collapsible wrapper -->
		</div>
<!-- Container wrapper -->
<form class="d-flex" role="search">
        <input class="form-control px-4" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
<div class="dropdown mx-1">
	<button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		Menu
	</button>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="#">ADD</a></li>
		<li><a class="dropdown-item" href="#">Show</a></li>
		<li><a class="dropdown-item" href="#">EDIT</a></li>
	</ul>
</div>
<div class="spinner-border text-success mx-2" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
</nav>
<!-- Navbar -->