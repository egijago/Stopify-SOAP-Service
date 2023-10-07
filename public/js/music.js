document.addEventListener('DOMContentLoaded', async function () {
    try {
        const xhr = new XMLHttpRequest();
        var currentUrl = window.location.href;
        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");
        console.log('awalll',idValue);
        xhr.open('GET', 'api/musics/detail/'+idValue, true);

    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    fillSong(data.data);
                } else {
                    console.error('HTTP error! Status: ', xhr.status);
                }
            }
        };
    
        xhr.send();
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }

    var cek=checkLike();
    console.log(cek);

    
});

function checkLike(){
    try {
        const xhr = new XMLHttpRequest();
        var currentUrl = window.location.href;
        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");

        var idUser=document.getElementById("id_user").value;
        console.log(idValue);
        var apiurl='/api/users/'+idUser+'/likes/'+idValue;
        console.log(apiurl)
        xhr.open('GET', '/api/users/'+idUser+'/likes/'+idValue, true);

    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    console.log(data.data)
                    if(data.data.length==0){
                        console.log("null")
                        document.getElementById('unlikeButton').disabled = true;
                    }
                    else{
                        console.log("not null")
                        document.getElementById('likeButton').disabled = true;
                    }
                } else {
                    console.error('HTTP error! Status: ', xhr.status);
                }
            }
        };
    
        xhr.send();
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }
    return true;
}
function fillSong(song) {
    document.querySelector('.play-song-container').innerHTML = songDetail(song.image_url, song.album_title, song.music_title, song.genre_name, song.artist_name);

    document.querySelector('.audio-player').innerHTML= songPlayer(song.audio_url);
}

function songDetail(img_url, album, title, genre, artist) {
    return `
        <img src="${img_url}" alt="">
        <div class="play-song-detail">
            <h3>${album}</h3>
            <h4>${title}</h4>
            <br>
            <p>${genre}</p>
            <p>${artist}</p>
            <button class="love-button" id="likeButton" onclick="handleLoveButtonClick()">like ❤️</button>
            <button class="love-button" id="unlikeButton" onclick="handleUnloveButtonClick()">unlike ❤️</button>
        </div>
    `;
}

function songPlayer(audio_url){
    return `
    <audio controls>
        <source src="public/song/${audio_url}" type="audio/mpeg">
    </audio>
    `
}
function handleLoveButtonClick() {
    // Implement the logic for handling the love button click here
    alert('like button clicked!');
    try {
        const xhr = new XMLHttpRequest();
        var currentUrl = window.location.href;

        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");

        var idUser=document.getElementById("id_user").value;

        xhr.open('POST', '/api/users/'+idUser+'/likes/'+idValue, true);
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    document.getElementById('unlikeButton').disabled = false;
                    document.getElementById('likeButton').disabled = true;
                } else {
                    console.error('HTTP error! Status: ', xhr.status);
                }
            }
        };
    
        xhr.send();
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }
}

function handleUnloveButtonClick() {
    // Implement the logic for handling the love button click here
    alert('unlike button clicked!');
    try {
        document.getElementById('unlikeButton').disabled = true;
        const xhr = new XMLHttpRequest();
        var currentUrl = window.location.href;

        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");

        var idUser=document.getElementById("id_user").value;

        xhr.open('DELETE', '/api/users/'+idUser+'/likes/'+idValue, true);
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    document.getElementById('unlikeButton').disabled = true;
                    document.getElementById('likeButton').disabled = false;
                } else {
                    console.error('HTTP error! Status: ', xhr.status);
                }
            }
        };
    
        xhr.send();
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }
}