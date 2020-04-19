<div class="container mt-2">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> ОШИБКА! {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
