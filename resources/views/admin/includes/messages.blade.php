@if ($errors->any())
<div class="alert error">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('error'))
<div class="alert error">
    <ul>
        <li>{{ Session::get('error')}}</li>
    </ul>
</div>
@endif

@if (Session::has('success'))
<div class="alert success">
    <ul>
        <li>{{ Session::get('success')}}</li>
    </ul>
</div>
@endif