@if (!empty($banner))
    
<div class="block w-20">
    <img src="{{asset($banner)}}" class="img-fluid">
</div>
@elseif(!empty($vignette1))

<div class="block w-10">
    <img src="{{asset($vignette1)}}" class="img-fluid">
</div>
@elseif(!empty($vignette))

<div class="block w-10">
    <img src="{{asset($vignette)}}" class="img-fluid">
</div>
@endif
