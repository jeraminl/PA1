function sameAddress() {
  var yourAddress = document.getElementById("address").value;
  var yourCity = document.getElementById("city").value;
  var yourState = document.getElementById("state").value;
  var yourZip = document.getElementById("zip").value;

  document.getElementById("billingAddress").value = yourAddress;
  document.getElementById("billingCity").value = yourCity;
  document.getElementById("billingState").value = yourState;
  document.getElementById("billingZip").value = yourZip;
}

function validate() {
  if (window.confirm('Click "OK" to confirm your order!')) {
    var yourFirstName = document.getElementById("firstName").value;
    var yourLastName = document.getElementById("lastName").value;
    var yourEmail = document.getElementById("email").value;
    var yourAddress = document.getElementById("address").value;
    var yourCity = document.getElementById("city").value;
    var yourState = document.getElementById("state").value;
    var yourZip = document.getElementById("zip").value;

    var billFirstName = document.getElementById("billingFirstName").value;
    var billLastName = document.getElementById("billingLastName").value;
    var billAddress = document.getElementById("billingAddress").value;
    var billCity = document.getElementById("billingCity").value;
    var billState = document.getElementById("billingState").value;
    var billZip = document.getElementById("billingZip").value;

    var productID = document.getElementById("productID").innerHTML;
    var productPrice = document.getElementById("orderPrice").innerHTML;
    var amount = document.getElementById("units").value;
    var shippingMethod = document.getElementById("shipMeth").value;
    var shipPrice = document.getElementById("shipPrice").innerHTML;
    var totalPrice = document.getElementById("orderTotPrice").innerHTML;

    var orderNumber = Math.floor(Math.random() * 100000) + 1;

    window.open(
      "mailto:" +
        encodeURIComponent(yourEmail) +
        "?subject=Order%20Confirmation%20#" +
        encodeURIComponent(orderNumber) +
        "&body=Order%20Details" +
        "%0d%0aName: " +
        encodeURIComponent(yourFirstName) +
        "%20" +
        encodeURIComponent(yourLastName) +
        "%0d%0aEmail Address: " +
        encodeURIComponent(yourEmail) +
        "%0d%0aAddress: " +
        encodeURIComponent(yourAddress) +
        "%0d%0aCity: " +
        encodeURIComponent(yourCity) +
        "%0d%0aState: " +
        encodeURIComponent(yourState) +
        "%0d%0aZip: " +
        encodeURIComponent(yourZip) +
        "%0d%0aBilling" +
        "%0d%0aName: " +
        encodeURIComponent(billFirstName) +
        "%20" +
        encodeURIComponent(billLastName) +
        "%0d%0aAddress: " +
        encodeURIComponent(billAddress) +
        "%0d%0aCity: " +
        encodeURIComponent(billCity) +
        "%0d%0aState: " +
        encodeURIComponent(billState) +
        "%0d%0aZip: " +
        encodeURIComponent(billZip) +
        "%0d%0a " +
        encodeURIComponent(productID) +
        "%0d%0aUnit Price: " +
        encodeURIComponent(productPrice) +
        "%0d%0aShipping: " +
        encodeURIComponent(shippingMethod) +
        "%0d%0aAmount: " +
        encodeURIComponent(amount) +
        "%0d%0aShipping Price: " +
        encodeURIComponent(shipPrice) +
        "%0d%0aTotal Price: " +
        encodeURIComponent(totalPrice)
    );
  }
  return false;
}

function newShip() {
  var ship = document.getElementById("shipMeth");
  var shipPrice = ship.options[ship.selectedIndex].value;

  if (shipPrice == 1) {
    document.getElementById("shipPrice").innerHTML = 10;
  } else if (shipPrice == 2) {
    document.getElementById("shipPrice").innerHTML = 5;
  } else {
    document.getElementById("shipPrice").innerHTML = 0;
  }

  var units = document.getElementById("units");
  var newUnits = units.options[units.selectedIndex].value;

  var tax = document.getElementById("taxPrice");
  var newTax = tax.options[tax.selectedIndex].value

  if (newTax == "") {
    newTax = 0;
  }
  console.log('here');
  document.getElementById("orderTotPrice").innerHTML = (
    parseFloat(document.getElementById("orderPrice").innerHTML) *
      parseFloat(newUnits) +  parseFloat(document.getElementById("orderPrice").innerHTML) *
      parseFloat(newUnits) * parseFloat(newTax) +
      parseFloat(document.getElementById("shipPrice").innerHTML)
  ).toFixed(2);
}

function difUnits() {
  console.log('here');
  var oldUnits = document.getElementById("units");
  var newUnits = oldUnits.options[oldUnits.selectedIndex].value;

  var tax = document.getElementById("taxPrice");
  var newTax = tax.options[tax.selectedIndex].value

  if (newTax == "") { // if tax rate is empty ( i.e. user has not yet input zipcode, tax rate will be 0 )
    newTax = 0;
  }
  console.log(parseFloat(document.getElementById("orderPrice").innerHTML) *
    parseFloat(newUnits) + parseFloat(document.getElementById("orderPrice").innerHTML) *
    parseFloat(newUnits) * parseFloat(newTax) +
    parseFloat(document.getElementById("shipPrice").innerHTML));


  document.getElementById("orderTotPrice").innerHTML = (
    parseFloat(document.getElementById("orderPrice").innerHTML) *
      parseFloat(newUnits) + parseFloat(document.getElementById("orderPrice").innerHTML) *
      parseFloat(newUnits) * parseFloat(newTax) +
      parseFloat(document.getElementById("shipPrice").innerHTML)
  ).toFixed(2);
}
