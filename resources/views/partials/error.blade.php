@if(\Illuminate\Support\Facades\Session::get('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        {{\Illuminate\Support\Facades\Session::get('error')}}
    </div>
@endif
