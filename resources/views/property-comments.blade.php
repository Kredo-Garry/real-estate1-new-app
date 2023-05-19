<div class="mt-3">
    <div class="all-comments p-3 bg-light border border-3 border-success border-top-0 border-end-0 border-bottom-0" style="height: 200px; color: white; overflow: scroll">
        @forelse ($all_comments as $comment)
        
                @if($comment->property_id == $p_property->id)
                    <p class="text-muted m-0 fw-bold">{{$comment->user->name}}</p>
                    <p class="text-muted m-0">{{$comment->body}}</p>    
                @endif
        @empty
            
        @endforelse
    </div>
    <form action="{{route('comment.store', $p_property->id)}}" method="post" class="mt-2">
        @csrf
        <div class="input-group">
            <textarea name="property_comment{{$p_property->id}}" rows="2" class="form-control form-control-sm" placeholder="Add your comments here">{{ old('property_comment' . $p_property->id) }}</textarea>
            @error('property_comment')
                <p class="text-danger small">{{$message}}</p>
            @enderror
            <button type="submit" class="btn btn-outline-secondary btn-sm">Insert</button>
        </div>
    </form>
</div>