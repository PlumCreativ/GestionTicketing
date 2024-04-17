import 'jquery';
import "bootstrap"
import "bootstrap-table"

function sendFetch( paramList, options={}, responseType = 'json' ) {
    if (typeof options === "object") {
        options = {
            method: 'POST',
            body: JSON.stringify(paramList)
        }
    }
  //  console.log( options )
    return fetch(paramList.url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error( response.url + ' ' + response.status + ' ' + response.statusText );
            }
            if (responseType === 'text') {
                return response.text();
            } else {
                return response.json();
            }
        })
}

$('#table').on( 'click', '.admin-line', function(e){
    const elem = e.target

    const isAdmin = elem.dataset.isadmin == 0 ? 1 : 0
    const url = elem.dataset.url
    const adminSwitches = document.querySelectorAll('.admin-line');

    adminSwitches.forEach(function(switchElement) {
        
        switchElement.addEventListener('change', function() {
            if (this.checked) {
              // DÃ©sactiver tous les autres switches
              adminSwitches.forEach(function(otherSwitch) {
                if (otherSwitch !== switchElement) {
                  otherSwitch.checked = false;
                }
              });
            }
        });

    })
    const paramList = {
        url: url
    }

    sendFetch( paramList )
        .then( response => {
            return response
        })
        .then( data => {
            console.log( data )
        })
        .catch(error => {
            console.error( 'Erreur :', error )
        })
})




$('#table').on( 'click', '.active-line', function(e){
    const elem = e.target

    const isActif = elem.dataset.isactif == 0 ? 1 : 0
    const url = elem.dataset.url + isActif

    elem.dataset.isactif = isActif

    const paramList = {
        url: url
    }

    sendFetch( paramList )
        .then( response => {
            return response
        })
        .then( data => {
            console.log( data )
        })
        .catch(error => {
            console.error( 'Erreur :', error )
        })
})


window.onload = () => {
    const allBtn = document.querySelectorAll(".btn")

    allBtn.forEach( function(btn) {
        btn.addEventListener('click', (e)=>{
            const elem = e.target
            elem.dataset.val = 1
            $('#table').bootstrapTable('refresh')
        })
    })
}

