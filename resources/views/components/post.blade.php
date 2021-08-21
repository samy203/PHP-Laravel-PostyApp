@props(['post' => $post])

<div class="mb-4">
    <a class="font-bold" href="{{ route('users.posts', $post->user) }}">{{ $post->user->name }}</a>
    <a href="{{route('posts.show',$post)}}" class="text-gray-600 text-sm">{{ $post->created_at->DiffForHumans() }}</a>

    <p class="mb-2">{{ $post->body }}</p>
    @can('delete', $post)
        <div>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mb-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        </div>
    @endcan
    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(Auth::user()))
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>