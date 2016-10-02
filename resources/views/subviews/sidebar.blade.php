@if (Auth::check())

    @include('subviews.sidemenu')

@else

    @include('subviews.welcome')

@endif
