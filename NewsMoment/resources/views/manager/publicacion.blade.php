@foreach ($publications as $publication)
{{$publication->id}}
{{$publication->title}}
{{$publication->subtitle}}
{{$publication->source}}
{{$publication->body}}
{{$publication->image_url}}
{{$publication->video_url}}
{{$publication->views_counter}}<br>
@endforeach