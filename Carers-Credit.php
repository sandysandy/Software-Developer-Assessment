<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Carers Credit Checker</title>
    <script src="assert.js" type="text/javascript"></script>
    <script src="Claimant.js" type="text/javascript"></script>
  </head>
  <body>
    <h1>Carers Credit Entitlement Check</h1>
    <p>Customer is entitled to Carers Credit if the following conditions are met:</p>
    <ul>
      <li>Age is 16 or over</li>
      <li>Age is less than retirment age (65 for male, 63 for female)</li>
      <li>Person being cared for is in receipt of qualifying benefits:</li>
        <ul>
          <li>Personal Independence Payment (PIP) daily living component</li>
          <li>Disability Living Allowance (DLA) - the middle or highest care rate</li>
          <li>Attendance Allowance</li>
          <li>Constant Attendance Allowance at or above the normal maximum rate with an Industrial Injuries Disablement Benefit, or basic (full day) rate with a War Disablement Pension</li>
          <li>Armed Forces Independence Payment (AFIP)</li>
        </ul>
      <li>Is caring for the person for at least 20 hours per week.</li>
    </ul>

    <h2>PHP Output</h2>
    <h3>Age: 20, Gender: female, Benefits: Personal Independence Payment (PIP) daily living component, Hours Caring: 25</h3>
    <script type="text/javascript">

    try {
      // testClaimant = new Claimant (16, 'male', ['Armed Forces Independence Payment (AFIP)'], 20);
      // test = assert(testClaimant.entitlementCheck() === 'yes', 'Test Entitlement Check function, Age: 16, Gender: male, Benefits: Armed Forces Independence Payment (AFIP), Hours Caring: 20 - expected Pass');
      //
      // testClaimant2 = new Claimant (15, 'male', ['Attendance Allowance'], 20);
      // test2 = assert(testClaimant2.entitlementCheck() === 'yes', 'Test Entitlement Check function, Age: 15, Gender: male, Benefits: Attendance Allowance, Hours Caring: 20 - expected Fail');

      var myCallerAge = 20;
      var myCallerGender = 'female';
      var myCallerBenefits = ['Personal Independence Payment (PIP) daily living component'];
      var myCallerCaringHours = 25;

      var myCaller = new Claimant(myCallerAge,myCallerGender,myCallerBenefits,myCallerCaringHours)
      document.write('<p>Age: 20, Gender: female, Benefits: Personal Independence Payment (PIP) daily living component, Hours Caring: 25</p>')
      document.write(myCaller.entitlementCheck());

    } catch(err) {
      document.write(err.message);
    }

    </script>

    <h2>PHP Output</h2>
    <h3>Age: 16, Gender: male, Benefits: Attendance Allowance, Hours Caring: 20</h3>
    <p>
      <?php
        require_once 'PHP Version/Claimant.php';

        $myCaller = new Claimant (16, 'male', ['Attendance Allowance'], 20);

        echo $myCaller->entitlementCheck(); // Prints outcome of  Age: 16, Gender: male, Benefits: Attendance Allowance, Hours Caring: 20
      ?>
    </p>

  </body>
</html>
