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
    <style lang="csss">
            iframe{
                height: 100vh;
            }
    </style>
</head>

<body>
    <iframe src="http://localhost:8080?type=admin&type=admin<?= $_SESSION['id'] ?>" frameborder="1" width="100%" height="100vh !important"></iframe>

    <!-- <div id="app">
        <input type="text" id="room" placeholder="Enter room">
        <button onclick="joinRoom()">Join Room</button>
        <div id="messages"></div>
        <input type="text" id="message" placeholder="Enter message">
        <button onclick="sendMessage()">Send Message</button>
    </div> -->
    <!-- <div id="grid"></div> -->
    <!-- <script src="/socket.io/socket.io.js"></script> -->
    <!-- <script src="script.js"></script> -->
</body>

</html>