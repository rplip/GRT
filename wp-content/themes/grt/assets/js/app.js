

let app = {

    init: function() {
        //app.addAnchorHomepage();
        app.addBackgroundClass();
        app.backToTop();
        app.catchLetter();
        app.catchMenu();
        app.catchSliderDesktop();
        app.catchSliderMobile();
        app.closeValidateForm();
        app.isotope();
        app.navfocus();
        app.pauseVideo();
        app.randomLetter();
        app.randomizeSlider();
        app.secondSliderLink();
        app.unfoldSearchInput();
    },

    addAnchorHomepage() {
        const navId1 = document.querySelectorAll('section.elementor-element-5647e13');
        const navId2 = document.querySelectorAll('section.elementor-element-e556435');
        if(navId1.length != 0 && navId2.length != 0) {
            navId1[0].innerHTML += '<a name="nslgr"></a>';
            navId2[0].innerHTML += '<a name="abcdaire"></a>';
        }
    },

    addBackgroundClass() {
        let test = document.querySelectorAll('.ScaleUp > div.elementor-column-wrap');

        test.forEach(element => {
            element.classList.add('backgroundGrown');
        });
    },

    addFirstSliderlink(array) {
        for (let i = 0; i < array.length; i++) {
            const element = array[i];
            let createLink = document.createElement('a');
            createLink.appendChild(element.firstChild);
            switch (i) {
                case 0:
                    createLink.setAttribute('data-toggle', 'modal');
                    createLink.setAttribute('data-target', '#modalSlider1');
                    createLink.setAttribute('class', 'clickable'); 
                    break;
                case 1:
                    createLink.setAttribute('data-toggle', 'modal');
                    createLink.setAttribute('data-target', '#modalSlider2');
                    createLink.setAttribute('class', 'clickable'); 
                    break;
                case 2:
                    createLink.setAttribute('data-toggle', 'modal');
                    createLink.setAttribute('data-target', '#modalSlider3');
                    createLink.setAttribute('class', 'clickable'); 
                    break;
            }
            element.prepend(createLink);            
        }
    },

    backToTop() {
        var btnbttop = $('#buttonBackToTop');

        $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btnbttop.addClass('show');
        } else {
            btnbttop.removeClass('show');
        }
        });

        btnbttop.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
        });
    },

    catchLetter() {
        const letters = document.getElementById('letters');
        if(letters != null) {
            letters.onclick = function () {
                app.highlightLetter();
            };
        }
    },

    catchMenu() {
        const allMenu = document.getElementById('navbarText');
        allMenu.onclick = function () {
            app.closeMenu();
        };
    },

    catchSliderDesktop() {
        const firstSliderDesktopItem = document.querySelectorAll('#firstSliderDesktop .swiper-slide-inner');
        app.addFirstSliderlink(firstSliderDesktopItem);
    },

    catchSliderMobile() {
        const firstSliderMobileItem = document.querySelectorAll('#firstSliderMobile .swiper-slide-inner');
        app.addFirstSliderlink(firstSliderMobileItem);
    },

    closeMenu() {
        
        let burgerButton = document.getElementById('burgerButton');
        burgerButton.click();
        burgerButton.ontouchstart();
    },

    closeValidateForm() {
        
        let button = document.getElementById('buttonValidateForm');
        let validateForm = document.getElementById('validateForm');
        if(button != null && validateForm != null) {
            button.onclick = function () {
                    validateForm.classList.add('d-none');
                };
        }
            
    },

    highlightLetter() {

        let allLetters = document.querySelectorAll('.alphabetLetter');
        allLetters.forEach(element => {
            element.classList.remove('highlightLetter')
            if (element.getAttribute('is_active') == "true") {
                element.classList.add('highlightLetter');
                element.removeAttribute('is_active');
            }
        });

    },

    isotope() {
        // initialisation Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // use element for option
                columnWidth: '.grid-sizer'
            }
        });

        // Fonction qui filtre
        var filterFns = {
            ium: function() {
                var name = $(this).find('.title').text();
                /*let hash = window.location.hash;*/
                let hash = $(this).attr('data-filter');
                let letter = hash.substr(hash.length - 1);
                return name.match(letter);
            }
        };

        $('.filters-a-group').on( 'click', 'a', function() {
            var filterValue = $( this ).attr('data-filter');
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ 
                filter: filterValue 
            });
            $(this).attr('is_active', 'true');
        });
    },

    navfocus() {
        const benefits = document.getElementById('navUX__item--benefits');
        const abecedarium = document.getElementById('navUX__item--abecedarium');
        const campaign = document.getElementById('navUX__item--campaign');
        const navItem = document.querySelectorAll('.navUX__item');

        if(benefits != null && abecedarium != null && campaign != null && navItem.length != 0) {


                benefits.onclick = function () {
                    app.removeUnderline(navItem);
                    benefits.classList.add('navUX__item--underline');
                }

                abecedarium.onclick = function () {
                    app.removeUnderline(navItem);
                    abecedarium.classList.add('navUX__item--underline');
                }

                campaign.onclick = function () {
                    app.removeUnderline(navItem);
                    campaign.classList.add('navUX__item--underline');
                }
            }
    },

    pauseVideo() {
        const modal = document.getElementById('modal');
        let allVideo = document.querySelectorAll('video');
        if (modal != null) {
            modal.onclick = function () {
                for (let i = 0; i < allVideo.length; i++) {
                    allVideo[i].pause();
                }
            }
        }

    },
    
    randomizeSlideIndex() {
        let sliderItem = document.querySelectorAll('.elementor-element-da92397 .swiper-slide');

        //Création tableau, mélange et attribution des chiffres sans redondances
            var j, arr = [];
            for (j = 0; j < 20; j++) {
                arr[j] = j + 1;
            }

            function shuffle(array) {
                var p, n, tmp;
                for (p = array.length; p;) {
                    n = Math.random() * p-- | 0;
                    tmp = array[n];
                    array[n] = array[p];
                    array[p] = tmp;
                }
            }

            shuffle(arr);
        
        //attribution d'un data-swiper-slide-index généré aléatoirement
            for (let i = 0; i < sliderItem.length; i++) {
                sliderItem[i].setAttribute("data-swiper-slide-index", arr[i]);
                console.log(sliderItem[i]);
                
            }
        
    },

    randomizeSlider() {
        var parent = $("#secondSlider .swiper-wrapper");
        
        var divs = parent.children();
        while (divs.length) {
            parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
        }

    },
    
    randomLetter() {
        let random = app.randomNumber(0, 19);
        let ulSelector = document.querySelectorAll('.alphabetLetter');

        if (ulSelector.length != 0) {
            ulSelector[random].click();
        }
    },
    
    randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    },

    removeUnderline(array) {
        array.forEach(elt => {
            elt.classList.remove('navUX__item--underline');
        });
    },

    secondSliderLink() {
        const sliderItem = document.querySelectorAll('#secondSlider .swiper-slide-inner'); // Selection des éléments du slider
        for (let i = 0; i < sliderItem.length; i++) {
            const element = sliderItem[i];
            let slugifyTitle = app.string_to_slug(element.lastChild.firstChild.data); // On transforme la légende en slug d'url (fonction en dessous)
            let createLink = document.createElement('a'); // On crée une balise lien
            createLink.appendChild(element.firstChild); // On injecte l'image dans le lien
            createLink.appendChild(element.lastChild); // On injecte la légende dans le lien
            createLink.href = slugifyTitle; // On crée le lien à partir du slug
            element.prepend(createLink); // On inject le tout dans l'element du slider
        }
    },

    string_to_slug(str) {
        str = str.replace(/^\s+|\s+$/g, ""); // trim
        str = str.toLowerCase();
      
        // remove accents, swap ñ for n, etc
        var from = "åàáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to = "aaaaaaeeeeiiiioooouuuunc------";
      
        for (var i = 0, l = from.length; i < l; i++) {
          str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
        }
      
        str = str
          .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
          .replace(/\s+/g, "-") // collapse whitespace and replace by -
          .replace(/-+/g, "-") // collapse dashes
          .replace(/^-+/, "") // trim - from start of text
          .replace(/-+$/, ""); // trim - from end of text
      
        return str;
    },

    unfoldSearchInput() {

        const loupe = document.getElementById('loupesearch');
        const input = document.getElementById('inputsearch');

        if(loupe != null && input != null) {
            loupe.onmouseover = function () {
                input.classList.add('onmouseover');
                loupe.classList.add('onmouseover');
            };
            loupe.ontouchstart = function () {
                input.classList.toggle('onmouseover');
                loupe.classList.toggle('onmouseover');
            }
            input.onmouseout = function () {
                input.classList.remove('onmouseover');
                loupe.classList.remove('onmouseover');
            };
        }


    },

}

document.addEventListener('DOMContentLoaded', app.init);
