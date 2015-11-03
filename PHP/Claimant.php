<?php

class Claimant
{
  public $_age;
  public $_sex;
  public $_benefit;
  public $_hoursCaring;

  public function __construct($age, $sex, $benefits, $hoursCaring)
  {
      $this->_age = $age;
      $this->_sex = $sex;
      $this->_benefits = $benefits;
      $this->_hoursCaring = $hoursCaring;
  }

  public function benefitScore() {
     $score = 0;
     $qualifyingBenefits = [
      'Personal Independence Payment (PIP) daily living component',
      'Disability Living Allowance (DLA) - the middle or highest care rate',
      'Attendance Allowance',
      'Constant Attendance Allowance normal maximum rate with an Industrial Injuries Disablement Benefit',
      'Constant Attendance Allowance basic (full day) rate with a War Disablement Pension',
      'Armed Forces Independence Payment (AFIP)'];


    if($this->_age >= 16) $score++;
    if($this->_age <= 65 && $this->_sex == 'male') $score++;
    if($this->_age <= 63 && $this->_sex == 'female') $score++;
    if($this->_hoursCaring >= 20) $score++;

    for($i=0; $i < count($this->_benefits); $i++) {
      if (in_array($this->_benefits[$i], $qualifyingBenefits)) $score++; break;
    }

    return $score;

  }
  public function entitlementCheck() {
    $requiredScore = 4;

    if($this->benefitScore() == $requiredScore) {
      return 'yes';
    } else {
      return 'no';
    }
  }
}

?>
