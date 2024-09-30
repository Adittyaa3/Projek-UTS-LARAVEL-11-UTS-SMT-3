

@extends('Admin.main')
@if (auth()->user()->hasRole('admin'))
@section('content')
<title>Top Anime from Kitsu API</title>
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

    <h1>Top Anime from Kitsu</h1>
    <div class="anime-list" id="anime-list"></div>

    <script>
        $(document).ready(function() {
            // AJAX request ke API Kitsu
            $.ajax({
                url: "https://kitsu.io/api/edge/anime",
                method: "GET",
                success: function(response) {
                    const animeList = response.data;
                    let htmlContent = '';
                    
                    // Loop untuk menampilkan anime
                    animeList.forEach(function(anime) {
                        const animeAttributes = anime.attributes;
                        htmlContent += `
                            <div class="anime-item">
                                <img src="${animeAttributes.posterImage.medium}" alt="${animeAttributes.titles.en || animeAttributes.titles.en_jp}">
                                <h3>${animeAttributes.titles.en || animeAttributes.titles.en_jp}</h3>
                                <p>Rating: ${animeAttributes.averageRating}</p>
                            </div>
                        `;
                    });

                    // Append ke div dengan id 'anime-list'
                    $('#anime-list').html(htmlContent);
                },
                error: function() {
                    alert('Error fetching data from Kitsu API');
                }
            });
        });
    </script>
    


@endsection
@endif
