var baseurl = "http://www.billboard.com/charts/hot-100/"
var songs = [];
var lines = [];

$.ajaxSetup({async:false});

$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "scottsheet.txt",
        dataType: "text",
        success: function(data) {processData(data);}
     });
});

jQuery.ajaxPrefilter(function(options) {
    if (options.crossDomain && jQuery.support.cors) {
        options.url = 'http://jfktesting.no-ip.ca:8080/' + options.url;
    }
});

function processData(allText) {
    var allTextLines = allText.split(/\r\n|\n/);
    var headers = allTextLines[0].split(',');
    var lines = [];

    for (var i=1; i<allTextLines.length; i++) {
        var data = allTextLines[i].split(',');
        if (data.length == headers.length) {

            var tarr = new Object();
            for (var j=0; j<headers.length; j++) {
                tarr[headers[j]]=data[j];
            }                             
            songs.push(tarr);
        }
    }    
}


function getLyrics(){
    for (j=0; j<songs.length; j++){
        var lyricsURL="https://makeitpersonal.co/lyrics?artist="+encodeURI(songs[j].Artist)+"&title="+encodeURI(songs[j].Title);        
        $.get(
                lyricsURL,
                function (response) {
                $('#dumping-ground').append('<div class="lyrics">'+response+'</div>');
        });        
    }       
}


function maketable(){    
    $('.lyrics').each(function(index){
       songs[index].Lyrics=$(this).contents().text();        
    }); 
    
    for (i = 0; i < songs.length; i++) {                 
        var markup = '<tr>' +
            '<td>' + songs[i]['Title'] + '</td>' +
            '<td>' + songs[i]['Artist'] + '</td>' +
            '<td>' + songs[i]['First Charted'] + '</td>' +
            '<td>' + songs[i]['Top position'] + '</td>' +
            '<td>' + songs[i]['Weeks on chart'] + '</td>' +
            '<td>' + songs[i]['Lyrics'] + '</td>' +
            '</tr>';
        $("#all-songs tbody").append(markup);
    }
}

$(function() {        
    getLyrics();
    maketable();
});






    





