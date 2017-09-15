<!-- breadcrumb section -->
<div class="ribbon">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ url('/dashboard') }}">Home</a>
        </li>
        <?php $key = 1 ?>
        @foreach(Request::segments() as $segment)
            @if(count(Request::segments()) == $key)
            <li class="active" style="text-transform: capitalize;">
                {{ Request::segment($key) }}
            </li>
            @else
            <li>
                <a style="text-transform: capitalize;" href="{{ url('/') }}@for($i = 1; $i <= $key; $i++)/{{Request::segment($i)}}@endfor">
                    {{ Request::segment($key) }}
                </a>
            </li>
            @endif
            <?php $key++; ?>
        @endforeach

    </ul>
</div>
