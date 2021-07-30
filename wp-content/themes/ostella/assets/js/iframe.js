function setIframeSource() {
    // fonction JS sur le select, permettant de récupérer les Url de 4 iframes via la méthode POST
    var theSelect = document.getElementById('map-select');
    var theIframe = document.getElementById('Iframe-maps');
    var theUrl;
    theUrl = theSelect.options[theSelect.selectedIndex].value;
    theIframe.src = theUrl;
}