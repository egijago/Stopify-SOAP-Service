document.addEventListener('DOMContentLoaded', async function () {
    try {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://localhost:8000/api/albums', true);
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText)
                    const data = JSON.parse(xhr.responseText);
                    displaySongs(data.data);
                } else {
                    console.error('HTTP error! Status: ', xhr.status);
                }
            }
        };
    
        xhr.send();
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }
    

    function displaySongs(songs) {
        document.querySelector('.top-song-first').innerHTML = bigFormat("senja", songs[0].title, songs[0].title);

        var longSongsContainer = document.querySelector('.top-song-second');
        for (var i = 1; i < Math.min(5, songs.length); i++) {
            longSongsContainer.innerHTML += longFormat("senja", songs[i].title, songs[i].title);
        }

        var newSongsContainer = document.querySelector('.new-song');
        for (var j = 5; j < Math.min(9, songs.length); j++) {
            newSongsContainer.innerHTML += mediumFormat("senja", songs[j].title, songs[j].title);
        }
    }

    function bigFormat(img_url, song_title, artist) {
        return `
            <img class="first" src="public/image/${img_url}.jpg" />
            <h2>${song_title}</h2>
            <p>${artist}</p>
        `;
    }

    function longFormat(img_url, song_title, artist) {
        return `
        <div class="song-item-long">
            <img class="second" src="public/image/${img_url}.jpg"/>
            <div class="song-item-container">
                <h4>${song_title}</h4>
                <p>${artist}</p>
            </div>
        </div>
        `;
    }

    function mediumFormat(img_url, song_title, artist) {
        return `
        <div class="song-item-medium">
            <img class="new-song" src="public/image/${img_url}.jpg" />
            <h3>${song_title}</h3>
            <p>${artist}</p>
        </div>
        `;
    }
});
