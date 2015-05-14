<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #666;
				display: table;
				font-weight: 300;
				font-family: 'Lato';
			}

			.container {
				text-align: left;
				vertical-align: middle;
				width:960px;
				margin: 0 auto;
				margin-top: 200px;
			}

			.content {
				text-align: left;
				display: inline-block;
			}
			.content ul li{
				text-align: left;
			}

			.title {
				font-size: 30px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="title">CodeCommerce - Admin - Wellcome</div>
			<div class="content">
				<ul>
					<li><a href="{{ route('admin_category')}}">Categories</a></li>
	               	<li><a href="{{ route('admin_product')}}">Products</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>
