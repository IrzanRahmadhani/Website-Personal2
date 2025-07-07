<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Umur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: white;
            padding: 10px;
        }

        .age-verification {
            text-align: center;
            background: black;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            color: white;
        }

        .age-verification img {
            width: 80%;
            max-width: 200px;
            margin-bottom: -30px;
            margin-top: -10px;
        }

        .age-verification h1 {
            font-size: 22px;
            margin-bottom: 15px;
            color: white;
        }

        .age-verification p {
            color: white;
            font-size: 16px;
        }

        .age-verification button {
            width: 100%;
            max-width: 250px;
            background-color: yellow;
            color: black;
            border: none;
            padding: 12px;
            font-size: 18px;
            border-radius: 50px;
            cursor: pointer;
            margin: 10px 0;
        }

        .age-verification button:hover {
            background-color: grey;
        }

        .age-verification button.no {
            background-color: #dc3545;
        }

        .age-verification button.no:hover {
            background-color: #a71d2a;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .popup img {
            width: 100px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
<div class="age-verification">
    <img src="azu-putih.png" alt="Logo">
    <h1>Verifikasi Umur</h1>
    <p>Apakah Anda berusia 18 tahun atau lebih?</p>
    <button onclick="verifyAge(true)">Iya, saya 18+</button>
    <button class="no" onclick="verifyAge(false)">Tidak</button>
</div>

<div id="popup" class="popup">
    <img id="popup-icon" src="check.png" alt="Ceklis">
    <p id="popup-message"></p>
</div>

<script>
    function showPopup(message, icon, redirectUrl) {
        const popup = document.getElementById("popup");
        document.getElementById("popup-message").innerText = message;
        document.getElementById("popup-icon").src = icon;
        popup.style.display = "block";
        setTimeout(() => {
            popup.style.display = "none";
            if (redirectUrl) {
                window.location.href = redirectUrl;
            }
        }, 2000);
    }

    function verifyAge(isAdult) {
        if (isAdult) {
            showPopup("Selamat Datang di Website Azuraya Vapor Store Purnama!", "check.png", "HOME.html");
        } else {
            showPopup("Anda tidak dapat mengakses situs ini.", "silang.png", "https://www.youtubekids.com/");
        }
    }

</script>
</body>
</html>
