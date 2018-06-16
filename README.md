# text-printer
For my use only

JS to add on the target media website :
```js
(function() {
    
    const URL = "YOUR_SERVER";
    const KEY = "song";
    
    previousSongTitle = '';
    
    setInterval(SendSongName, 3000);
    
    function SendSongName () {
        var songTitle = document.title;

        if (previousSongTitle.includes(songTitle)) return;
        
        previousSongTitle = songTitle;
        SendTitle(URL, KEY, songTitle);
    }
    
    function SendTitle(url, key, value)
    {
        var xmlHttp = new XMLHttpRequest();
        var fullUrl = url + '/?' + key + '=' + encodeURI(value);
        xmlHttp.open("GET", fullUrl, false); // false for synchronous request
        xmlHttp.send( null );
        
        console.log("Song Title sent : " + value);
    }
})();
```
