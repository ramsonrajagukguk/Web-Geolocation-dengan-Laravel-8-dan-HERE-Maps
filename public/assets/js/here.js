if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition((position) => {
        localCoord = position.coords;

        objLocalCoord = {
            lat: localCoord.latitude,
            lng: localCoord.longitude,
        };

        let platform = new H.service.Platform({
            apikey: window.hereApiKey,
        });

        // Obtain the default map types from the platform object
        let defaultlayers = platform.createDefaultLayers();

        // Instantiate (and display) a map object:
        let map = new H.Map(
            document.getElementById("mapContainer"),
            defaultlayers.vector.normal.map,
            {
                zoom: 13,
                center: objLocalCoord,
                pixelRatio: window.devicePixelRatio || 1,
            }
        );

        window.addEventListener("resize", () => map.getViewPort().resize());

        let ui = H.ui.UI.createDefault(map, defaultlayers);
        let mapevents = new H.mapevents.Mapevents(map);
        let behavior = new H.mapevents.Behavior(mapevents);

        function addDragableMarker(map, behavior) {
            let inputlat = document.getElementById("lat");
            let inputlng = document.getElementById("lng");

            if (inputlat.value != "" && inputlng.value != "") {
                objLocalCoord = {
                    lat: inputlat.value,
                    lng: inputlng.value,
                };
            }

            let marker = new H.map.Marker(objLocalCoord, {
                volatility: true,
            });

            // marker.draggable = true;
            map.addObject(marker);
            map.setCenter(coords);

            map.addEventListener(
                "dragstart",
                function (ev) {
                    let target = ev.target,
                        pointer = ev.currentPointer;

                    if (target instanceof H.map.Marker) {
                        let targetPosition = map.geoToScreen(
                            target.getGeometry()
                        );
                        terget["offset"] = new H.math.Point(
                            pointer.viewportX - targetPosition.x,
                            pointer.viewportY - targetPosition.y
                        );
                        behavior.disable();
                    }
                },
                false
            );

            map.addEventListener(
                "drag",
                function (ev) {
                    let target = ev.target,
                        pointer = ev.currentPointer;

                    if (target instanceof H.map.Marker) {
                        terget.setGeometry(
                            map.screenToGeo(
                                pointer.viewportX - terget["offset"].x,
                                pointer.viewportY - terget["offset"].y
                            )
                        );
                    }
                },
                false
            );

            map.addEventListener(
                "dragend",
                function (ev) {
                    let target = ev.target;

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
        }
        if (window.action == "submit") {
            addDragableMarker(map, behavior);
        }
    });
} else {
    console.error("Geolocatin not support thi browser");
}
