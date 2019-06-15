login = "";

function loginDone() {
    console.log("loged in");
    $(".card [href='login.php']").html('<i class="fas fa-sign-out-alt" aria-hidden="true"></i>Logout');
    $(".card [href='register.php']").html('<i class="fa fa-user" aria-hidden="true"></i>Profile');
    $(".card [href='login.php']").attr("data-fake", "logout");
}

$(document).on('click', "[data-fake='logout']", function (e) {
    e.preventDefault();
    console.log("hello");
    signOut();
});

//  facebook starts
window.fbAsyncInit = function () {
    FB.init({
        appId: '################', // replace ############# with secret appId
        cookie: true,
        xfbml: true,
        version: 'v2.11'
    });

    FB.AppEvents.logPageView();

};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function statusChangeCallback(response) {
    if (response.status == 'connected') {
        login = "fb";
        loginDone();
        console.log("already");
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function (response) {
            alert('Good to see you, ' + response.name + '.');
            console.log(response);
        });

    } else {
        FB.login(function (response) {
            if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function (response) {
                    alert('Good to see you, ' + response.name + '.');
                    console.log(response);
                });
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        });
    }
}



function checkLoginState() {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
}
//  facebook ends

//google+ starts
var googleUser = {};
var startApp = function () {
    gapi.load('auth2', function () {
        // Retrieve the singleton for the GoogleAuth library and set up the client.
        auth2 = gapi.auth2.init({
            client_id: '#########################################', // replace ############# with secret client_id
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
        });
        attachSignin(document.getElementById('google_login'));
    });
};

function attachSignin(element) {
    auth2.attachClickHandler(element, {},
        function (googleUser) {
            alert("Signed in: " + googleUser.getBasicProfile().getName());
            console.log(googleUser.getBasicProfile());
            login = "g+";
            loginDone();
        },
        function (error) {
            //    alert(JSON.stringify(error, undefined, 2));
            console.log(error);
        });
}

startApp();

// google+ ends
// linkden starts
// linkden  ends

function signOut() {
    console.log("sign out");
    if (login == "fb") {
        FB.logout();
        alert("fb sign out");
    } else if (login == "g+") {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            alert('google signed out.');
        });

    } else if (login == "lk") {
        IN.User.logout(function () {
            alert("linkden sign out");
        });
    }

    $("[href='login.php']").html(' <i class="fa fa-user" aria-hidden="true"></i>Login');
    $("[href='register.php']").html('<i class="fa fa-arrow-right" aria-hidden="true"></i>Register');
}

$(document).ready(function () {
    $("#sign_out").hide();
    $("#sign_enter").show();


    $("#sign_out").click(function () {
        signOut();
    });

    $("#linkedin_login").click(function () {
        IN.User.authorize(function () {
            console.log(IN.User);
            login = "lk";
            loginDone();
        });
    });

});