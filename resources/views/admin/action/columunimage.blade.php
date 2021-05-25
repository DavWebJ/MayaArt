@if (!empty($banner))
    
<div class="w-20 row justify-center items-center">
    <img src="{{asset($banner)}}" class="img-fluid">
</div>
@elseif(!empty($vignette1))

<div class="row justify-center items-center w-10">
    <img src="{{asset($vignette1)}}" class="img-fluid">
</div>
@elseif(!empty($vignette))

<div class="row justify-center items-center w-10">
    <img src="{{asset($vignette)}}" class="img-fluid">
</div>
@endif
