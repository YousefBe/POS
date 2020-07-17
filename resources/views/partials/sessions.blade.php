@if(session()->has('Admin-Created'))
<div class="alert alert-success">
    {{session()->get('Admin-Created')}}
</div>
@endif
@if(session()->has('user-Deleted'))
<div class="alert alert-success">
    {{session()->get('user-Deleted')}}
</div>
@endif
@if(session()->has('user-updated'))
<div class="alert alert-success">
    {{session()->get('user-updated')}}
</div>
@endif
@if(session()->has('product-added'))
<div class="alert alert-success">
    {{session()->get('product-added')}}
</div>
@endif
@if(session()->has('product-updated'))
<div class="alert alert-success">
    {{session()->get('product-updated   ')}}
</div>


@endif

@if(session()->has('order-updated'))
<div class="alert alert-success">
    {{session()->get('order-updated')}}
</div>
@endif



@if(session()->has('order-created'))
<div class="alert alert-success">
    {{session()->get('order-created   ')}}
</div>
@endif
@if(session()->has('order-created'))
<div class="alert alert-success">
    {{session()->get('order-created')}}
</div>
@endif
@if(session()->has('product-deleted'))
<div class="alert alert-danger">
    {{session()->get('product-deleted')}}
</div>
@endif
@if(session()->has('Category-deleted'))
<div class="alert alert-danger">
    {{session()->get('Category-deleted')}}
</div>
@endif