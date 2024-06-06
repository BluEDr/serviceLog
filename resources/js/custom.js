document.addEventListener('DOMContentLoaded',function(){
    console.log('the custom.js loaded after DOM');
    // dokimi();
    // jsFuelConsumption(69);
});

console.log("mplamplaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

function jsFuelConsumption(a) {
    console.log("assssssssssssssssssssssssssssssssss" + a);
    document.getElementById('fCunsumption').innerHTML = a;
}
console.log('custom.js loaded');
window.validateFuelConsumptionForm = function (event) { //validation for a radio button checked in the fuel-consumption.blade
    event.preventDefault();
    console.log("innnn");
    let km = document.forms["myForm"]["km"].value;
    let fuelAmount = document.forms["myForm"]["fuelAmound"].value;
    let error = 0;
    
    const integerPattern = /^\d{1,8}$/;
    const floatPattern = /^\d{1,5}\.\d{1,3}$/;

    //Validate km
    if (isNaN(km) || !integerPattern.test(km.toString()) || km < 0) {
        document.getElementById("errorMsg1").innerHTML =
            "The km field is essential, please try again.";
        error++;
    } else {
        document.getElementById("errorMsg1").innerHTML = "";
    }

    
    // Validate fuelAmount
    if (typeof fuelAmount === 'string' && (integerPattern.test(fuelAmount) || floatPattern.test(fuelAmount))) {
        document.getElementById("errorMsg3").innerHTML = "";
    } else {
        error++;
        document.getElementById("errorMsg3").innerHTML = "Invalid number in liters!";
    }

    const fuelAmountNumber = parseFloat(fuelAmount);

    if (isNaN(parseFloat(fuelAmount)) || parseFloat(fuelAmount < 0) || fuelAmountNumber > 99999.999) {
        document.getElementById("errorMsg2").innerHTML =
            "The fuel amount field is essential, please try again.";
        error++;
    } else {
        document.getElementById("errorMsg2").innerHTML = "";
    }

    document.getElementById('errorMsgNeedGraterKmValue').innerHTML = "";
    if (error === 0) 
        document.forms["myForm"].submit();
    else 
        return false;
};


document.getElementById("startNewCalculationYes").addEventListener("change", function () { //validation for a radio button checked in the fuel-consumption.blade
        if (this.checked) {
            let radioTrue = (document.getElementById(
                "isFullTrue"
            ).checked = true);
            let radioFalse = (document.getElementById(
                "isFullFalse"
            ).checked = false);
            radioTrue = document.getElementById("isFullTrue").disabled = true;
            radioFalse = document.getElementById("isFullFalse").disabled = true;
        }
    });

document.getElementById("startNewCalculationNo").addEventListener("change", function () { //validation for a radio button checked in the fuel-consumption.blade
    if (this.checked) {
        let radioTrue = (document.getElementById(
            "isFullTrue"
        ).disabled = false);
        let radioFalse = (document.getElementById(
            "isFullFalse"
        ).disabled = false);
    }
});


