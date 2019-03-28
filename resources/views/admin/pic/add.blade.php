<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加页</title>
</head>
<body>
	<form action="/pic" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		图片上传:
		<input type="file" name="pic" id="pic"><br>
		<input type="submit" value="上传">
	</form>
</body>
</html>