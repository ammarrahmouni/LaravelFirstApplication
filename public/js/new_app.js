function IsNumeric(event, error_span) {
    var keyCode = event.which ? event.which : event.keyCode;
    var ret = keyCode >= 48 && keyCode <= 57;
    document.getElementById(error_span).style.display = ret ? "none" : "flex";
    return ret;
}

function replaceEmptyLine(configFile, inputId) {
    var locales = configFile;
    var localesLength = locales.length;

    for (var i = 0; i < localesLength; i++) {
        $(inputId + locales[i]).on("focusout", function () {
            var text = $(this).val();
            var modifiedtext = text.replace(/\n/g, " ");
            $(this).val(modifiedtext);
        });
    }
}

function remainingCharacter(inputField, displayCharacter) {
    $(inputField).on("keyup", function (e) {
        var textlength = $(this).val().length;
        var maxlength = $(this).attr("maxlength");

        $(this)
            .next()
            .find(displayCharacter)
            .text(maxlength - textlength);
    });
}

function displayImage(inputImg, displayImg, labelChange, textChoose) {
    $(inputImg).on("change", function () {
        if ($(this).val() == "") {
            $(displayImg).fadeOut(500);
            $(labelChange).text(textChoose);
        } else {
            $(displayImg).fadeIn(500);
            $(labelChange).text($(this).val().split("\\").pop());
            var reader = new FileReader();
            reader.onload = function () {
                var output = $(displayImg);
                output.attr("src", reader.result);
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    });
}

function imageModalClick(modalId, modalImg, displayImg) {

    $(modalImg).on('click', function() {
        $(modalId).css('display', 'flex');
        $(displayImg).attr('src', $(this).attr('src'));

    });

    $(document).on('keyup ', function(e) {
        if (e.key == "Escape") {
            $(modalId).css('display', 'none');
        }
    });

    $(modalId).on("click", function() {
        $(this).css('display', 'none');
    });

}

function trimeText(selector, maxLength, showTrimId, hideTrimId, readMore, readLess){
    if (($(selector).text().length) > maxLength) {

        var oldText = $(selector).text();

        var newText = $(selector).text().substr(0, maxLength);
        $(selector).html(newText + " " +
            "<span class='show-trim' id=" + showTrimId + ">" + readMore + "</span>"
        );


        $(document).on('click', '#' + showTrimId, function() {
            $(this).parent().html(oldText + " " +
                "<span class='hide-trim' id=" + hideTrimId + ">" + readLess + "</span>"
            );
        });

        $(document).on('click', '#' + hideTrimId, function() {
            $(this).parent().html(newText + " " +
                "<span class='show-trim' id=" + showTrimId + ">" + readMore + "</span>"
            );
        })

    }
}

function chooseLanguage(appLocale){
    if (appLocale == 'en') {
        $('.dropdown-item:first-of-type').css('opacity', '.5').end().siblings().css('opacity', '1');
    } else if (appLocale == 'tr') {
        $('.dropdown-item:nth-of-type(2)').css('opacity', '.5').end().siblings().css('opacity', '1');
    } else if (appLocale == 'ar') {
        $('.dropdown-item:nth-of-type(3)').css('opacity', '.5').end().siblings().css('opacity', '1');
    }
}

function changeNavbarDirection(){
    var direction = $('html').attr('dir');

    if(direction == 'rtl'){
        $('.navbar-nav').removeClass('ml-auto').addClass('mr-auto');
        $('.user-dropdown').removeClass('dropdown-menu-right').addClass('mr-auto');
    }

    else if(direction == 'ltr'){
        $('.navbar-nav').removeClass('mr-auto').addClass('ml-auto');
        $('.user-dropdown').addClass('dropdown-menu-right').removeClass('mr-auto');
    }
}



