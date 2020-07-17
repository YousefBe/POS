@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-group">
        @foreach ($errors->all() as $erorr)

        <li class="list-group-item">
            {{$erorr}}
        </li>

        @endforeach
    </ul>

</div>
@endif