<?php 

function AlbumInputDialog() {
  $html = <<< "EOT"
    <div class="dialog-wrapper">
      <div class="dialog">
        <form  action="/api/album" method="POST">
          <label for="title">Album title</label><br>
          <input type="text" id="album-title" name="title"><br>
          <label for="album-title">ID Artist</label><br>
          <input type="text" id="album-title" name="id_artist"><br>
          <label for="album-title">Image URL</label><br>
          <input type="text" id="album-title" name="image_url"><br>
          <input type="submit" value="Update">
          <input type="button" onclick="closeDialog()" value="Cancel">
          <input type="submit" value="Delete">
        </form> 
      </div>
    </div>
  EOT;
  return $html;
}
