@extends('layouts.wrapper')

@section('page_title')
Restricted Area
@endsection

@section('content')

<!-- Hero -->
<div class="flex flex-col justify-between h-screen bg-gray-100">

    <!-- Navbar -->
    <div>
        <x-navbar page="restricted-area" />
    </div>

    <!-- Content -->
	<div class="p-4">
		<div class="max-w-xl w-full mx-auto">
			@auth
				<a href="/dashboard">
					<img src="/img/undraw/undraw_not-found_6bgl.svg" class="rounded-md">
				</a>
			@else
				<a href="/">
					<img src="/img/undraw/undraw_not-found_6bgl.svg" class="rounded-md">
				</a>
			@endauth
		</div>
	</div>
    <!-- END OF Content -->

    <div>
        <!-- Touch Nothing... -->
    </div>

</div>
<!-- END OF Hero -->

@endsection
