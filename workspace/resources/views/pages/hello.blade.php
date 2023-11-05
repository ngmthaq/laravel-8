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
            $("button#upload").on("click", async function() {
                $(this).startButtonLoading(true, "Uploading");
                const ajax = new Ajax();
                const response1 = await ajax.get({
                    url: "https://jsonplaceholder.typicode.com/posts/1",
                    data: {
                        a: "b"
                    }
                });
                console.log(response1.data);
                const response2 = await ajax.post({
                    url: "https://jsonplaceholder.typicode.com/posts",
                    data: {
                        title: 'foo',
                        body: 'bar',
                        userId: 1,
                    }
                });
                console.log(response2.data);
                $(this).startButtonLoading(false);
            });

        });
    </script>
@endpush
