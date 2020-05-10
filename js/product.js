function load() {
  var params = new URLSearchParams(window.location.search);
  var productID = params.get("Id");

  var requestInit = {
    method: "GET",
    headers: {
      "Content-Type": "application/json"
    },
    mode: "cors",
    cache: "default"
  };
  let re = new Request("./json/products.json", requestInit);
  fetch(re)
    .then(function(resp) {
      return resp.json();
    })
    .then(function(data) {
      console.log(data.id[productID]);
      document.getElementById("productName").innerHTML = JSON.stringify(
        data.id[productID].name
      );
      document.getElementById("desc").innerHTML =
        "Description: " + JSON.stringify(data.id[productID].description);
      document.getElementById("productID").innerHTML =
        "Product ID: " + productID;
      document.getElementById("price").innerHTML =
        "Price: $" + data.id[productID].price;
      document.getElementById("size").innerHTML =
        "Size: " + data.id[productID].size;
      document.getElementById("key").innerHTML =
        "Switch: " + data.id[productID].switch;
      document.getElementById("orderProdID").innerHTML = productID;
      document.getElementById("orderPrice").innerHTML =
        data.id[productID].price;

      var ship = document.getElementById("shipMeth");
      var shipPrice = ship.options[ship.selectedIndex].value;
      if (shipPrice == 1) {
        document.getElementById("shipPrice").innerHTML = 10;
      }

      document.getElementById("orderTotPrice").innerHTML =
        data.id[productID].price +
        parseInt(document.getElementById("shipPrice").innerHTML);

      for (var i = 0; i < 3; i++) {
        var img0 = document.createElement("img");
        img0.setAttribute("src", data.id[productID].imgPaths[i]);
        img0.className = "photo";
        img0.setAttribute("id", "img" + i);
        img0.onload = modalZoom(img0);
        console.log(img0.id);

        var cell = document.createElement("div");
        cell.className = "image-column";
        cell.appendChild(img0);

        var photos = document.getElementById("image-row");
        photos.appendChild(cell);
      }
    });
}

function modalZoom(el) {
  var modal = document.getElementById("imgModal");

  var modalImg = document.getElementById("img");
  el.onclick = function() {
    modal.style.display = "block";
    modalImg.src = el.src;
  };

  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
  };
}

function fillInfo() {
  var params = new URLSearchParams(window.location.search);
  var productID = params.get("Id");

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("productInfo").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "./php/fill_product_info.php?Id=" + productID, true);
  console.log("sending");
  xmlhttp.send();
}

function changeTax() {
  var zip = document.getElementById("zip").value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {

    if(this.readyState == 4 && this.status == 200) {
      document.getElementById("taxPrice").innerText=this.responseText;
    }
  };
  xmlhttp.open("GET", "./php/get_tax_rate.php?zip=" + zip, true);
  console.log("sending");
  xmlhttp.send();
}
