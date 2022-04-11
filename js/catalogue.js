window.addEventListener(
  "hashchange",
  function () {
    console.log("The hash has changed!");
  },
  false
);

function addEvent(element, event, delegate) {
  if (typeof window.event != "undefined" && element.attachEvent)
    element.attachEvent("on" + event, delegate);
  else element.addEventListener(event, delegate, false);
}

addEvent(document, "readystatechange", function () {
  if (document.readyState !== "complete") return true;

  window.addEventListener("hashchange", function () {
    setTimeout(function () {
      var items = document.querySelectorAll("section.products ul li");
      var cart = document.querySelectorAll("#cart ul")[0];

      function updateCart() {
        var total = 0.0;
        var cart_items = document.querySelectorAll("#cart ul li");

        for (var i = 0; i < cart_items.length; i++) {
          var cart_item = cart_items[i];
          var quantity = cart_item.getAttribute("data-quantity");
          var price = cart_item.getAttribute("data-price");

          var sub_total = quantity * price;
          cart_item.querySelectorAll("span.sub-total")[0].innerHTML =
            " = " + sub_total.toFixed(2);

          total += sub_total;
        }

        document.querySelectorAll("#cart span.total")[0].innerHTML =
          "Total: $" + total;
      }

      // This function is only called when adding 1 item, otherwise updateCartItem(item) is called
      function addCartItem(item, id) {
        var original = document.querySelectorAll(
          "#products ul li[id='" + id + "'] input"
        ); /** Take the <input> from product li with specific id **/
        original[0].setAttribute(
          "data-id",
          id
        ); /* give <input> a data id (the id is the same id as the li id) */
        original[0].setAttribute("value", 1); /* give <input> a value of 1*/

        /*---------------------------------------------*/

        var clone = item.cloneNode(true);
        clone.setAttribute("data-id", id); //sets a data-id to the item
        clone.setAttribute("data-quantity", 1); //sets a data-quantity to the i
        clone.setAttribute("class", "items");
        clone.removeAttribute("id"); //removes original id, since it's a clone, and has to be unique

        var fragment = document.createElement("span"); //create span
        fragment.setAttribute("class", "quantity"); // adds the quantity class to span
        fragment.innerHTML = " x 1"; // inputs the content x 1 into span
        clone.appendChild(fragment); // appends <span> to <li>

        fragment = document.createElement("span"); //create another span
        fragment.setAttribute("class", "sub-total"); //set the sub-total class to span
        clone.appendChild(fragment); //append <span> to <li>, this span will go after the next span
        cart.appendChild(clone); //append the whole <li> tag includign all the <spans> into cart ul
      }

      function updateCartItem(item, original) {
        var quantity = item.getAttribute("data-quantity"); //gets the data-quantity value from the item <li>
        quantity = parseInt(quantity) + 1; // adds 1 to the quantity
        item.setAttribute("data-quantity", quantity); //sets the data-quantity to the new quantity

        var original_quantity = original.getAttribute("value");
        original.setAttribute("value", quantity); /** ADDED This myself **/

        var span = item.querySelectorAll("span.quantity"); //returns NodeList[] of span
        span[0].innerHTML = " x " + quantity;
      }

      function onDrop(event) {
        if (event.preventDefault) event.preventDefault();
        if (event.stopPropagation) event.stopPropagation();
        else event.cancelBubble = true;

        var id = event.dataTransfer.getData("Text"); //extracts value of id, which is chair-1
        var item = document.getElementById(id); // takes the id value, and returns the whole item list <li> ... </li>

        var exists = document.querySelectorAll(
          "#cart ul li[data-id='" + id + "']"
        );
        var original = document.querySelectorAll(
          "#cart ul li input[data-id='" + id + "']"
        ); /**ADDED THIS myself **/

        if (exists.length > 0) {
          updateCartItem(exists[0], original[0]);
        } else {
          console.log(item, id);
          addCartItem(item, id);
        }

        updateCart();

        return false;
      }

      function onDragOver(event) {
        if (event.preventDefault) event.preventDefault();
        if (event.stopPropagation) event.stopPropagation();
        else event.cancelBubble = true;
        return false;
      }

      addEvent(cart, "drop", onDrop);
      addEvent(cart, "dragover", onDragOver);

      function onDrag(event) {
        event.dataTransfer.effectAllowed = "move";
        event.dataTransfer.dropEffect = "move";
        var target = event.target || event.srcElement;
        var success = event.dataTransfer.setData("Text", target.id);
      }

      for (var i = 0; i < items.length; i++) {
        var item = items[i];
        console.log(item);
        item.setAttribute("draggable", "true");
        addEvent(item, "dragstart", onDrag);
      }
    }, 50);
  });
});
