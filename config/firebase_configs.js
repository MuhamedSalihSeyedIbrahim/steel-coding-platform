//<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
//<script src ="../config/firebase_configs.js"></script>
var config = {
    apiKey: "",
    authDomain: "",
    databaseURL: "",
    projectId: "steel-platform",
    storageBucket: "",
    messagingSenderId: ""
};
firebase.initializeApp(config);


var provider = new firebase.auth.GoogleAuthProvider();

function googleSignin() {
    firebase.auth().signInWithPopup(provider).then(function(result) {
        var token = result.credential.accessToken;
        var user = result.user;
        //  console.log(user); console.log(token);
        if (user != null) {
            var meta = { "us": user, "ot": token };
            var k = JSON.stringify(meta);
            $.ajax({
                type: 'POST',
                url: 'conn.php',
                data: k,
                success: function(response) {
                    document.write(response);
                }
            });
        }

    }).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        document.write(error.code + " " + error.message);

    });

}





function googleSignout() {
    firebase.auth().signOut().then(function() {
            window.location = "../src/logout.php";
        },
        function(error) {
            document.write("Signout Failed");
        });
}