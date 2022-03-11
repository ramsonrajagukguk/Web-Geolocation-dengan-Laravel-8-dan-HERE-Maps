if (navigator.geolocation) {
    //jika navigator tersedia
    navigator.geolocation.getCurrentPosition(showPosition, showError);
} else {
    //jika navigator tidak tersedia
    console.log("Geolocation is not supported by this device");
}

//jika location allowed
function showPosition(position) {
    localCoord = position.coords;
    objLocalCoord = {
        lat: localCoord.latitude,
        lng: localCoord.longitude,
    };

    let platform = new H.service.Platform({
        apikey: "QymcgCMbysQyyAzi3rTMINJy_hBU6wi_rh88B_tq02w",
    });
    let defaultLayers = platform.createDefaultLayers();
    let map = new H.Map(
        document.getElementById("mapContainer"),
        defaultLayers.vector.normal.map,
        {
            center: objLocalCoord,
            zoom: 13,
            pixelRatio: window.devicePixelRatio || 1,
        }
    );

    window.addEventListener("resize", () => map.getViewPort().resize());
    let behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
    let ui = H.ui.UI.createDefault(map, defaultLayers);

    function addDraggableMarker(map, behavior) {
        let inputlat = document.getElementById("lat");
        let inputlng = document.getElementById("lng");

        if (inputlat.value != "" && inputlng.value != "") {
            objLocalCoord = {
                lat: inputlat.value,
                lng: inputlng.value,
            };
        }

        var marker = new H.map.Marker(objLocalCoord, {
            // mark the object as volatile for the smooth dragging
            volatility: true,
        });
        // Ensure that the marker can receive drag events
        marker.draggable = true;
        map.addObject(marker);

        // disable the default draggability of the underlying map
        // and calculate the offset between mouse and target's position
        // when starting to drag a marker object:
        map.addEventListener(
            "dragstart",
            function (ev) {
                var target = ev.target,
                    pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                    var targetPosition = map.geoToScreen(target.getGeometry());
                    target["offset"] = new H.math.Point(
                        pointer.viewportX - targetPosition.x,
                        pointer.viewportY - targetPosition.y
                    );
                    behavior.disable();
                }
            },
            false
        );

        // re-enable the default draggability of the underlying map
        // when dragging has completed
        map.addEventListener(
            "dragend",
            function (ev) {
                var target = ev.target;
                if (target instanceof H.map.Marker) {
                    behavior.enable();

                    let resultCoord = map.screenToGeo(
                        ev.currentPointer.viewportX,
                        ev.currentPointer.viewportY
                    );

                    inputlat.value = resultCoord.lat;
                    inputlng.value = resultCoord.lng;
                }
            },
            false
        );

        // Listen to the drag event and move the position of the marker
        // as necessary
        map.addEventListener(
            "drag",
            function (ev) {
                var target = ev.target,
                    pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                    target.setGeometry(
                        map.screenToGeo(
                            pointer.viewportX - target["offset"].x,
                            pointer.viewportY - target["offset"].y
                        )
                    );
                }
            },
            false
        );
    }

    if ((window.action = "submit")) {
        addDraggableMarker(map, behavior);
    }

    // Browse location codespace
    let spaces = [];
    const fetchSpaces = function (latitude, longitude, radius) {
        return new Promise(function (resolve, reject) {
            resolve(
                fetch(
                    `/api/spaces?lat=${latitude}&lng=${longitude}&rad=${radius}`
                )
                    .then((res) => res.json())
                    .then(function (data) {
                        data.forEach(function (value, index) {
                            let marker = new H.map.Marker({
                                lat: value.latitude,
                                lng: value.longitude,
                            });
                            spaces.push(marker);
                        });
                    })
            );
        });
    };

    function clearSpace() {
        map.removeObjects(spaces);
        spaces = [];
    }

    function init(latitude, longitude, radius) {
        clearSpace();
        fetchSpaces(latitude, longitude, radius).then(function () {
            map.addObjects(spaces);
        });
    }

    if (window.action == "browse") {
        map.addEventListener(
            "dragend",
            function (ev) {
                let resultCoord = map.screenToGeo(
                    ev.currentPointer.viewportX,
                    ev.currentPointer.viewportY
                );
                init(resultCoord.lat, resultCoord.lng, 40);
            },
            false
        );

        init(objLocalCoord.lat, objLocalCoord.lng, 40);
    }

    // Route to space
    let urlParams = new URLSearchParams(window.location.search);
}

//jika location disabled atau not allowed
function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            console.log("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            console.log("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            console.log("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            console.log("An unknown error occurred.");
            break;
    }
}
