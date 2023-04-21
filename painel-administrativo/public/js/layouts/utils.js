document.addEventListener("DOMContentLoaded", function () {
    const celulares = document.querySelectorAll('.celular');
    const cpfs = document.querySelectorAll('.cpf');
    const rgs = document.querySelectorAll('.rg');
    const nascimentos = document.querySelectorAll('.nascimento');
    const numeros = document.querySelectorAll('.somente-numero');

    numeros.forEach(numero => {
        numero.addEventListener('keypress', somenteNumero);
    });

    celulares.forEach(celular => {
        celulares.addEventListener('keypress', mascaraCelular);
    });

    cpfs.forEach(cpf => {
        cpf.addEventListener('keypress', mascaraCPF);
    });

    rgs.forEach(rg => {
        rg.addEventListener('keypress', mascaraRG)
    });

    nascimentos.forEach(n => {
        n.addEventListener('keypress', nascimento);
    });

    function mascaraCPF(event) {
        let inptlengt = event.target.value.length;

        if (inptlengt === 3) {
            event.target.value += '.';
        } else if (inptlengt === 7) {
            event.target.value += '.';
        } else if (inptlengt === 11)
            event.target.value += '-';
    }

    function mascaraRG(event) {
      let inptlengt = event.target.value.length;

      if (inptlengt === 2) {
          event.target.value += '.';
      } else if (inptlengt === 6) {
          event.target.value += '.';
      } else if (inptlengt === 10)
          event.target.value += '-';
  }


    function mascaraCelular(event) {
        let inptlengt = event.target.value.length;

        if (inptlengt === 0) {
            event.target.value += '(';
        } else if (inptlengt === 3) {
            event.target.value += ')';
        } else if (inptlengt === 9)
            event.target.value += '-';
    }

    function somenteNumero(e) {
        const keyCode = (e.keyCode ? e.keyCode : e.wich);
        if (keyCode >= 48 && keyCode <= 58) {
            return true;
        }
        e.preventDefault();
    }

    function nascimento(event) {
        let inplenght = event.target.value.length;

        if (inplenght == 2) {
            event.target.value += '/';
        }

        if (inplenght == 5) {
            event.target.value += '/';
        }
    }

    async function postData(url = '', data = {}, method = 'GET', formData = false) {
        // Default options are marked with *
        const fetchParams = {
            method: method, // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
                // 'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        }
    
        if (method != 'GET' && method != 'HEAD') {
            fetchParams.body = formData ? data : JSON.stringify(data); // body data type must match "Content-Type" header
        }
    
        if (!formData) {
            fetchParams.headers['Content-Type'] = 'application/json';
        }
    
        return fetch(aplicarParamsToUrl(url, data, method), fetchParams)
        .then((response) => {
            if (!response.ok) {
                // parses JSON response into native JavaScript objects AND reject promise
                return response.json().then(err => Promise.reject(err));
            }
    
            return response.json(); // parses JSON response into native JavaScript objects
        });
    }
});
