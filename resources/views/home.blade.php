@if (Auth::user()->hasAnyRole(Spatie\Permission\Models\Role::all()))
    @include('admin.index')
@else 
    @include('customer.index')
@endif
