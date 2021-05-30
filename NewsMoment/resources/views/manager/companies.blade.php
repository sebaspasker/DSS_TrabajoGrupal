@foreach ($companies as $company)
{{$company->id}}
{{$company->name}}
{{$company->is_active}}
{{$company->image_url}}<br>
@endforeach