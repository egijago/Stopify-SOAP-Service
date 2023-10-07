document.addEventListener("DOMContentLoaded", initial);

document.getElementById("limit").addEventListener("change", changeLimit);

document.getElementById("right").addEventListener("click", nextPage);

document.getElementById("left").addEventListener("click",prevPage);

function initial(){
    var limit = document.getElementById("limit").value;
    var page = document.getElementById("current-page").innerHTML;

    getMaxPage(limit);
    fillData(limit,page);
}

function changeLimit() {
    var limit = document.getElementById("limit").value;

    id=window.location.href.split("?id")[1].split("&")[0]

    history.pushState(null, null,"?id" + id + "&limit=" + limit);
    document.getElementById("current-page").innerHTML = 1;

    getMaxPage(limit);
    fillData(limit,1);
}

async function getMaxPage(limit){
    try {
        const xhr = new XMLHttpRequest();
        // /api/album/{id_album}
        var currentUrl = window.location.href;
        var urlAPI = new URL(currentUrl);
        var idValue = urlAPI.searchParams.get("id");
        const url = '/api/album/'+idValue+'/musics';
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
        var currentUrl = window.location.href;
        var urlAPI = new URL(currentUrl);
        var idValue = urlAPI.searchParams.get("id");
        // /api/albums/{id_album}/records/{current_page}/{limit}
        const url = '/api/album/'+idValue+'/records/' + page + '/' + limit;
        xhr.open('GET', url, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    // console.log(data.data)
                    heading=["id music","music title","genre"]
                    dataTalbe=[]
                    for(let i=0;i<data.data.length;i++){
                        dataTalbe[i]=[data.data[i].id_music,data.data[i].music_title,data.data[i].genre_name]
                    }
                    document.getElementById("container-pagination").innerHTML = table(heading,dataTalbe);

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

function table(heading, data) {
    let heading_html = "";
    for (let head of heading) {
        heading_html += `<th>${head}</th>`;
    }

    let data_html = "";
    for (let row of data) {
        data_html += "<tr>";
        for (let col of row) {
            data_html += `<td>${col}</td>`;
        }
        data_html += "</a></tr>";
    }

    let html = `
    <table>
        <thead>
            <tr>
                ${heading_html}
            </tr>
        </thead>
        <tbody>
            ${data_html}
        </tbody>
    </table>`;

    return html
}


function nextPage() {
    var limit = document.getElementById("limit").value;
    var currentPageElement = document.getElementById("current-page");
    var page = parseInt(currentPageElement.innerHTML) + 1;

    if(page > parseInt(document.getElementById("max-page").innerHTML)) page = parseInt(document.getElementById("max-page").innerHTML);

    fillData(limit, page);

    currentPageElement.innerHTML = page;
    id=window.location.href.split("?id")[1].split("&")[0]
    history.pushState(null, null, "?id" + id + "&limit=" + limit + "&page=" + page);
}

function prevPage() {
    var limit = document.getElementById("limit").value;
    var currentPageElement = document.getElementById("current-page");
    var page = parseInt(currentPageElement.innerHTML) - 1;

    if(page < 1) page = 1;

    fillData(limit, page);

    currentPageElement.innerHTML = page;

    id=window.location.href.split("?id")[1].split("&")[0]
    history.pushState(null, null, "?id" + id + "&limit=" + limit + "&page=" + page);
}
