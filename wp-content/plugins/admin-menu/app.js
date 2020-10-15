
let app = {

    init() {
        /*
        let glyphe = document.querySelectorAll('i');
        console.log(glyphe);
        glyphe[0].remvove();
        */
        let element = document.querySelectorAll('#wpbody-content');
        console.log(element);
        let createGlyph = document.createElement('i');
        //createGlyph.appendChild(element[0].firstChild);
        //createGlyph.setAttribute('class', 'fas fa-file-export');
        
        console.log('feuille de js prise en charge');
    }

}



document.addEventListener('DOMContentLoaded', app.init);
