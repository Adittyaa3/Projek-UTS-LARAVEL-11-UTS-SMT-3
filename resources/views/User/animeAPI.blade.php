

@extends('Admin.main')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    body {
       
        font-family: Arial, sans-serif;
    }
    .anime-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    .anime-item {
        width: 200px;
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }
    .anime-item img {
        width: 100%;
        height: auto;
    }

</style>
</head>
<body>

<h1 style=" margin-top: 50px;">Top Anime</h1>
<div class="anime-list" id="anime-list"></div>

<script>
    $(document).ready(function() {
        // AJAX request ke API Jikan
        $.ajax({
            url: "https://api.jikan.moe/v4/top/anime",
            method: "GET",
            success: function(response) {
                const animeList = response.data;
                let htmlContent = '';
                
                // Loop untuk menampilkan anime
                animeList.forEach(function(anime) {
                    htmlContent += `
                        <div class="anime-item">
                            <img src="${anime.images.jpg.image_url}" alt="${anime.title}">
                            <h3>${anime.title}</h3>
                            <p>Score: ${anime.score}</p>
                        </div>
                    `;
                });

                // Append ke div dengan id 'anime-list'
                $('#anime-list').html(htmlContent);
            },
            error: function() {
                alert('Error fetching data from API');
            }
        });
    });
</script>
    


@endsection
