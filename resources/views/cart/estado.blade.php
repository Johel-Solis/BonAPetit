
@if ($carritoCount ?? ''>0)

<span  class="badge badge-light"> {{$carritoCount ?? ''}}</span>
@else
<span  class="badge badge-light"> {{0}}</span> 
@endif