document.addEventListener("DOMContentLoaded", initial);

document.getElementById("limit").addEventListener("change", changeLimit);

document.getElementById("right").addEventListener("click", nextPage);

document.getElementById("left").addEventListener("click",prevPage);

function initial(){

    console.log("id",document.getElementById("id_user").value)
    
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
        const id_user = document.getElementById("id_user").value;
        console.log(id_user)

        const xhr = new XMLHttpRequest();
        const url = '/api/likes/'+id_user;
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
        const id_user = document.getElementById("id_user").value;
        console.log(id_user)

        const xhr = new XMLHttpRequest();
        const url = 'api/likes/'+id_user+'/records/'+page+'/'+limit;
        console.log(url)
        xhr.open('GET', url, true);


        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText)
                    const data = JSON.parse(xhr.responseText);
                    console.log(data.data)
                    heading=["Title Song","Genre ","Album","Artist","Realease Year"]
                    dataTalbe=[]
                    for(let i=0;i<data.data.length;i++){
                        const hrefSong= "<a href='/music?id="+data.data[i].id_music+"'>"+data.data[i].music_title+"</a>"
                        dataTalbe[i]=[hrefSong,data.data[i].genre_name,data.data[i].album_title,data.data[i].artist_name,data.data[i].release_date.substring(0, 4)]
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
        let i=0;
        
        data_html += "<tr>";
        for (let col of row) {
            data_html += `<td>${col}</td>`;
        }
        data_html += "</a></tr>";
        i++;
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
