
function load(){
  var params = new URLSearchParams(window.location.search);
  var productID = params.get('Id');


  var requestInit = {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json'
    },
    mode: 'cors',
    cache: 'default' };
  let re = new Request("../json/products.json", requestInit);
  fetch(re)
    .then(function(resp){
      return resp.json();
    })
    .then(function(data) {
      console.log(data.id[productID]);
      document.getElementById("desc").innerHTML =
        JSON.stringify(data.id[productID].description);


    });
}









