<!-- -->
<!-- <div class="grid place-content-center">welcome to the small www php mvc framework</div> -->
<!doctype html>
<html lang="en">

<head>
   
    <meta charset="utf-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="/assets/js/style.css">
    <!-- <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script> -->
    <!-- <script src="https://cdn.socket.io/socket.io-3.0.0.js"></script> -->
    <script defer src="/assets/js/io.js"></script>
    <script defer src="/assets/js/script.js"></script>
    <style lang="css">
        iframe {
            height: 100vh !important;
        }
    </style>
</head>

<body>
    <iframe src="http://localhost:8080?type=admin&type=admin<?= $_SESSION['id'] ?>" frameborder="1" width="100%" height="100vh !important"></iframe>

    <!-- <div class=" container">
        <div class="winner">Winner: </div>

        <div id="grid"></div>

</body>

</html>