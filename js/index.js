function loadProduct(id) {
  window.location.href = "product.html?Id=" + id;
}

function load() {
  var requestInit = {
    method: "GET",
    headers: {
      "Content-Type": "application/json"
    },
    mode: "cors",
    cache: "default"
  };
  let re = new Request("../json/products.json", requestInit);
  fetch(re)
    .then(function(resp) {
      return resp.json();
    })
    .then(function(data) {
      var amount = Object.keys(data.id).length;
      for (var i = 0; i < amount; i++) {
        if (data.id[i].category == "Office") {
          var img = document.createElement("img");
          img.setAttribute("src", "img/" + i + "/0.jpg");
          img.setAttribute("class", "photo");

          var imgCell = document.createElement("div");
          imgCell.setAttribute("class", "grid-img");

          imgCell.appendChild(img);

          var p = document.createElement("p");
          p.appendChild(document.createTextNode("$" + data.id[i].price));

          var link = document.createElement("a");
          link.setAttribute("href", "product.html?Id=" + i);
          link.setAttribute("name", JSON.stringify(data.id[i].name));
          link.setAttribute("style", "color:black; text-decoration: none;");
          link.appendChild(
            document.createTextNode(data.id[i].name.toUpperCase())
          );
          link.appendChild(imgCell);
          link.appendChild(p);

          var cell = document.createElement("div");
          cell.setAttribute("class", "grid-item");
          cell.appendChild(link);

          document.getElementById("productListOffice").appendChild(cell);
        } else if (data.id[i].category == "Gaming") {
          var img = document.createElement("img");
          img.setAttribute("src", "img/" + i + "/0.jpg");
          img.setAttribute("class", "photo");

          var imgCell = document.createElement("div");
          imgCell.setAttribute("class", "grid-img");

          imgCell.appendChild(img);

          var p = document.createElement("p");
          p.appendChild(document.createTextNode("$" + data.id[i].price));

          var link = document.createElement("a");
          link.setAttribute("href", "product.html?Id=" + i);
          link.setAttribute("name", JSON.stringify(data.id[i].name));
          link.setAttribute("style", "color:black; text-decoration: none;");
          link.appendChild(
            document.createTextNode(data.id[i].name.toUpperCase())
          );
          link.appendChild(imgCell);
          link.appendChild(p);

          var cell = document.createElement("div");
          cell.setAttribute("class", "grid-item");
          cell.appendChild(link);

          document.getElementById("productListGaming").appendChild(cell);
        } else if (data.id[i].category == "Professional") {
          var img = document.createElement("img");
          img.setAttribute("src", "img/" + i + "/0.jpg");
          img.setAttribute("class", "photo");

          var imgCell = document.createElement("div");
          imgCell.setAttribute("class", "grid-img");

          imgCell.appendChild(img);

          var p = document.createElement("p");
          p.appendChild(document.createTextNode("$" + data.id[i].price));

          var link = document.createElement("a");
          link.setAttribute("href", "product.html?Id=" + i);
          link.setAttribute("name", JSON.stringify(data.id[i].name));
          link.setAttribute("style", "color:black; text-decoration: none;");
          link.appendChild(
            document.createTextNode(data.id[i].name.toUpperCase())
          );
          link.appendChild(imgCell);
          link.appendChild(p);

          var cell = document.createElement("div");
          cell.setAttribute("class", "grid-item");
          cell.appendChild(link);

          document.getElementById("productListProfessional").appendChild(cell);
        }
      }
    });
}
