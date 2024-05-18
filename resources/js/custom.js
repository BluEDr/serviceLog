window.validateFuelConsumptionForm = function (event) { //validation for a radio button checked in the fuel-consumption.blade
    event.preventDefault();
    console.log("innnn");
    let km = parseInt(document.forms["myForm"]["km"].value);
    let fuelAmount = parseFloat(document.forms["myForm"]["fuelAmound"].value);
    let error = 0;
    console.log(km);
    if (isNaN(km) || !Number.isInteger(km) || km < 0) {
        document.getElementById("errorMsg1").innerHTML =
            "The km field is essential, please try again.";
        error++;
    } else {
        document.getElementById("errorMsg1").innerHTML = "";
    }
    const integerPattern = /^\d{1,8}$/;
    const floatPattern = /^\d{1,8}\.\d{1,3}$/;

    if (integerPattern.test(fuelAmount) || floatPattern.test(fuelAmount)) {
        document.getElementById("errorMsg3").innerHTML = "";
    } else {
        error++;
        document.getElementById("errorMsg3").innerHTML = "Invalid number in liters!";
    }
    if (
        isNaN(fuelAmount) ||
        (!Number.isInteger(fuelAmount) && fuelAmount < 0)
    ) {
        document.getElementById("errorMsg2").innerHTML =
            "The fuel amount field is essential, please try again.";
        error++;
    } else {
        document.getElementById("errorMsg2").innerHTML = "";
    }
    if (error === 0) document.forms["myForm"].submit();
    else return false;
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
