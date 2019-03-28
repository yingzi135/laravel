<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>轮播图列表</title>
	<style>
		td{
			text-align:center;
		}
		p{
			background:lightgreen;
			opacity: 50%;
		}
	</style>
</head>
<body>
	<p id="tip">{{session('success')}}</p>
	<table border="1" width="800">
		<tr>
			<th>ID</th>
			<th>图片名</th>
			<th>图片</th>
			<th>上传时间</th>
			<th>操作</th>
		</tr>
		@foreach($data as $row)
		<tr>
			<td>{{$row->id}}</td>
			<td>{{$row->pname}}</td>
			<td><img src="{{$row->url}}" width="200"></td>
			<td>{{date('Y-m-d',$row->time)}}</td>
			<td>
				<a href="">修改 | </a>
				<a href="">删除</a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="pagination">{{$data->render()}}</div>
</body>
<script>
	var p = document.getElementById('tip');
	p.onclick = function(){
		// alert('111');
		p.style.display = "none";
	}
</script>
</html>