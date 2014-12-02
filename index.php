<?php

	if($_POST['formSubmit'] == "Submit") 
    {
		$errorMessage = "";
		
		if(empty($_POST['name'])) 
        {
			$errorMessage .= "<li>You forgot to enter your name!</li>";
		}
		if(empty($_POST['ssn'])) 
        {
			$errorMessage .= "<li>You forgot to enter your social security number!</li>";
		}
		if(empty($_POST['dob'])) 
        {
			$errorMessage .= "<li>You forgot to enter your date of birth!</li>";
		}
        if(empty($_POST['race'])) 
        {
			$errorMessage .= "<li>You forgot to enter your race!</li>";
		}
        if(empty($_POST['gender'])) 
        {
			$errorMessage .= "<li>You forgot to enter your gender!</li>";
		}
        if(empty($_POST['program'])) 
        {
			$errorMessage .= "<li>You forgot to enter your program of interest!</li>";
		}
        if(empty($_POST['start_date'])) 
        {
			$errorMessage .= "<li>You forgot to enter your start date!</li>";
		}
        if(empty($_POST['present_address'])) 
        {
			$errorMessage .= "<li>You forgot to enter your present address!</li>";
		}
        if(empty($_POST['city'])) 
        {
			$errorMessage .= "<li>You forgot to enter your city!</li>";
		}
        if(empty($_POST['state'])) 
        {
			$errorMessage .= "<li>You forgot to enter your state!</li>";
		}
        if(empty($_POST['zip'])) 
        {
			$errorMessage .= "<li>You forgot to enter your zip!</li>";
		}
        if(empty($_POST['mobile'])) 
        {
			$errorMessage .= "<li>You forgot to enter your cell phone number!</li>";
		}
        if(empty($_POST['phone_alt'])) 
        {
			$errorMessage .= "<li>You forgot to enter your alternate phone number!</li>";
		}
        if(empty($_POST['txt'])) 
        {
			$errorMessage .= "<li>Can we text you?</li>";
		}
		if(empty($_POST['email'])) 
        {
			$errorMessage .= "<li>You forgot to enter an email!</li>";
		}
		if(!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL))
		{
			$errorMessage .= "<li>Invalid email!</li>";
		}
        if(empty($_POST['email_alt'])) 
        {
			$errorMessage .= "<li>You forgot to enter an alternate email!</li>";
		}
		if(!filter_var(($_POST['email_alt']), FILTER_VALIDATE_EMAIL))
		{
			$errorMessage .= "<li>Invalid alternate email!</li>";
		}
		if(empty($_POST['education_level'])) 
        {
			$errorMessage .= "<li>You forgot to enter your education level!</li>";
		}
        if(empty($_POST['hs_name'])) 
        {
			$errorMessage .= "<li>You forgot to enter your high school name!</li>";
		}
        if(empty($_POST['hs_city'])) 
        {
			$errorMessage .= "<li>You forgot to enter your high school city!</li>";
		}
        if(empty($_POST['homeschool'])) 
        {
			$errorMessage .= "<li>You forgot to select if you were homeschooled or not!</li>";
		}
		if(empty($_POST['previous_attend'])) 
        {
			$errorMessage .= "<li>You forgot to select if you previously attended cosmetology school!</li>";
		}
		if(empty($_POST['signature'])) 
        {
			$errorMessage .= "<li>You forgot to digitally sign the document!</li>";
		}
		if(empty($_POST['date'])) 
        {
			$errorMessage .= "<li>You forgot to put a date!</li>";
		}
		if(empty($_POST['rep'])) 
        {
			$errorMessage .= "<li>Which representative helped you?</li>";
		}
		if(empty($_POST['human']))
		{
			$errorMessage .= "";
		}
		if(!empty($_POST['human']))
		{
			$errorMessage .= "<li>Leave the input blank if you're human!</li>";
		}

        $varName = $_POST['name'];
        $varSsn = $_POST['ssn'];
        $varDob = $_POST['dob'];
		$varRace = $_POST['race'];
		$varGender = $_POST['gender'];
		$varProgram = $_POST['program'];
		$varStartDate = $_POST['start_date'];
		$varPresentAddress = $_POST['present_address'];
        $varCity = $_POST['city'];
		$varState = $_POST['state'];
		$varZip = $_POST['zip'];
        $varMobile = $_POST['mobile'];
        $varPhoneAlt = $_POST['phone_alt'];
        $varTxt = $_POST['txt'];
        $varEmail = $_POST['email'];
        $varEmailAlt = $_POST['email_alt'];
        $varEducationLevel = $_POST['education_level'];
        $varHSName = $_POST['hs_name'];
        $varHSCity = $_POST['hs_city'];
        $varHomeschool = $_POST['homeschool'];
        $varHomeEndorse = $_POST['home_endorse'];
        $varCollegeName = $_POST['college_name'];
		$varCollegeCity = $_POST['college_city'];
		$varDegree = $_POST['degree'];
		$varPreviousAttend = $_POST['previous_attend'];
		$varTransfer = $_POST['transfer'];
		$varCSName = $_POST['cs_name'];
		$varCSCity = $_POST['cs_city'];
		$varSig = $_POST['signature'];
		$varDate = $_POST['date'];
        $varRep = $_POST['rep'];
        $varRepDate = $_POST['rep_date'];

		if(empty($errorMessage)) 
        {
			$db = mysql_connect("tsjacksoncom.ipagemysql.com","trantergrey","TGrey11.");
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("kennethshuler" ,$db);

			$sql = "INSERT INTO ksapplication (name, ssn, dob, race, gender, program, start_date, present_address, city, state, zip, mobile, phone_alt, txt, email, email_alt, education_level, hs_name, hs_city, homeschool, home_endorse, college_name, college_city, degree, previous_attend, transfer, cs_name, cs_city, signature, date, rep, rep_date) VALUES (".
							PrepSQL($varName) . ", " .

							PrepSQL($varSsn) . ", " .

							PrepSQL($varDob) . ", " .

							PrepSQL($varRace) . ", " .

							PrepSQL($varGender) . ", " .
                            
                            PrepSQL($varProgram) . ", " .
                            
                            PrepSQL($varStartDate) . ", " .
                
                            PrepSQL($varPresentAddress) . ", " .
                
                            PrepSQL($varCity) . ", " .
                
                            PrepSQL($varState) . ", " .
                            
                            PrepSQL($varZip) . ", " .
                            
                            PrepSQL($varMobile) . ", " .
                
                            PrepSQL($varPhoneAlt) . ", " .
                
                            PrepSQL($varTxt) . ", " .
                
                            PrepSQL($varEmail) . ", " .
                            
                            PrepSQL($varEmailAlt) . ", " .
                            
                            PrepSQL($varEducationLevel) . ", " .
                
                            PrepSQL($varHSName) . ", " .
                
                            PrepSQL($varHSCity) . ", " .

							PrepSQL($varHomeschool) . ", " .
                
                            PrepSQL($varHomeEndorse) . ", " .
                
                            PrepSQL($varCollegeName) . ", " .
                
                            PrepSQL($varCollegeCity) . ", " .
                
                            PrepSQL($varDegree) . ", " .

							PrepSQL($varPreviousAttend) . ", " .

							PrepSQL($varTransfer) . ", " .

							PrepSQL($varCSName) . ", " .

							PrepSQL($varCSCity) . ", " .

							PrepSQL($varSig) . ", " .

							PrepSQL($varDate) . ", " .

							PrepSQL($varRep) . ", " .
                
                            PrepSQL($varRepDate) . ")";

			mysql_query($sql);
			
			header("Location: thank-you.html");
			exit();
		}
	}
            
    // function: PrepSQL()
    // use stripslashes and mysql_real_escape_string PHP functions
    // to sanitize a string for use in an SQL query
    //
    // also puts single quotes around the string
    
    function PrepSQL($value)
    {
        // Stripslashes
        if(get_magic_quotes_gpc()) 
        {
            $value = stripslashes($value);
        }

        // Quote
        $value = "'" . mysql_real_escape_string($value) . "'";

        return($value);
    }
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<title>KS Application Form</title>
	<link rel="stylesheet" type="text/css" href="foundation.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="initial-scale=1">
