<?php

function GenreCard($genres) {
  
    $html = <<<"EOT"
    <div class="genre-card"
        
    >    
EOT;

    $html = <<<"EOT"
    <a href="$url" class="sidebar-elmt $classActive d-flex py-2 px-4 mb-2 align-items-center">
      <div class="sidebar-elmt-icon mr-4 img-container d-flex justify-content-center align-items-center">
        <img src="$icon" alt="$title icon" />
      </div>
      <div class="sidebar-elmt-text">
        $title
      </div>
    </a>
  EOT;
  
    return $html;
}