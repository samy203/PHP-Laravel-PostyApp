@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and Recieved {{ $user->RecievedLikes()->count() }} {{ Str::plural('like', $user->RecievedLikes()->count()) }}</p>
            </div>

            <div class="w-8/12 bg-white p-6 rounded-lg">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <x-post :post='$post' />
                    @endforeach

                    {{ $posts->links() }}
                @else
                    <p>There is no posts available</p>
                @endif
            </div>
        </div>
    </div>
@endsection
