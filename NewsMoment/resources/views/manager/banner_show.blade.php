  
@foreach ($banners as $banner)
{{$banner->title}}
{{$banner->url}}
{{$banner->company_name}}
{{$banner->ranking_type}}
{{$banner->image_url}}
{{$banner->views_counter}}
@endforeach