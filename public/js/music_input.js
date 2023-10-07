document.addEventListener("click", function(event) {
    if (event.target.matches("#dialog-cancel-button")) {
        document.getElementsByClassName("dialog-wrapper")[0].remove();
    }

    if (event.target.matches("#dialog-music-submit-button")) {
        let xhr = new XMLHttpRequest();
        let method = "POST";
        const id = document.getElementById("dialog-music").getAttribute('id-music');
        let url;
        if (id) {
          url = `/api/musics/${id}`
        } else {
          url = `/api/musics`
        }
        
        const musicTitle = document.getElementById("music-title").value;
        const idAlbum = document.getElementById("album-option").value;
        const audio = document.getElementById("input-music-audio-url").files[0];
        const idGenre = document.getElementById("genre-option").value;
        let formData = new FormData();
        formData.append("title", musicTitle);
        formData.append("id_album", idAlbum)
        formData.append("audio", audio); 
        formData.append("id_genre", idGenre);
      
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

    if (event.target.matches("dialog-music-delete-button")) {
        let xhr = new XMLHttpRequest();
        let method = "DELETE";
        const id = document.getElementById("dialog-music").getAttribute('id-music');
        let url = `/api/musics/${id}`;
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
});

document.addEventListener("change", function(event) {
  if (event.target.matches("#album-option")) {
    const image_url = (event.target.options[event.target.selectedIndex].getAttribute("image_url"));
    document.getElementById("album-image-preview").src = image_url;
  }
});

// function loadAlbumOption() {
//     let xhr =  new XMLHttpRequest();
//     let method = "GET";
//     let url = "/api/albums";
//     xhr.open(method, url, true);
//     xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//         // console.log(JSON.stringify(xhr.response));
//       let select = document.getElementById("album-option");
//       let responseData = JSON.parse(xhr.responseText);
//       let albums = responseData.data
//       select.innerHTML = "";
//       albums.forEach(function(album) {
//         let option = document.createElement("option");
//         option.value = album.id_album;
//         option.text = album.title;   
//         option.setAttribute("image_url", album.image_url);
//         select.appendChild(option); 
//       });
//     } else {
//       console.error("Request failed with status:", xhr.status);
//     }
//     };
//     xhr.send();
//   }
//   document.getElementById("album-option").addEventListener("change", function(event) {
//     const image_url = (this.options[this.selectedIndex].getAttribute("image_url"));
//     console.log("FOOBAR");
//     document.getElementById("album-image-preview").src = image_url;
//   });

//   function loadGenreOption() {
//     let xhr =  new XMLHttpRequest();
//     let method = "GET";
//     let url = "/api/genres";
//     xhr.open(method, url, true);
//     xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//       let select = document.getElementById("genre-option");
//       let responseData = JSON.parse(xhr.responseText);
//       let genres = responseData.data
//       select.innerHTML = "";
//       genres.forEach(function(genre) {
//         let option = document.createElement("option");
//         option.value = genre.id_genre;
//         option.text = genre.name;   
//         select.appendChild(option); 
//       });
//     } else {
//       console.error("Request failed with status:", xhr.status);
//     }
//     };
//     xhr.send();
//   }



// addEventListener("DOMContentLoaded", (event) => {
//   loadAlbumOption();
//   loadGenreOption();
// });
