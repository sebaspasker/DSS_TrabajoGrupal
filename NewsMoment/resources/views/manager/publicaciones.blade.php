@foreach ($publications as $publication)
{{$publication->id}}
{{$publication->title}}
{{$publication->subtitle}}
{{$publication->source}}
{{$publication->body}}
{{$publication->category}}
{{$publication->editor_email}}
{{$publication->image_url}}
{{$publication->video_url}}
{{$publication->active}}
{{$publication->views_counter}}<br>
@endforeach