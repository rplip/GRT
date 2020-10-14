

let app = {

    init: function() {

        const letters = document.getElementById('letters');
        letters.onclick = function () {
                setTimeout(app.catchLetter,10);
                setTimeout(app.highlightLetter, 10);
            }
            
        app.randomLetter();
        app.addBackgroundClass();
        app.addAnchorHomepage();

        const allMenu = document.getElementById('navbarText')
        allMenu.onclick = function () {
            app.closeMenu();
        }

        const loupe = document.getElementById('loupesearch');
        const input = document.getElementById('inputsearch');
        loupe.onmouseover = function () {
            console.log('Jysuis');
            input.classList.add('onmouseover');
        }
        loupe.onclick = function () {
            console.log('jysuisplus');
            input.classList.remove('onmouseover');
        }
        
    },

    randomLetter : function () {
        let random = app.randomNumber(0, 25);

        let ulSelector = document.querySelectorAll('.alphabetLetter');

        ulSelector[random].click();
    },
    
        randomNumber : function (min, max) { // min and max included 
            return Math.floor(Math.random() * (max - min + 1) + min);
        },

    catchLetter: function () {
        let hash = window.location.hash;
        let letter = hash.substr(hash.length - 1);
        return letter;
    },

    addBackgroundClass : function () {
        let test = document.querySelectorAll('.ScaleUp > div.elementor-column-wrap');

        test.forEach(element => {
            element.classList.add('backgroundGrown');
        });
    },

    addAnchorHomepage : function () {
        const navId1 = document.querySelectorAll('section.elementor-element-6899737');
        navId1[0].innerHTML += '<a name="nslgr"></a>';

        const navId2 = document.querySelectorAll('section.elementor-element-fffcc13');
        navId2[0].innerHTML += '<a name="abcdaire"></a>';
    },

    highlightLetter : function () {

        let allLetters = document.querySelectorAll('.alphabetLetter');
        let hashUrl = window.location.hash;
        allLetters.forEach(element => {
            element.classList.remove('highlightLetter')
            if (element.getAttribute('href') == hashUrl) {
                element.classList.add('highlightLetter')
            }
        });

    },

    closeMenu : function () {

        let burgerButton = document.getElementById('burgerButton');
        burgerButton.click();
        burgerButton.ontouchstart();
    }

}



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
    // show if name starts with a letter (A, B or whatever)
    ium: function() {
        var name = $(this).find('.title').text();
        let hash = window.location.hash;
        let letter = hash.substr(hash.length - 1);
        return name.match(letter);
    }
};

// bind filter button click
$('.filters-a-group').on( 'click', 'a', function() {

    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $grid.isotope({ 
        filter: filterValue 
    });
});

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



document.addEventListener('DOMContentLoaded', app.init);
