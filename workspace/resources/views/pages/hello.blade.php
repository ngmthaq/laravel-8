@extends('layouts.base')

@section('title')
    Home
@endsection

@section('body')
    <h1>Hello world</h1>
    <form>
        <button type="button" class="btn btn-primary" id="upload">
            Upload
        </button>
    </form>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("button#upload").on("click", function() {
                $(this).startButtonLoading(true, "Uploading");

                setTimeout(() => {
                    $(this).startButtonLoading(false);
                }, 3000);
            });

        });
    </script>
@endpush
