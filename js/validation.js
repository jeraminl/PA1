function sameAddress(){
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

    var billFirstName =  document.getElementById("billingFirstName").value;
    var billLastName = document.getElementById("billingLastName").value;
    var billAddress = document.getElementById("billingAddress").value;
    var billCity = document.getElementById("billingCity").value;
    var billState = document.getElementById("billingState").value;
    var billZip = document.getElementById("billingZip").value;
    var amount = document.getElementById("units").value;



    var orderNumber = Math.floor(Math.random() * 100000) + 1;






    window.open("mailto:" +

      encodeURIComponent(yourEmail) +
      "?subject=Order%20Confirmation%20#" +
      encodeURIComponent(orderNumber) +
      "&body=Order%20Details" +
      "%0d%0aName: " + encodeURIComponent(yourFirstName) + "%20" + encodeURIComponent(yourLastName) +
      "%0d%0aEmail Address: " + encodeURIComponent(yourEmail) +
      "%0d%0aAddress: " + encodeURIComponent(yourAddress) +
      "%0d%0aCity: " + encodeURIComponent(yourCity) +
      "%0d%0aState: " + encodeURIComponent(yourState) +
      "%0d%0aZip: " + encodeURIComponent(yourZip)+
      "%0d%0aBilling" +
      "%0d%0aName: " + encodeURIComponent(billFirstName) + "%20" + encodeURIComponent(billLastName) +
      "%0d%0aAddress: " + encodeURIComponent(billAddress) +
      "%0d%0aCity: " + encodeURIComponent(billCity) +
      "%0d%0aState: " + encodeURIComponent(billState) +
      "%0d%0aZip: " + encodeURIComponent(billZip),
      '_blank',
      'location=yes,height=570,width=520'
    );

  }
}
