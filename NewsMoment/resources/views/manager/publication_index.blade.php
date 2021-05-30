@foreach ($publications as $publication)
{{$publication->id}}
{{$publication->title}}
{{$publication->subtitle}}
{{$publication->slugname}}
{{$publication->active}}
{{$publication->source}}
{{$publication->image_url}}
{{$publication->video_url}}
{{$publication->has_video}}
{{$publication->views_counter}}
{{$publication->category}}
{{$publication->editor_email}}
<br>
{{$publication->body}}
<br>
@endforeach
