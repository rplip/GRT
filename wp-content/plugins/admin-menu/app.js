
let app = {

    init() {
        const deleteButton = document.getElementById('delete__button');
        const exportButton = document.getElementById('export__button');
        const xClosed = document.getElementById('success-button');
        
        deleteButton.onclick = function () {
            const selectedRow = document.querySelectorAll('.selected');
            for (let i = 0; i < selectedRow.length; i++) {
                const element = selectedRow[i];
                console.log(element["id"]);

                $.ajax({
                    type: 'POST',
                    url: '/grtgaz-preprod/wp-content/plugins/admin-menu/delete_contact.php',
                    data: {id: element["id"]}, 
                    success : function(code_html, statut){
                        console.log('thats good deelete')
                        console.log(code_html, statut);
                        const divSuccess = document.getElementById('success-message');
                        divSuccess.classList.remove('d-none');
                        element.classList.add('d-none');
                    },
                  });
            }

            const closeButton = document.querySelectorAll('.close');
            closeButton[0].click();

            
        }
        
        exportButton.onclick = function () {

            const selectedRow = document.querySelectorAll('.selected');
            let allIDs = new Array();
            for (let i = 0; i < selectedRow.length; i++) {
                const element = selectedRow[i];
                allIDs.push(element["id"]);
            }
            console.log(allIDs);
            $.ajax({
                type: 'POST',
                url: '/grtgaz-preprod/wp-content/plugins/admin-menu/export_contact.php',
                data: {id: allIDs}, 
                success : function(code_html, statut){
                    console.log(code_html);
                    location.href = "/grtgaz-preprod/wp-content/plugins/admin-menu/export_contact2.php";
                },
              });
        }

        xClosed.onclick = function() {
            const divSuccess = document.getElementById('success-message');
            divSuccess.classList.add('d-none');
        }



    }

}



document.addEventListener('DOMContentLoaded', app.init);
