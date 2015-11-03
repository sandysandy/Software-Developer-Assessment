function Claimant(age, gender, benefit, hoursCaring) {
  this.age = age;
  this.gender = gender;
  this.benefit = benefit;
  this.hoursCaring = hoursCaring;

  this.benefitScore = function() {
    var score = 0;
    var qualifyingBenefits = [
      'Personal Independence Payment (PIP) daily living component',
      'Disability Living Allowance (DLA) - the middle or highest care rate',
      'Attendance Allowance',
      'Constant Attendance Allowance normal maximum rate with an Industrial Injuries Disablement Benefit',
      'Constant Attendance Allowance basic (full day) rate with a War Disablement Pension',
      'Armed Forces Independence Payment (AFIP)'];


    if(this.age >= 16) score++;
    if(this.age <= 65 && this.gender === 'male') score++;
    if(this.age <= 63 && this.gender === 'female') score++;
    if(this.hoursCaring >= 20) score++;

    for(i=0; i < this.benefit.length;i++) {
      if(qualifyingBenefits.indexOf(this.benefit[i]) > -1) score++; break;
    }

    return score;

  }
  this.entitlementCheck = function() {
    var requiredScore = 4;

    return (this.benefitScore() === requiredScore) ? 'yes':'no'
  }
}
