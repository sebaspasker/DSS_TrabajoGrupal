@foreach ($banners as $banner)
{{$banner->id}}
{{$banner->title}}
{{$banner->url}}
{{$banner->company_name}}
{{$banner->ranking_type}}
{{$banner->is_active}}
{{$banner->image_url}}<br>
@endforeach