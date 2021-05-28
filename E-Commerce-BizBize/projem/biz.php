<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Biz</title>
	<style type="text/css">
ul,ol,li,h1,h2,h3{
	margin: 0;
	padding:0;
	font-family: sans-serif;
}
#wp
{
	width: 85vw;
	margin:60px auto;
	margin-left:130px;
}
#pe{
	list-style: none;
	margin: 100px 0;
	height: 395px;
}
#pe li{
	display: inline;
	float:left;
	perspective: 500px;
	transform-style: preserve-3d;
	transition-property: perspective;
	transition-duration: 1s;
	margin-right: 49px;
}
#pe li img{
	width:336px;
	border:10px solid #fcfafa;
	transform: rotateY(30deg);
	box-shadow: 0 3px 10px #888;
	transition-property: transform;
	transition-duration: 0.5s;
	cursor: pointer;
}
#pe li:hover img{
	transform: rotateY(0deg);

}

#pe li:hover .card{
	transform: rotateY(0deg);
	box-shadow: 0 5px 10px #888;
	margin:-185px 0 0 30px;
}


	</style>
</head>
<body>

<div id="wp">
		<h2 style="text-align: center;">Biz</h2>
		<hr>
		<div id="ct">
				<ul id="pe">
					<li>
						<img src="dimg/a.jpg">
					</li>

					<li>
						<img   src="dimg/b.png">
					</li>

					<li>
						<img  src="../../k1/abc.png">
					</li>
				</ul>
		</div>
	</div>
</body>
</html>