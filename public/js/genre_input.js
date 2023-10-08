
document.addEventListener("click", function(event) {
if (event.target.matches("#dialog-cancel-button")) {
    document.getElementsByClassName("dialog-wrapper")[0].remove();;
}
if (event.target.matches("#dialog-genre-submit-button")) {
    let xhr = new XMLHttpRequest();
    let method = "POST";
    const id = document.getElementById("dialog-genre").getAttribute('id-genre');
    let url;
    if (id) {
    url = `/api/genres/${id}`
    } else {
    url = `/api/genres`
    }
    let genreName = document.getElementById("genre-name").value;
    let image = document.getElementById("input-genre-image-url").files[0];
    let color = document.getElementById("genre-color").value;
    let formData = new FormData();
    formData.append("name", genreName);
    formData.append("image", image);
    formData.append("color", color);
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
if (event.target.matches("#dialog-delete-submit-button")) {
    let xhr = new XMLHttpRequest();
    let method = "DELETE";
    const id = document.getElementById("dialog-genre").getAttribute('id-genre');
    let url = `/api/genres/${id}`;
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

if (event.target.matches(".add-genre")) {
    const xhr = new XMLHttpRequest();
    const method = "GET";
    const url = "/element/genre-input";
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

if (event.target.matches(".edit-genre")) {
    const xhr = new XMLHttpRequest();
    const method = "GET";
    const id = event.target.parentElement.getAttribute("value");
    const url = "/element/genre-input/" + id;
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

document.addEventListener('change', function (event) {
  if (event.target.matches('#input-genre-image-url')) {
      var output = document.getElementById('genre-image-preview');
      var fileUrl = URL.createObjectURL(event.target.files[0]);
      output.src = fileUrl;
      output.onload = function() {
      URL.revokeObjectURL(output.src) 
      }

      var label = document.getElementById("file-input-label");
      label.innerHTML = event.target.value;
  }

  if (event.target.matches("#genre-name")) {
      var output = document.getElementById('genre-name-preview');
      output.innerHTML = event.target.value;
  }

  if (event.target.matches("#genre-color")) {
      var output = document.getElementById('genre-card-preview');
      output.style.backgroundColor = event.target.value;
  }
});