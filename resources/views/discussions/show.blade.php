@extends('layouts.app')

@section('content')

<div class="card">
    @include('partials.discussion-header')
    <div class="card-body">
        <div class="text-center">
          <strong class="text-center">{{ $discussion->title }}</strong>
        </div>
        <hr>
        {!! $discussion->content !!}
        @if($discussion->bestReply)
          <div class="card my-5">
            <div class="card-header bg-success" style="color: white;">
              <div class="d-flex justify-content-between">
                <div>
                  <strong class="ml-2">Best reply</strong>
                </div>
                <div>
                  <strong class="ml-2">{{ $discussion->bestReply->owner->name }}</strong>
                </div>
              </div>
            </div>
            <div class="card-body">
              {!! $discussion->bestReply->content !!}
            </div>
          </div>
        @endif
    </div>
</div>

@foreach($discussion->replies()->paginate(3) as $reply)
<div class="card my-5">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <div>
          <img src="{{ Gravatar::src($reply->owner->email) }}" style="height: 40px; width: 40px; border-radius: 50%;">
          <strong class="ml-2">{{ $reply->owner->name }}</strong>
        </div>
        <div>
          @if (auth()->user()!= NULL && auth()->user()->id == $discussion->user_id)
          <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-sm btn-primary">Mark as best reply</button>
          </form>
          @endif
        </div>
      </div>
    </div>
    <div class="card-body">
      {!! $reply->content !!}
    </div>
</div>
@endforeach
{{ $discussion->replies()->paginate(3)->links() }}

<div class="card my-5">
    <div class="card-header">
      Add a reply
    </div>
    <div class="card-body">
      @auth
      <form action="{{ route('replies.store', $discussion->slug) }}" method="post">
        @csrf
        <input type="hidden" name="content" id="content">
        <trix-editor input="content"></trix-editor>
        <button type="submit" class="btn btn-success btn-sm my-2">Add reply</button>
      </form>
      @else
      <a href="{{ route('login') }}" class="btn btn-info">Sign in to add a reply</a>
      @endauth
    </div>
</div>

@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection
@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection
