
window.onload = init;

function init() {
    const map = new ol.Map({
        view: new ol.View({
            center: [11774399.77267, 1122291.31705],
            zoom: 18,
        }),
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM(),
            })
        ],
        target: 'map'
    });
    
}