document.addEventListener('DOMContentLoaded', async function () {
    try {
        const xhr = new XMLHttpRequest();
        var currentUrl = window.location.href;
        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");
        console.log(idValue);
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
    

    function fillSong(song) {
        document.querySelector('.play-song-container').innerHTML = songDetail(song.image_url, song.album_title, song.music_title, song.genre_name, song.artist_name);

        document.querySelector('.audio-player').innerHTML= songPlayer(song.audio_url);
    }

    function songDetail(img_url, album, title, genre, artist) {
        return `
            <img src="${'public/image/' + img_url}" alt="">
            <div class="play-song-detail">
                <h3>${album}</h3>
                <h4>${title}</h4>
                <br>
                <p>${genre}</p>
                <p>${artist}</p>
                <button class="love-button" onclick="handleLoveButtonClick()">Love ❤️</button>
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
});
function handleLoveButtonClick() {
    // Implement the logic for handling the love button click here
    alert('Love button clicked!');
}