<h1>Post List</h1>

<ul>
@foreach($data as $item)
<li>
{{$item['id']}}

<a href="posts/{{$item['id']}}">
{{$item['title']}}</a>
<p>{{$item['body']}}</p>
</li>
@endforeach
</ul>


