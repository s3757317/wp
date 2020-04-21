var prices = {
    p1: 18.5,
    p2: 15.5,
};

function plus(whichID) {
    console.log('plus button click');
    var whichQty = document.getElementById(whichID + "-qty");
    var whichSubtotal = document.getElementById(whichID + "-subtotal");
    whichQty.value = Number(whichQty.value) + 1;
    var price = whichQty.value * 3;
    console.log(whichQty.getAttribute("name") + ' quantity is: ' + whichQty.value);
    console.log(whichSubtotal.getAttribute("name") + ' is: $' + price);
    whichSubtotal.innerHTML = "Total: $" + price.toFixed(2);
}
function minus(whichID) {
    console.log('minus buttonclick');
    var whichQty = document.getElementById(whichID + "-qty");
    var whichSubtotal = document.getElementById(whichID + "-subtotal");
    if (whichQty.value > 0) {
        console.log("if (whichQty.value > 0)");
        whichQty.value = Number(whichQty.value) - 1;
    }
    var price = whichQty.value * 3;
    console.log(whichQty.getAttribute("name") + ' quantity is: ' + whichQty.value);
    console.log(whichSubtotal.getAttribute("name") + ' is: $' + price);
    whichSubtotal.innerHTML = "Total: $" + price.toFixed(2);
}

function updateQuantity(whichID) {
    console.log('Update Quantity function');
    var whichQty = document.getElementById(whichID + "-qty");
    var whichSubtotal = document.getElementById(whichID + "-subtotal");
    var re = new RegExp("^[0-9]$+");
    if (!re.test(whichQty.value)) {
        alert("Wrong quantity (must be number)");
        return;
    }
    var price = whichQty.value * price[whichID];
    console.log(whichQty.getAttribute("name") + ' quantity is: ' + whichQty.value);
    console.log(whichSubtotal.getAttribute("name") + ' is: $' + price);
    whichQty.innerHTML = "Total: $" + price.toFixed(2);
}