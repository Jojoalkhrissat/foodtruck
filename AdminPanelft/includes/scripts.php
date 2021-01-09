    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
     <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    

<script type="text/javascript">
	function setCookie(key, value, expiry) {
  var expires = new Date();
  expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
  document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}
function googleTranslateElementInit() {
    setCookie('googtrans', '/en/ar',1);
    new google.translate.TranslateElement({
       pageLanguage: 'en'
    }, 'google_translate_element');
}
googleTranslateElementInit();
</script>
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

    

    messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
            })
    })
   


</script>