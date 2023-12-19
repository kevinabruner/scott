var baseurl = "http://www.billboard.com/charts/hot-100/"
var year = 1958;
var month = 08;
var day = 09;
var songs = [];
var workingDate = new Date(year, month-1, day);
var endDate = new Date();


jQuery.ajaxPrefilter(function(options) {
    if (options.crossDomain && jQuery.support.cors) {
        options.url = 'http://jfktesting.no-ip.ca:8080/' + options.url;
    }
});


function getSongs(){
    console.log(workingDate);
    console.log(endDate);
    while (workingDate < endDate){        
        var curURL = baseurl + 
                    workingDate.getFullYear() + '-' + 
                    ('0'+(workingDate.getMonth()+1)).slice(-2) + '-' + 
                    ('0'+workingDate.getDate()).slice(-2);
        console.log(workingDate);
        $.get(
            curURL,
            function (response) {        
                $("#dumping-ground").html(                
                    $(response).find('.chart-row').each(function(index){                 
                        var newSong = new Object();                    
                        var newTitle = $(this).find('.chart-row__song').contents().text();
                        var newArtist = $(this).find('.chart-row__artist').contents().text();   
                        var newDate =  $(this).parent().parent().attr('data-chartdate');
                        var newPos =  $(this).find('.chart-row__value').contents().text();   
                                                                        
                        newSong.songTitle = newTitle;
                        newSong.artist = newArtist;            
                        newSong.date = newDate;
                        newSong.pos = index+1;
                        newSong.titleArtist = newTitle + newArtist;
                        
                        var songIndex = findWithAttr(songs, 'titleArtist', newSong.titleArtist)                                                
                        
                        if (songIndex == -1){
                            newSong.weeksOn = 1;
                            songs.push(newSong);                          
                        }
                        else{
                            songs[songIndex].weeksOn++;
                            if (newSong.pos < songs[songIndex].pos) songs[songIndex].pos = newSong.pos;
                        }
                        
                    }));                
        });
        workingDate.setDate(workingDate.getDate()+7);    
    }    
}


function findWithAttr(array, attr, value) {
    for(var i = 0; i < array.length; i += 1) {
        if(array[i][attr] === value) {
            return i;
        }
    }
    return -1;
}
  



function maketable(){        
    for (i = 0; i < songs.length; i++) {         
        
        var markup = '<tr>' +
            '<td>' + songs[i].songTitle + '</td>' +
            '<td>' + songs[i].artist + '</td>' +
            '<td>' + songs[i].date + '</td>' +
            '<td>' + songs[i].pos + '</td>' +
            '<td>' + songs[i].weeksOn + '</td>' +
            '</tr>';
        $("#all-songs tbody").append(markup);
    }
}

$(function() {
    getSongs(); 
    
});






    





