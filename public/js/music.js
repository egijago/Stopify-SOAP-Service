document.addEventListener('DOMContentLoaded', async function () {
    try {
        const xhr = new XMLHttpRequest();
        const id_music = document.getElementById('id-music').getAttribute('data-id');
        xhr.open('GET', 'http://localhost:8000/api/musics/detail/'+id_music, true);
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText)
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
    

    function fillSong(song) {
        document.querySelector('.play-song-container').innerHTML = songDetail(song.image_url, song.album_title, song.music_title, song.genre_name, song.artist_name);

        document.querySelector('.top-song-second').innerHTML= songPlayer(song.audio_url);
    }

    function songDetail(img_url, album, title, genre, artist){
        return `
        <img src="${'public/image/'+ img_url}" alt="">
        <div class="play-song-detail">
            <h3>${album}</h3>
            <h4>${title}</h4>
            <br>
            <p>${genre}</p>
            <p>${artist}</p>
        </div>
        `
    }
    function songPlayer(audio_url){
        return `
        <audio controls>
            <source src=${audio_url} type="audio/mpeg">
        </audio>
        `
    }
});
