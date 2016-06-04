$(document).ready(function() {
    var size = [window.width, window.height];
    $("#helpOne").fadeOut(1);
    $("#helpTwo").fadeOut(1);
    $("#helpThree").fadeOut(1);
    $(window).resize(function() {
        window.resizeTo(size[0], size[1]);
    });

    $("#help").click(function() {
        document.getElementById("helpOne").style.opacity = "1";
        document.getElementById("helpTwo").style.opacity = "1";
        document.getElementById("helpThree").style.opacity = "1";
        var div = $("#anim");
        startAnimation();
        $("#helpOne").fadeIn(3000);
        $("#helpTwo").fadeIn(3000);
        $("#helpThree").fadeIn(3000);

        function startAnimation() {
            div.animate({
                height: "100%",
                width: "100%"
            }, 2000, "easeOutQuint");
            div.css("background-color", "#4AC948");
        }
    });
	
	$("#register").click(function(){
    window.location.href="registration.php";
    })
	
	$("#login").click(function(){
    window.location.href="login.php";
    })

    $("#exitButton").click(function() {
        $("#helpOne").fadeOut(1000);
        $("#helpTwo").fadeOut(1000);
        $("#helpThree").fadeOut(1000);

        var div = $("#anim");
        startAnimation();

        function startAnimation() {
            div.animate({
                height: "0%",
                width: "0%"
            }, 2375, "swing")
        }
    });


});