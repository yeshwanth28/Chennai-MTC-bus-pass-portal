<?php
	session_start();
	include_once dirname(__FILE__) . "/header.php";
	if( !isset( $_SESSION[ 'user_id' ] ) ) {
	    $link = 'login.php';
	} else {
		$link = 'bookpass.php';
	}
?>
<div id="header-featured">
	<div id="banner-wrapper">
		<div id="banner" class="container">
			<h2>CHENNAI MTC</h2>
			<p>Metropolitan Transport Corporation (MTC) is the governmental
agency that operates public bus services in and around the city of
Chennai, India. With around 3500 buses covering nearly 850
routes, MTC ferries up to 5.4 million people every day. </p>
			<a href="<?php echo $link; ?>" class="button">Book Pass</a>
		</div>
	</div>
</div>
<div id="wrapper">
<div id="page" class="container">
		<div id="ourservices" class="col-sm-8">
			<div class="title">
				<h2>OUR SERVICES</h2>
				<span class="byline"></span> </div>
			<p><img src="images/mtc_old_bus.jpg" alt="" class="image image-full" />
			</p><h4>
			<p>Providing services for public travelers (quality, efficient, comprehensive and secure) services.
            Passenger friendly service planning and encouragement.
Maximum use and efficiency of resources.
Implementing environmentally friendly and sustainable practices.
Strengthening the passenger information system.
Modernization of vehicles and achieving zero deterrence.
Making Efficient System for Effective Supply of Services.
For partner information, check out operational details.
Increasing commercial revenue from the land owned by the firm, the management of buildings and buses.
Increasing efficiency in operations and administration.
Coordinating Inter-Organization Coordination and Different Model Transportation Systems.
Conduct Raceway and Implementation of Work Plan Forms To make service rituals practical.
Extensive adoption of information technology to improve service quality.
Extending travel concessions to society's weaker sections.
Coordinating cultural confluence and national integrity and unity.
Encouraging research in urban transport.
</p></h4><br>
<h3>MTC Limited is operating bus services in different types with different rate of fare approved by the Government are as follows: </h3>
<h4>

<p>a) Ordinary Services -   White   Board with Black    Letters<br>
b) L.S.S./PP Services   -   Yellow Board with Black Letters<br>
c) Express Services -   White   Board with Green Letters<br>
d) Deluxe Services  -   Green   Board with Blue Letters<br>
e) M Services   -   White   Board with Blue Letters<br>
f) Night Services   -   Black   Board with White Letters<br>
</p></h4>
		</div>
		<div id="" class="col-sm-4">
			<ul class="style1">
				<li class="first">
					<h3>Services 1</h3>
                    <h3>Daily Ticket Rs.70 :</h3>
					<p>Allowed to travel in Ordinary/EXP/Deluxe services except Volvo/Night services/Lift services/Chartered trips<br>
Valid for the date of issue only<br>
Valid only if signed by the purchaser<br>
Ticket is available with the conductor.</p>
				</li>
				<li>
					<h3>Services 2</h3>
                    <h3>Monthly Ticket Rs.1,000 :</h3>
					<p>Monthly Ticket Rs.1,000 :
Allowed to travel in Ordinary/EXP/Deluxe/Night services except Volvo/Lift services and Chartered trips<br>
Valid for the period mentioned in the card<br>
Valid only if signed by the purchaser<br>
No duplicate card is issued<br>
To travel with the identity card issued by the MTC<br>
Issued from from 1st to 20th of every month during 08.30 Hours to 11.00 Hours &15.00 Hours to 19.30 Hours<br></p>
				</li>

			</ul>
				</div>
	</div><br><br><br>
    <div id="contactus">
		<div id="featured" class="extra2 container">
			<div class="main-title">
				<h2>Contact Us</h2>
				<span class="byline">Details of Designation of Public Information Officer</span> </div>
<p><h2>Public Information Officer:
</h2>
1.  Thiru. M.Chandrasekhar, B.Com., A.C.S. Company Secretary,<br>
Metropolitan Transport Corporation (Chennai) Limited, Pallavan House, Annasalai,<br>
Chennai – 600 002,<br>

Ph: (044) 2345 5801 Extn.234.
</p>
<p>
    <h2>Asst. Public Information Officer</h2>

1.  Thiru.K.S.Shanmugam, M.A. (Soc.), M.A. (Tamil) PGDTA., Assistant Manager (Public Relations)<br>

Metropolitan Transport Corporation (Chennai) Limited, Pallavan House, Annasalai,<br>
Chennai – 600 002,<br>

Ph: (044) 2345 5866<br>

2345 5801 Extn.236
</p>
<p>
    <h2>Appellate Authority</h2>

1.  Thiru. R.Balasubramanian, B.E.,M.B.A., M.C.A., Managing Director,<br>
Metropolitan Transport Corporation (Chennai) Limited, Pallavan House, Annasalai,<br>
Chennai – 600 002,<br>


Ph: Personal : (044) 2345 5833<br>
Office  :   2345 5801 Extn.222
</p>


		</div><br><br>
	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved.</p>
</div>
</body>
</html>
