document.addEventListener("DOMContentLoaded", initial);

document.getElementById("limit").addEventListener("change", changeLimit);

document.getElementById("right").addEventListener("click", nextPage);

document.getElementById("left").addEventListener("click",prevPage);

function initial(){
    
    var currentUrl = window.location.href;
    var url = new URL(currentUrl);
    var limitValue = url.searchParams.get("limit");
    var pageValue = url.searchParams.get("page");

    
    if(limitValue==null){
        limitValue = document.getElementById("limit").value;
    }
    
    if(pageValue==null){
        pageValue = document.getElementById("current-page").innerHTML;
    }
    
    console.log("limit ",limitValue)
    console.log("page " ,pageValue)
    // var limit = document.getElementById("limit").value;
    // var page = document.getElementById("current-page").innerHTML;

    getMaxPage(limitValue);
    fillData(limitValue,pageValue);
}

function changeLimit() {
    var currentUrl = window.location.href;
    var url = new URL(currentUrl);
    var limit = url.searchParams.get("limit");
    if(limit==null){
        limit=document.getElementById("limit").value;
    }
    var limit = document.getElementById("limit").value;

    history.pushState(null, null, "?limit=" + limit);
    document.getElementById("current-page").innerHTML = 1;

    getMaxPage(limit);
    fillData(limit,1);
}

async function getMaxPage(limit){
    try {
        const xhr = new XMLHttpRequest();
        const url = '/api/albums';
        xhr.open('GET', url, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    document.getElementById("max-page").innerHTML = Math.ceil(data.data.length / limit);
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

async function fillData(limit,page) {
    try {
        const xhr = new XMLHttpRequest();
        const url = '/api/albums/records/' + page + '/' + limit;
        xhr.open('GET', url, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    document.getElementById("container-pagination").innerHTML = albumDisplay(data.data[0].id_album,data.data[0].album_image_url, data.data[0].album_title, data.data[0].artist_name);
                    for (var i = 1; i < Math.min(limit, data.data.length); i++) {
                        document.getElementById("container-pagination").innerHTML += albumDisplay(data.data[i].id_album,data.data[i].album_image_url, data.data[i].album_title, data.data[i].artist_name);
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
}

function albumDisplay(id_album,album_image, album_title, artist){
    return `
    <a href="album?id=${id_album}">
        <div class="song-item-medium">
            <img class="container-pagination" src="${album_image}" />
            <h3>${album_title}</h3>
            <p>${artist}</p>
        </div>
    </a>
    `
}
function nextPage() {
    var limit = document.getElementById("limit").value;
    var currentPageElement = document.getElementById("current-page");
    var page = parseInt(currentPageElement.innerHTML) + 1;

    console.log(page);
    console.log(document.getElementById("max-page").innerHTML);
    if(page > parseInt(document.getElementById("max-page").innerHTML)) page = parseInt(document.getElementById("max-page").innerHTML);

    fillData(limit, page);

    currentPageElement.innerHTML = page;

    history.pushState(null, null, "?limit=" + limit + "&page=" + page);
}

function prevPage() {
    var limit = document.getElementById("limit").value;
    var currentPageElement = document.getElementById("current-page");
    var page = parseInt(currentPageElement.innerHTML) - 1;

    if(page < 1) page = 1;

    fillData(limit, page);

    currentPageElement.innerHTML = page;

    history.pushState(null, null, "?limit=" + limit + "&page=" + page);
}