</head>

<body>
<div class="start noprint"></div>

<div class="large-6 large-centered text-center columns promise noprint">
	<h1>APPLICATION</h1>
</div>
   <?php
	    if(!empty($errorMessage)) 
	    {
		    echo("<div class=\"error\"><p>There was an error with your form:</p>\n");
		    echo("<ul>" . $errorMessage . "</ul></div>");
        }
    ?>

<div class="form-wrap large-8 small-12 small-centered columns">
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	    <div class="row">
	        <h1 class="section">General Information</h1>
	    </div>
		<div class="row">
			<div class="large-12 columns">
			    <label class="for-text" for='name'>Name:</label>
				<div class="input"><input type="text" name="name" maxlength="50" value="<?=$varName;?>" /></div>
			</div>
        </div>
        <div class="row">
			<div class="large-3 columns">
			    <label class="for-text" for="ssn">SSN:</label>
                <div class="input"><input type="text" name="ssn" value="<?=$varSsn;?>" /></div>
            </div>
            <div class="large-3 columns">
			    <label class="for-text" for="dob">Date of Birth:</label>
                <div class="input"><input type="text" name="dob" value="<?=$varDob;?>" /></div>
            </div>
            <div class="large-3 columns">
				<label class="for-text" for="race">Race:</label>
                <div class="input"><input type="text" name="race" value="<?=$varRace;?>" /></div>
            </div>
            <div class="large-3 columns">
				<label for='gender'>Gender:</label><br>
				<input type='radio' name='gender' value="M"> Male<br>
				<input type='radio' name='gender' value="F"> Female<br>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for="program" class="inline">What is your program of interest?</label><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="program" value="Cosmetology"/><span class="inline"> Cosmetology</span>&nbsp;&nbsp;
				<input type="radio" name="program" value="Esthetics"/><span class="inline"> Esthetics</span>&nbsp;&nbsp;
				<input type="radio" name="program" value="Nail Tech"/><span class="inline"> Nail Technology</span>&nbsp;&nbsp;
				<input type="radio" name="program" value="Instructor Training"/><span class="inline"> Instructor Training</span>&nbsp;&nbsp;
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for="start_date" class="inline">When would you like to start school?</label>&nbsp;&nbsp;
				<input type="radio" name="start_date" value="ASAP" /><span class="inline"> ASAP</span>&nbsp;&nbsp;
				<input type="radio" name="start_date" value="1 - 3 mo" /><span class="inline"> 1 - 3 Months</span>&nbsp;&nbsp;
				<input type="radio" name="start_date" value="6 - 12 mo" /><span class="inline"> 6 - 12 Months</span>&nbsp;&nbsp;
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
			    <label class="for-text" for='present_address'>Present Address:</label>
                <div class="input"><input type="text" name="present_address" maxlength="100" value="<?=$varPresentAddress;?>" /></div>
			</div>
			<div class="large-6 columns">
			    <label class="for-text" for='city'>City:</label>
                <div class="input"><input type="text" name="city" maxlength="30" value="<?=$varCity;?>" /></div>
			</div>
			<div class="large-3 columns">
			    <label class="for-text" for='state'>State:</label>
                <div class="input"><input type="text" name="state" maxlength="2" value="<?=$varState;?>" /></div>
			</div>
			<div class="large-3 columns">
			    <label class="for-text" for='zip'>Zip:</label>
                <div class="input"><input type="text" name="zip" maxlength="5" value="<?=$varZip;?>" /></div>
			</div>
		</div>
		<div class="row">
			<div class="large-5 columns">
			    <label class="for-text" for='mobile'>Cell Phone:</label>
                <div class="input"><input type="text" name="mobile" maxlength="10" value="<?=$varMobile;?>" /></div>
			</div>
			<div class="large-7 columns">
			    <label class="for-text" for='phone_alt'>Alternate Phone:</label>
                <div class="input"><input type="text" name="phone_alt" maxlength="50" value="<?=$varPhoneAlt;?>" /></div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for='txt' class='txt'>Can we text you?</label>&nbsp;&nbsp;
				<input type="radio" name="txt" value="y_txt" /> <span class="inline">Yes</span>&nbsp;&nbsp;
				<input type="radio" name="txt" value="n_txt" /> <span class="inline">No</span>&nbsp;&nbsp;
			</div>
		</div>
		<div class="row">
		    <div class="large-12 columns">
		        <label class="for-text" for='email'>Email:</label>
                <div class="input"><input type="text" name="email" value="<?=$varEmail;?>" />
                    <span class="email-tip">&nbsp;&nbsp;&nbsp;&nbsp;This needs to be the same email you will be using to log into PayPal in order to pay the application fee at the end of this form.</span>
                </div>
			</div>
			<div class="large-12 columns">
			    <label class="for-text" for='email_alt'>Alternate Email:</label>
                <div class="input"><input type="text" name="email_alt" value="<?=$varEmailAlt;?>" /></div>
			</div>
		</div>
		<div class="row">
		    <h1 class="section">Education Information</h1>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label for='education_level'>Highest Level of Education:</label>
            </div>
            <div class="large-9 columns">
                <input class="" type="radio" name="education_level" value="HS Senior" /><span class=""> Current High School Senior/Grade 12</span><br>
                <input class="" type="radio" name="education_level" value="HS Diploma" /><span class=""> High School Diploma/GED</span><br>
                <input class="" type="radio" name="education_level" value="College 1" /><span class=""> College or University 1+ Years</span><br>
                <input class="" type="radio" name="education_level" value="College Grad" /><span class=""> College or University Graduate</span><br>
			</div>
		</div>
		<div class="row">
		    <div class="large-6 columns">
		        <label class="for-text" for='hs_name'>High Shcool Name:</label>
                <div class="input"><input type="text" name="hs_name" value="<?=$varHSName;?>" /></div>
			</div>
			<div class="large-6 columns">
			    <label class="for-text" for='hs_city'>High School City/State:</label>
                <div class="input"><input type="text" name="hs_city" value="<?=$varHSCity;?>" /></div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for="homeschool" class="inline">Home Schooled?</label>&nbsp;&nbsp;
				<input type="radio" name="homeschool" value="homeschool_y" /><span class="inline"> Yes</span>&nbsp;&nbsp;
				<input type="radio" name="homeschool" value="homeschool_n" /><span class="inline"> No</span>&nbsp;&nbsp;
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for="home_endorse">If yes, was it endorsed by the state you lived in?</label>&nbsp;&nbsp;
				<input type="radio" name="home_endorse" value="endorse_y" /><span class="inline"> Yes</span>&nbsp;&nbsp;
				<input type="radio" name="home_endorse" value="endorse_n" /><span class="inline"> No</span>&nbsp;&nbsp;
			</div>
		</div>
		<div class="row">
		    <div class="large-12 columns">
		        <label class="for-text" for='college_name'>College/Univerdsity Name:</label>
                <div class="input"><input type="text" name="college_name" value="<?=$varCollegeName;?>" /></div>
			</div>
		</div>
		<div class="row">
		    <div class="large-12 columns">
		        <label class="for-text" for='college_city'>School City and State:</label>
                <div class="input"><input type="text" name="college_city" value="<?=$varCollegeCity;?>" /></div>
			</div>
		</div>
		<div class="row">
		    <div class="large-12 columns">
		        <label class="for-text" for='degree'>Degree of Certificate:</label>
                <div class="input"><input type="text" name="degree" value="<?=$varDegree;?>" /></div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for="previous_attend" class="inline">Have you previously attended cosmetology school?</label>&nbsp;&nbsp;
				<input type="radio" name="previous_attend" value="previous_y" /><span class="inline"> Yes</span>&nbsp;&nbsp;
				<input type="radio" name="previous_attend" value="previous_n" /><span class="inline"> No</span>&nbsp;&nbsp;
			</div>
			<div class="large-12 columns">
				<label for="transfer" class="inline">If yes, are you wanting to transfer hours?</label>&nbsp;&nbsp;
				<input type="radio" name="transfer" value="transfer_y" /><span class="inline"> Yes</span>&nbsp;&nbsp;
				<input type="radio" name="transfer" value="transfer_n" /><span class="inline"> No</span>&nbsp;&nbsp;
			</div>
		</div>
		<div class="row">
		    <div class="large-12 columns">
		        <label class="for-text" for='cs_name'>Cosmetology School Name:</label>
                <div class="input"><input type="text" name="cs_name" value="<?=$varCSName;?>" /></div>
			</div>
		</div>
		<div class="row">
		    <div class="large-12 columns">
		        <label class="for-text" for='cs_city'>School City and State:</label>
                <div class="input"><input type="text" name="cs_city" value="<?=$varCSCity;?>" /></div>
			</div>
		</div>
		<div class="row">
		    <div class="large-8 columns">
		        <label class="for-text" for='signature'>Signature:</label>
                <div class="input"><input type="text" name="signature" value="<?=$varSig;?>" /></div>
			</div>
			<div class="large-4 columns">
			    <label class="for-text" for='date'>Date:</label>
                <div class="input"><input type="text" name="date" value="<?=$varDate;?>" /></div>
			</div>
		</div>
		<div class="row">
		    <div class="large-8 columns">
		        <label class="for-text" for='rep'>Admissions Rep:</label>
                <div class="input"><input type="text" name="rep" value="<?=$varRep;?>" /></div>
			</div>
			<div class="large-4 columns">
			    <label class="for-text" for='rep_date'>Date:</label>
                <div class="input"><input type="text" name="rep_date" value="<?=$varRepDate;?>" /></div>
			</div>
		</div>
		<div class="row human-hide">
			<div class="columns">
				<input type="text" name="human" value=""><br>
				<label class="for-text" for="human">Leave this blank if you're human:</label>
			</div>
		</div>
		<div class="row noprint">
			<div class="large-12 columns">
				<input class="button right" type="submit" name="formSubmit" value="Submit" />
				<a href="#" class="print button right">Print this form</a>
			</div>
		</div>
	</form>
</div>


<script type="text/javascript">
$(".print").click(function () {
            window.print();
        });

</script>
</body>
</html>