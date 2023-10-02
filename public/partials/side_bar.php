<?php
function SideBar() {
    $html = <<<"EOT"
    <div class="sidebar">
        <p>Stopify</p>
        <a class="active" href="">Home</a>
        <a href="">Search</a>
        <a href="">Album</a>
        <a href="">Liked Song</a>
        <a href="">Logout</a>
    </div>
    EOT;

    return $html;
}
