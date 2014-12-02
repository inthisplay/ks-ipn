<?php
       //Change these with your information
    $paypalmode = 'sandbox'; //Sandbox for testing or empty ''
    $dbusername     = '...'; //db username
    $dbpassword     = '...'; //db password
    $dbhost     = 'localhost'; //db host
    $dbname     = 'kennethshuler'; //db name

if($_POST)
{
        if($paypalmode=='sandbox')
        {
            $paypalmode     =   '.sandbox';
        }
        $req = 'cmd=' . urlencode('_notify-validate');
        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: www'.$paypalmode.'.sandbox.paypal.com'));
        $res = curl_exec($ch);
        curl_close($ch);

        if (strcmp ($res, "VERIFIED") == 0)
        {
            $paymentstatus = $_POST['payment_status'];

            $conn = mysql_connect($dbhost,$dbusername,$dbpassword);
            if (!$conn)
            {
             die('Could not connect: ' . mysql_error());
            }

            mysql_select_db($dbname, $conn);

            // insert in our IPN record table
            $query = "INSERT INTO kennethshuler
            (paypal_payment)
            VALUES
            ('$paymentstatus')";

            if(!mysql_query($query))
            {
                echo "Could not connect..."
            }
            mysql_close($conn);
            
            
            
            //////////////  SEND EMAIL  //////////////
            
            $con=mysqli_connect("localhost","...","...","kennethshuler");
            // Check connection
            if (mysqli_connect_errno())
            {
            echo "Failed to connect to database: " . mysqli_connect_error();
            }

            $result = mysqli_query($con,"SELECT * FROM ksapplication WHERE `email` OR `email_alt` = '" . ['payer_email'] . "'");

            // the message
            $message = while($row = mysqli_fetch_array($result))
            {
            echo "<p>Name: " . $row['name'] . "</br>";
            echo "SSN: " . $row['ssn'] . "</br>";
            echo "DOB: " . $row['dob'] . "</br>";
            echo "Race: " . $row['race'] . "</br>";
            echo "Gender: " . $row['gender'] . "</br>";
            echo "Program: " . $row['program'] . "</br>";
            echo "Start Date:" . $row['start_date'] . "</br>";
            echo "Present Address: " . $row['present_address'] . "</br>";
            echo "City: " . $row['city'] . "</br>";
            echo "State: " . $row['state'] . "</br>";
            echo "Zip: " . $row['zip'] . "</br>";
            echo "Mobile: " . $row['mobile'] . "</br>";
            echo "Alt Phone: " . $row['phone_alt'] . "</br>";
            echo "Can we text: " . $row['txt'] . "</br>";
            echo "Email: " . $row['email'] . "</br>";
            echo "Alt Email: " . $row['email_alt'] . "</br>";
            echo "Education Level: " . $row['education_level'] . "</br>";
            echo "High School Name: " . $row['hs_name'] . "</br>";
            echo "High School City: " . $row['hs_city'] . "</br>";
            echo "Homeschooled (y or n): " . $row['homeschool'] . "</br>";
            echo "Homeschool Endorsed: " . $row['home_endorse'] . "</br>";
            echo "College Name: " . $row['college_name'] . "</br>";
            echo "College City: " . $row['college_city'] . "</br>";
            echo "Degree: " . $row['degree'] . "</br>";
            echo "Previously Attend Cosmo School: " . $row['previous_attend'] . "</br>";
            echo "Transfer Credits (y or n): " . $row['transfer'] . "</br>";
            echo "Cosmo School Name: " . $row['cs_name'] . "</br>";
            echo "Cosmo School City: " . $row['cs_city'] . "</br>";
            echo "Date Submitted: " . $row['date'] . "</br>";
            echo "ID: " . $row['id'] . "</p>";
            }
            mysqli_close($con);
            
            // In case any of our lines are larger than 70 characters, we should use wordwrap()
            $message = wordwrap($message, 70, "\r\n");
            
            // Send
            mail('ty.s.jackson@gmail.com', 'Test Email', $message);            

        }        

}
?>