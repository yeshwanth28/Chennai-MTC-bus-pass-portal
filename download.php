
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<style type="text/css">

.row-no-gutter {
	margin-right: 0;
	margin-left: 0;
}

.row-no-gutter [class*="col-"] {
	padding-right: 0;
	padding-left: 0;
}


#card {
	background: #fff;
	position: relative;

	-webkit-box-shadow: 0px 1px 10px 0px rgba(207,207,207,1);
	-moz-box-shadow: 0px 1px 10px 0px rgba(207,207,207,1);
	box-shadow: 0px 1px 10px 0px rgba(207,207,207,1);

	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;	
}

.city-selected {
	position: relative;
	overflow: hidden;
	min-height: 200px;
	background: #3D6AA2;
}

article {
	position: relative;
	z-index: 2;
	color: #fff;
	padding: 20px;

	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	-webkit-flex-direction: row;
	-ms-flex-direction: row;
	flex-direction: row;
	-webkit-flex-wrap: wrap;
	-ms-flex-wrap: wrap;
	flex-wrap: wrap;
	-webkit-justify-content: space-between;
	-ms-flex-pack: justify;
	justify-content: space-between;
	-webkit-align-content: flex-start;
	-ms-flex-line-pack: start;
	align-content: flex-start;
	-webkit-align-items: flex-start;
	-ms-flex-align: start;
	align-items: flex-start;
}

.info .city,
.night {
	font-size: 24px;
	font-weight: 200;
	position: relative;


	-webkit-order: 0;
	-ms-flex-order: 0;
	order: 0;
	-webkit-flex: 0 1 auto;
	-ms-flex: 0 1 auto;
	flex: 0 1 auto;
	-webkit-align-self: auto;
	-ms-flex-item-align: auto;
	align-self: auto;
}

.info .city:after {
	content: '';
	width: 15px;
	height: 2px;
	background: #fff;
	position: relative;
	display: inline-block;
	vertical-align: middle;
	margin-left: 10px;
}

.city span {
	color: #fff;
	font-size: 13px;
	font-weight: bold;

	text-transform: lowercase;
	text-align: left;
}

.night {
	font-size: 15px;
	text-transform: uppercase;
}

.icon {
	width: 84px;
	height: 84px;
	-webkit-order: 0;
	-ms-flex-order: 0;
	order: 0;
	-webkit-flex: 0 0 auto;
	-ms-flex: 0 0 auto;
	flex: 0 0 auto;
	-webkit-align-self: center;
	-ms-flex-item-align: center;
	align-self: center;

	overflow: visible;

}


.temp {
	font-size: 73px;
	display: block;
	position: relative;
	font-weight: bold;
}

svg {
	color: #fff;
	fill: currentColor;
}


.wind svg {
	width: 18px;
	height: 18px;
	margin-top: 20px;
	margin-right: 10px;
	vertical-align: bottom;
}

.wind span {
	font-size: 13px;
	text-transform: uppercase;
}

.city-selected:hover figure {
	opacity: 0.4;
}


figure {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    background-position: center;
    background-size: cover;
    opacity: 0.1;
    z-index: 1;

    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.days .row [class*="col-"]:nth-child(2) .day  {
    border-width: 0 1px 0 1px;
    border-style: solid;
    border-color: #eaeaea;
}

.days .row [class*="col-"] {
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;	
}

.days .row [class*="col-"]:hover{
	background: #eaeaea;
}

.day {
	padding: 10px 0px;
	text-align: center;

}

.day h1 {
	font-size: 14px;
	text-transform: uppercase;
	margin-top: 10px;
}

.day svg {
	color: #000;
	width: 32px;
	height: 32px;
}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div id="card" class="weater">
					<div class="city-selected">
						<article>
							<div class="info">
								<div class="city">Passenger Name: Jagadeesh</div>
								<div class="night">Pass Type - One day</div>
								<div class="temp">Rs.150</div>
								<div class="wind">
								</div>
							</div>
						</article>
					</div>

					<div class="days">
						<div class="row row-no-gutter">
							<div class="col-md-4">
								<div class="day">
									<h1>Valid From - To<br/><b>12-08-2018 - 12-09-2018</b></h1>
									
								</div>
							</div>

							<div class="col-md-4">
								<div class="day">
									<h1>From<br/><b>Tambaram</b></h1>
									
								</div>
							</div>

							<div class="col-md-4">
								<div class="day">
									<h1>Destination<br/><b>Velacherry</b></h1>
									
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>