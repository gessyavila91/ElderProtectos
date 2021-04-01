<style>
    * {
        margin: 0;
        padding: 0;
    }

    section {
        position: relative;
        width: 100%;
        height: 100vh;
        background: #151515;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    section .row {
        position: relative;
        /*top: -30%;*/
        width: 100%;
        display: flex;
        padding: 10px 0;
        white-space: nowrap;
        font-size: 20px;
        /*transform: rotate(-15deg);*/
    }

    i {
        color: black;
        transition: 1s;
        padding: 0 5px;
        user-select: none;
        cursor: default;
    }

    i:hover {
        transition: 0s;
        text-shadow: 0 0 120px white;
    }

    section .row div {
        animation: animate1 80s linear infinite;
        animation-delay: -80s;
    }

    section .row div:nth-child(2) {
        animation: animate2 80s linear infinite;
        animation-delay: -40s;
    }

    section .row:nth-child(even) div {
        animation: animate3 80s linear infinite;
        animation-delay: -80s;
    }

    section .row:nth-child(even) div:nth-child(2) {
        animation: animate4 80s linear infinite;
        animation-delay: -40s;
    }

    @keyframes animate1 {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    @keyframes animate2 {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-200%);
        }
    }

    @keyframes animate3 {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    @keyframes animate4 {
        0% {
            transform: translateX(-200%);
        }
        100% {
            transform: translateX(0%);
        }
    }

</style>

<head>
    <title>{{ config('app.name') }}</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>

<section>

    <div class="row">
        <div>
            <i class="fa fa-twitch" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-youtube-play" aria-hidden="true"></i>
            <i class="fa fa-apple" aria-hidden="true"></i>
        </div>
        <div>
            <i class="fa fa-twitch" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-youtube-play" aria-hidden="true"></i>
            <i class="fa fa-apple" aria-hidden="true"></i>
        </div>
    </div>
    <div class="row">
        <div>
            <i class="fa fa-twitch" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-youtube-play" aria-hidden="true"></i>
            <i class="fa fa-apple" aria-hidden="true"></i>
        </div>
        <div>
            <i class="fa fa-twitch" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-youtube-play" aria-hidden="true"></i>
            <i class="fa fa-apple" aria-hidden="true"></i>
        </div>
    </div>

</section>

</body>

<script>
    // i:hover {
    //   transition: 0s;
    //   color:white;
    //   text-shadow: 0 0 120px white;
    // }


    $("i").hover(function (e) {
        var hue = 'rgb('
            + (Math.floor(Math.random() * 256)) + ','
            + (Math.floor(Math.random() * 256)) + ','
            + (Math.floor(Math.random() * 256)) + ')';


        $(this).css(
            "color", e.type === "mouseenter" ? hue : "black")
    })


</script>
</html>


