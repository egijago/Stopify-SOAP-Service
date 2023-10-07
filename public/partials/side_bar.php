<?php
function SideBar() {
    $html = <<<"EOT"
    <div class="sidebar">
        <p>Stopify</p>
        <a class="active" href="/home">Home</a>
        <a href="/search">Search</a>
        <a href="/album">Album</a>
        <a href="/liked">Liked Song</a>
        <a href="/logout">Logout</a>
    </div>
    EOT;

    return $html;
}
