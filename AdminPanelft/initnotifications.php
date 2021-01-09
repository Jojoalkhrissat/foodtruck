<input id="token" hidden>
<script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-messaging.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyAniAzUkGsXxfLFDj5TO3nWF57RMswAfYg",
        authDomain: "food-trucker-926d9.firebaseapp.com",
        databaseURL: 'https://food-trucker-926d9.firebaseio.com',
        projectId: "food-trucker-926d9",
        storageBucket: "food-trucker-926d9.appspot.com",
        messagingSenderId: "982918615208",
        appId: "1:982918615208:web:365610569c7087ca87f29d",
        measurementId: "G-QFC99RR94R"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging=firebase.messaging();

    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");
                return messaging.getToken();
            })
            .then(function (token) {
                console.log("Token : "+token);
                document.getElementById("token").value=token;
                window.location.replace('fcm_page.php?token='+token);
            })
            .catch(function (reason) {
                console.log(reason);
            });
    }
    IntitalizeFireBaseMessaging();
</script>