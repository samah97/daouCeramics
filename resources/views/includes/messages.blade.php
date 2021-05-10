@if(count($errors) > 0 && (true == ($showErrorsList ?? false) || !isset($showErrorsList)))
    <div class="alert alert-danger">
        <label>Please fix the below errors:</label>
        <ol>
    @foreach($errors->all() as $error)
                <li class="list-item">
                {{$error}}
                </li>
    @endforeach
        </ol>
    </div>
@endif

@if(session('success'))
    @isset($useSwal)
        <script>
            swal("",'{{$popupMessage}}','success');
        </script>
    @else
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endisset

@endif

@if(session('error'))

    @isset($useSwal)
        <script>
            swal("",'{{$popupMessage}}','error');
        </script>
    @else
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endisset
@endif

@if(session('useSwal'))
    <script>
        swal("",'{{session('popupMessage')}}','{{session('popupResult')}}');
    </script>
@endif
@isset($useSwal)
    <script>
        swal("",'{{$popupMessage}}','{{$popupResult}}');
    </script>
@endisset


