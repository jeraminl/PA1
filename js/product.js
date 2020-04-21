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
  let re = new Request("../json/products.json", requestInit);
  fetch(re)
    .then(function(resp) {
      return resp.json();
    })
    .then(function(data) {
      console.log(data.id[productID]);
      document.getElementById("desc").innerHTML =
        "Description: " + JSON.stringify(data.id[productID].description);

      document.getElementById("productID").innerHTML =
        "Product ID: " + productID;
      document.getElementById("price").innerHTML =
        "Price: " + data.id[productID].price;
      document.getElementById("size").innerHTML =
        "Size: " + data.id[productID].size;
      document.getElementById("key").innerHTML =
        "Switch: " + data.id[productID].switch;

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
