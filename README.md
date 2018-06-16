# text-printer

JS to add on the target media website :
```js
(function() {
    
    const URL = "http://YOUR_APP.com";
    const KEY = "song";
    
    previousSongTitle = "";
    
    setInterval(SendSongName, 3000);
    setInterval(Reset, 59000);
    
    function Reset () {
        previousSongTitle = "";
    }
    
    function SendSongName () {
        var songTitle = document.title;

        if (previousSongTitle.includes(songTitle)) return;
        
        previousSongTitle = songTitle;
        SendTitle(URL, KEY, songTitle);
    }
    
    function SendTitle(url, key, title)
    {
        var xmlHttp = new XMLHttpRequest();
        var fullUrl = url + '/?' + key + '=' + encodeURI(title);
        xmlHttp.open("GET", fullUrl, false);
        xmlHttp.send( null );
        
        console.log("Song Title sent : " + title);
        return xmlHttp.status == 200;
    }
})();
```
