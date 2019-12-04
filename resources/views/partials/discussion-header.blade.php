<div class="card-header">
  <div class="d-flex justify-content-between">
    <div>
      <img src="{{ Gravatar::src($discussion->author->email) }}" style="height: 40px; width: 40px; border-radius: 50%;">
      <strong class="ml-2">{{ $discussion->author->name }}</strong>
    </div>
    <div>
      <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-success btn-sm">View Discussion</a>
    </div>
  </div>
</div>
