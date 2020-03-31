@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Notifications</div>

    <div class="card-body">
      <ul class="list-group">
        @foreach($notifications as $notification)
          <li class="list-group-item">
            @if($notification->type== "App\Notifications\NewReplyAdded")
            A new reply was added to your discussion:
            <strong>{{ $notification->data['discussion']['title'] }}</strong>
            <a class="btn float-right btn-sm btn-info" href="{{route('discussions.show', $notification->data['discussion']['slug'])}}">View discussion</a>
            @elseif($notification->type== "App\Notifications\ReplyMarkedAsBestReply")
            Your reply was marked as best reply:
            <strong>{{ $notification->data['discussion']['title'] }}</strong>
            <a class="btn float-right btn-sm btn-info" href="{{route('discussions.show', $notification->data['discussion']['slug'])}}">View discussion</a>
            @endif
          </li>
        @endforeach
      </ul>
    </div>
</div>

@endsection