<html>
	<head>
		<title>{{ ucfirst(trans($Name)) }}</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: top;
			}

			.content {
				text-align: center;
				display: inline-block;
				vertical-align: top;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content"><br><br>
				<div class="title">{{ ucfirst(trans($Name)) }}</div>
				Welcome to {{ $Name }}
			</div>
			<? //include("/var/www/html/informational/InformationalAd.php");  ?>

		</div>
	</body>
</html>
