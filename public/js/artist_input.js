
document.addEventListener("click", function(event) {
    if (event.target.matches("#dialog-cancel-button")) {
        document.getElementsByClassName("dialog-wrapper")[0].remove();;
    }

    if (event.target.matches("#dialog-artist-submit-button")) {
        let xhr = new XMLHttpRequest();
        let method = "POST";
        const id = document.getElementById("dialog-artist").getAttribute('id-artist');
        let url;
        if (id) {
          url = `/api/artists/${id}`
        } else {
          url = `/api/artists`
        }
        let artistName = document.getElementById("artist-name").value;
        let image = document.getElementById("input-artist-image-url").files[0];
        let formData = new FormData();
        formData.append("artist_name", artistName);
        formData.append("image", image);
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

    if (event.target.matches("#dialog-artist-delete-button")) {
        let xhr = new XMLHttpRequest();
        let method = "DELETE";
        const id = document.getElementById("dialog-artist").getAttribute('id-artist');
        let url = `/api/artists/${id}`;
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

    if (event.target.matches(".edit-artist")) {
        const xhr = new XMLHttpRequest();
        const method = "GET";
        const id = event.target.parentElement.getAttribute("value");
        console.log(id);
        const url = "/element/artist-input/"+id;
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

    if (event.target.matches(".add-artist")) {
        const xhr = new XMLHttpRequest();
        const method = "GET";
        const id = event.target.parentElement.getAttribute("value");
        console.log(id);
        const url = "/element/artist-input";
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
    if (event.target.matches("#input-artist-image-url")) {
        var output = document.getElementById('artist-image-preview');
        var fileUrl = URL.createObjectURL(event.target.files[0]);
        output.src = fileUrl;
        output.onload = function() {
            URL.revokeObjectURL(output.src) 
        }
        
        var label = document.getElementById("file-input-label");
        label.innerHTML = event.target.value;    
    }
});


