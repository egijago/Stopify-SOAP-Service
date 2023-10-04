<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UFT-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stopify</title>
        <link rel="stylesheet" href="public/css/stylee.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-lb3xO3JFU0vVu5f5N5Bvz/ujy5tD8fFp0IzPFHl1aglVgtpXEN4C+1nX8f5J9O07o" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,200;0,9..40,500;0,9..40,700;1,9..40,100&family=Open+Sans&family=Poppins:wght@200&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="sidebar">
                <div class="header">
                    <div class="list-item">
                        <a href="#">
                            <span class="description-header">Stopify</span>
                        </a>
                    </div>
                </div>
                <div class="main">
                    <div class="list-item">
                        <a href="#">
                            <img src="gambar/fi-ss-home.svg" alt="" class="icon">
                            <span class="description">Home</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a href="#">
                            <img src="gambar/fi-ss-home.svg" alt="" class="icon">
                            <span class="description">Search</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a href="#">
                            <img src="gambar/fi-ss-home.svg" alt="" class="icon">
                            <span class="description">Album</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a href="#">
                            <img src="gambar/fi-ss-home.svg" alt="" class="icon">
                            <span class="description">Liked Song</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a href="#">
                            <img src="gambar/fi-ss-home.svg" alt="" class="icon">
                            <span class="description">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="border"></div>
                <h1 class="playlist">PLAYLIST</h1>
                <h2 class="liked-song">Liked Songs</h2>
                <button class="tombol-like">
                    <i class="fas fa-heart"></i>
                </button>
                <button class="tombol-download">
                    <i class="bi bi-download"></i>
                </button>
                <div class="songlist">
                    <div class="header_songlist">
                        <p>Song List</p>
                        <div>
                            <input type="text" class="input-pencarian" placeholder="Search">
                        </div>
                    </div>
                    <div class="song_section">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Gendre</th>
                                    <th>Release</th>
                                    <th>Durasi</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Queen</td>
                                    <td>Jazz</td>
                                    <td>Jan 2023</td>
                                    <td>2.30</td>
                                    <td>
                                        <button><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Queen</td>
                                    <td>Jazz</td>
                                    <td>Jan 2023</td>
                                    <td>2.30</td>
                                    <td>
                                        <button><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Queen</td>
                                    <td>Jazz</td>
                                    <td>Jan 2023</td>
                                    <td>2.30</td>
                                    <td>
                                        <button><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="main.js"></script>
        </div>
    </body>
</html>

