$(function () {

    /*FURNITURE*/
    $("#f").hide();

    $("#f-Btn").on("mouseenter", function () {
        $("#f").slideDown(500);
    })

    $("#f").on("mouseleave", function () {
        $("#f").slideUp(300);
    })

    /*HOME OFFICE*/
    $("#h").hide();

    $("#h-Btn").on("mouseenter", function () {
        $("#h").slideDown(500);
    })

    $("#h").on("mouseleave", function () {
        $("#h").slideUp(300);
    })

    /*BEDS*/
    $("#b").hide();

    $("#b-Btn").on("mouseenter", function () {
        $("#b").slideDown(500);
    })

    $("#b").on("mouseleave", function () {
        $("#b").slideUp(300);
    })

    /*BATHROOM*/
    $("#br").hide();

    $("#br-Btn").on("mouseenter", function () {
        $("#br").slideDown(500);
    })

    $("#br").on("mouseleave", function () {
        $("#br").slideUp(300);
    })

}
);



function login() {
    //InsertSignOut after User 
    function insertLogOut(referenceNode, newNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    //Create new <a> and <btn> tag with content
    var newAtag = document.createElement("a");
    newAtag.id = "log-out";

    var newBtn = document.createElement("button");
    newBtn.id = "logOut-Btn";
    newBtn.type = "button";
    var newBtnContent = document.createTextNode("Logout");


    newBtn.appendChild(newBtnContent);
    newAtag.appendChild(newBtn);

    var loginAtag = document.getElementById("login");

    var signout = insertLogOut(loginAtag, newAtag);
    return signout;

}

function openNav() {
    document.getElementById("shopping-cart").style.width = "350px";
    document.getElementById("s-cart").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("shopping-cart").style.width = "0";
    document.getElementById("s-cart").style.marginLeft = "10px";
}


function loginReload() {
    $.ajax({
        method: "POST",
        url: "php/signUpLogin/reloadLogin.php",
        success: function (response) {
            let res = JSON.parse(response);
            document.getElementById("login").setAttribute("href", "#!");
            document.getElementById("login-Btn").innerHTML = res.user;
            login();
            document.getElementById("log-out").setAttribute("href", "#!logOut");

        },
        error: function () {
            console.log("loginReload Failed or user not Logged in");
        },
    });
};

function initMap(userLat, userLong, storeLat, storeLong) {
    console.log("trying");
    var location = { lat: storeLat, lng: storeLong };
    var location2 = { lat: userLat, lng: userLong };

    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: location,
    });

    console.log(document.getElementById("map"));

    var marker = new google.maps.Marker({ position: location, map: map });
    var infoWindow = new google.maps.InfoWindow({
        content: "???",
    });
    marker.addListener("click", function () {
        infoWindow.open(map, marker);
    });

    var marker2 = new google.maps.Marker({ position: location2, map: map });
    var infoWindow2 = new google.maps.InfoWindow({
        content: "he",
    });
    marker2.addListener("click", function () {
        infoWindow2.open(map, marker2);
    });

    // var start = new google.maps.LatLng(storeLat, storeLong);
    // var end = new google.maps.LatLng(userLat, userLong);

    // var display = new google.maps.DirectionsRenderer();
    // var services = new google.maps.DirectionsService();
    // display.setMap(map);
    // var request = {
    //     origin: start,
    //     destination: end,
    //     travelMode: 'DRIVING'
    // };
    // services.route(request, function (result, status) {
    //     if (status == 'OK') {
    //         display.setDirections(result);
    //     }
    // });
}

window.onload = loginReload();