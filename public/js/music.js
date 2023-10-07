document.addEventListener('DOMContentLoaded', async function () {
    try {
        const xhr = new XMLHttpRequest();
        var currentUrl = window.location.href;
        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");
        console.log('awalll',idValue);
        xhr.open('GET', '/element/music/'+idValue, true);

    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const data =xhr.responseText;
                    document.getElementById("page-wrapper").innerHTML = data
                } else {
                    console.error('HTTP error! Status: ', xhr.status);
                }
            }
        };
    
        xhr.send();
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }

});

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