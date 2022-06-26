<x-frontend-master>
    <div class="main-container">

		<main class="site-main">

			@include('frontend.sections.slider', ['data' => $slider, 'headline' => $headline])
			@include('frontend.sections.recent', ['data' => $recent])
			@include('frontend.sections.other-articles')
			{{-- @include('frontend.sections.videos') --}}

        </main>

	</div>
</x-frontend-master>