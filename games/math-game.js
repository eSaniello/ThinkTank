$(document).ready(function() {
    let audio = new Audio("../audio/bg.mp3");
    audio.loop = true;
    audio.play();
    
    $(document).click(function() {
        $("input").select();
    });
    var rastgele;
    var antw = new Array();

    let score = 0;
    $("button").click(function(event) {
        var input = this;
        input.disabled = true;
        $('a.no_click').attr( 'onClick', 'return false' );
        $(this).fadeOut(100);
        $(".deniz").css("height", 75 + "px");
        var damla = 0;
        var sayia, sayib, isareta, isaretb, sonuc, yellow;
        
        function doSomething() {}
        (function loop() {
            var rand = Math.round(Math.random() * (2000)) + 500;
            rastgele = setTimeout(function() {
                damla++;
                yellow = Math.floor((Math.random() * 20) + 1);
                isareta = Math.floor((Math.random() * 4) + 1);
                sayia = Math.floor((Math.random() * 13) + 1);
                sayib = Math.floor((Math.random() * 10) + 1);
                if (isareta == 1) {
                    isaretb = "+";
                    sonuc = sayia + sayib;
                    antw.push(sonuc);
                }
                if (isareta == 2) {
                    isaretb = "-";
                    sayib = Math.floor((Math.random() * sayia) + 1);
                    sonuc = sayia - sayib;
                    antw.push(sonuc);
                }
                if (isareta == 3) {
                    isaretb = "×";
                    sonuc = sayia * sayib;
                    antw.push(sonuc);
                }
                if (isareta == 4) {
                    isaretb = "÷";
                    for (var tambolen = 0; tambolen < 1; tambolen++) {
                        tambolen--;
                        if (sayia % sayib == 0) {
                            tambolen++;
                            sonuc = sayia / sayib;
                            antw.push(sonuc);
                        } else {
                            sayib = Math.floor((Math.random() * sayia) + 1);
                        }
                    }
                }
                $(".damlalar").append("<div class=\"damla item" + damla + " damlaa"+ yellow + " sonuc" + sonuc + "\" style=\"left:" + Math.floor((Math.random() * 599) + 0) + "px; top:-52px \"><span class=\"isaret\">" + isaretb + "<\/span><span class=\"sayia\">" + sayia + "<\/span><span class=\"sayib\">" + sayib + "<\/span><\/div>");
                indir(damla);
                doSomething();
                loop();

                if(antw.length > 5)
                    antw.splice(0, 1);
                
                //console.log(antw);
                console.log(score);

                $(".score").text(score);
            }, rand);
        }());
    });
    $(document).keypress(function(e) {
        if (e.which == 13) {
            var deger = $('.tikla').val();
            $('.tikla').val("");
            
            if ($(".sonuc" + deger).hasClass("damlaa2")) {
              $(".damlalar").empty();
              //bonus points
              score += 5;
            }
            
            $(".damla").remove(".sonuc" + deger);

            //score
            antw.forEach(CheckForScore);
            function CheckForScore(value){
                if(value == deger){
                    score += 1;
                }
            }
        }
    });
    var uzunluk = 150;
    var sure = 6750;
    var hata = 0;

    function indir(gelen) {
        $(".item" + gelen).animate({
            top: '323px'
        }, 6750, "linear");
        setTimeout(function() {
            if ($(".damla").hasClass("item" + gelen)) {
                $(".deniz").css("height", uzunluk + "px");
                $(".damlalar").empty();
                uzunluk += 75;
                sure -= 1350;
                hata++;
                if (hata == 3) {
                    clearInterval(rastgele);
                    $("button").fadeIn(100);
                    $("button").text("Total score: " + score);
                    $(".deniz").css("height", "100%");
                    hata = 0;
                    uzunluk = 150;
                    sure = 6750;
                    //////////
                    confirmBox = confirm("Game ended. Total score: " + score);
                    if(confirmBox == true){
                        console.log("Okay clicked.");

                        //write score to db
                        //using ajax to save score in database
                         $.ajax({
                            url: "save-math-score.php",
                            type: "post",
                            data: { data: score },
                            success: function (data) {
                              console.log(data);
                              window.location.href = "../front-end/games.php";
                            }
                          });
                        
                      }
                      else{
                        console.log("Cancel clicked");

                        //write score to db
                        //using ajax to save score in database
                        $.ajax({
                            url: "save-math-score.php",
                            type: "post",
                            data: { data: score },
                            success: function (data) {
                              console.log(data);
                              window.location.href = "../front-end/games.php";
                            }
                          });

                      }
                }
            }
        }, sure);
    }
});