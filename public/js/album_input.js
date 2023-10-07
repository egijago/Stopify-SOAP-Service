


document.addEventListener("click", function(event) {
  if (event.target.matches("#dialog-album-submit-button")) {
    let xhr = new XMLHttpRequest();
    let method = "POST";
    const id = document.getElementById("dialog-album").getAttribute('id-album');
    let url;
    if (id) {
      url = `/api/albums/${id}`
    } else {
      url = `/api/albums`
    }
    let albumTitle = document.getElementById("album-title").value;
    let image = document.getElementById("input-album-image-url").files[0];
    let idArtist = document.getElementById("artist-option").value;
    console.log(JSON.stringify(idArtist));
  
    let formData = new FormData();
    formData.append("title", albumTitle);
    formData.append("image", image); 
    formData.append("id_artist", idArtist);
  
    xhr.open(method, url, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
          console.log(JSON.stringify(xhr.response));
      } else {
        console.error("Request failed with status:", xhr.status);
      }
    };
    xhr.send(formData);
}

if (event.target.matches("#dialog-cancel-button")) {
    document.getElementsByClassName("dialog-wrapper")[0].remove();
}

if (event.target.matches("#dialog-album-delete-button")) {
    let xhr = new XMLHttpRequest();
    let method = "DELETE";
    const id = document.getElementById("dialog-album").getAttribute('id-album');
    let url = `/api/albums/${id}`;
    xhr.open(method, url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(JSON.stringify(xhr.response));
        } else {
          console.error("Request failed with status:", xhr.status);
        }
    };
    xhr.send();
}

if (event.target.matches(".edit-music")) {
  const xhr = new XMLHttpRequest;
  const method = "GET";
  const id = event.target.parentElement.getAttribute("value");
  const url = `/element/album-input/` + id; 
  xhr.open(method, url);
  xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = xhr.responseText;
          document.querySelector(".dialog-section").innerHTML = xhr.responseText;
      } else {
          console.error("Request failed with response:", xhr.responseText);
        }
      }
    };
  xhr.send();
}

});
 





document.addEventListener("change", function(event) {
    if (event.target.matches("#input-album-image-url")) {
        var output = document.getElementById('album-image-preview');
        var fileUrl = URL.createObjectURL(event.target.files[0]);
        output.src = fileUrl;
        output.onload = function() {
          URL.revokeObjectURL(output.src) 
        }
        
        var label = document.getElementById("file-input-label");
        label.innerHTML = event.target.value;
    }
  
});
// function validateAlbum() {
//     var title = document.getElementById("title").value;
//     var id_artist = document.getElementById("id_artist").value;
//     var image_url = document.getElementById("image_url").value;
  
//     if (title === "" || id_artist === "" || image_url === "") {
//       alert("Semua bidang harus diisi.");
//         return false;
//       }
//         return true; 
//     }




// function loadArtistOption() {
//     let xhr =  new XMLHttpRequest();
//     let method = "GET";
//     let url = "/api/artists";
//     xhr.open(method, url, true);
//     xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//       let select = document.getElementById("artist-option");
//       let responseData = JSON.parse(xhr.responseText);
//       let artists = responseData.data
//       select.innerHTML = "";
//       artists.forEach(function(artist) {
//         let option = document.createElement("option");
//         option.value = artist.id_artist;
//         option.text = artist.name;   
//         select.appendChild(option); 
//       });
//     } else {
//       console.error("Request failed with status:", xhr.status);
//     }
//     };
//     xhr.send();    
// }


//   addEventListener("DOMContentLoaded", (event) => {
//     loadArtistOption();
//   });