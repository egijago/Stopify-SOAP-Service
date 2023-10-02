<?php 

function AlbumInputDialog() {
  $html = <<< "EOT"
    <div class="dialog-wrapper">
      <div class="dialog">
        <form>
          <label for="album-title">Album title</label><br>
          <input type="text" id="album-title" name="album-title"><br>
          <label for="artist">Artist</label><br>
          <select id="artist" name="artist">
            <option value="john doe">John Doe</option>
            <option value="john doe">Josephine</option>
            <option value="john doe">John Doe</option>
            <option value="john doe">Josephine</option>
            <option value="john doe">John Doe</option>
            <option value="john doe">Josephine</option>
          </select><br>
          <label for="genre">Genre</label><br>
          <select id="genre" name="genre">
            <option value="jazz">jazz</option>
            <option value="jazz">Jjazz</option>
            <option value="jazz">jazz</option>
            <option value="jazz">Jjazz</option>
            <option value="jazz">jazz</option>
            <option value="jazz">Jjazz</option>
          </select><br>
          <input type="submit" value="Update">
          <input type="button" onclick="closeDialog()" value="Cancel">
          <input type="submit" value="Delete">
        </form> 
      </div>
    </div>
  EOT;
  return $html;
}
