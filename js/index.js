function loadProduct(id){
  window.location.href = "product.html?Id="+id;
}


function load(){
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
      var amount = Object.keys(data.id).length;
      console.log(amount);
      for (var i = 0; i < amount; i++){
        console.log(data.id[i]);

        var img = document.createElement("img");
        img.setAttribute("src","img/no-image.png");

        var p = document.createElement("p");
        p.appendChild(document.createTextNode(data.id[i].price));

        var link = document.createElement("A");
        link.setAttribute("href","product.html?Id="+i);
        link.setAttribute("name", JSON.stringify(data.id[i].name));
        link.appendChild(document.createTextNode(data.id[i].name.toUpperCase()));
        link.appendChild(img);


        var cell = document.createElement("div");
        cell.setAttribute("class","grid-item");
        cell.appendChild(link);
        cell.appendChild(p);


        document.getElementById("productList").appendChild(cell);

      };







    });
}
