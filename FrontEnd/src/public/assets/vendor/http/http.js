function httpRequest(url, type, data=null, synchronous=true, callback=null)
{
    let xmlHttp = new XMLHttpRequest();
    xmlHttp.open( type, url, synchronous ); // false for synchronous request

    if (!synchronous){
        xmlHttp.onreadystatechange = function() {
            if (this.readyState !== 4) return;
            callback(this)
        }
    }

    xmlHttp.send(data);
}
