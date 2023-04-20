document.addEventListener("DOMContentLoaded", function () {
    const cep = document.getElementById("cep");
    const btnAdicionar = document.getElementById("btn_adicionar");
    const inpTipo = document.getElementById("tipo");
    const tbody = document.getElementById("tbody");
    let contador = 0;

    const showData = (result) => {
        for (const campo in result)
            if (document.querySelector("#" + campo)) {
                document.querySelector("#" + campo).value = result[campo]

            }
    };

    cep.addEventListener("blur", (e) => {
        let search = cep.value.replace("-", "");
        const options = {
            method: 'get',
            mode: 'cors',
            cache: 'default'
        };

        fetch(`https://viacep.com.br/ws/${search}/json/`, options)
            .then(response => {
                response.json()
                    .then(data => showData(data))
            })

            .catch(e => console.log('deu erro: ' + e, message));
    });

    btnAdicionar.addEventListener('click', adicionaTr);

    function adicionaTr() {
        contador ++
        let tr = document.createElement('tr');
        tbody.appendChild(tr);
        adicionaTdRedeSocial(tr);
        adicionaTdNomeUsuario(tr);
        adicionarTdURL(tr);
        adicionatdUltimoAcesso(tr);
    }

    function adicionaTdRedeSocial(tr) {
        const tipo = inpTipo.options[inpTipo.selectedIndex].text;
        const td = document.createElement('td');
        td.classList.add('col-3');
        tr.appendChild(td);
        const redeSocial = document.createElement('input');
        redeSocial.setAttribute('type', 'text');
        redeSocial.setAttribute('class', 'form-control');
        redeSocial.setAttribute('name', `perfil[${contador}][tipo]`);
        redeSocial.setAttribute('value', tipo);
        redeSocial.setAttribute('required', '');
        td.appendChild(redeSocial);
    }

    function adicionaTdNomeUsuario(tr) {
        const td = document.createElement('td');
        td.classList.add('col-3');
        tr.appendChild(td);
        const nomeUsuario = document.createElement('input');
        nomeUsuario.setAttribute('type', 'text');
        nomeUsuario.setAttribute('class', 'form-control');
        nomeUsuario.setAttribute('name', `perfil[${contador}][nome_usuario]`);
        nomeUsuario.setAttribute('required', '');
        td.appendChild(nomeUsuario);
    }

    function adicionarTdURL(tr) {
        const td = document.createElement('td');
        td.classList.add('col-3');
        tr.appendChild(td);
        const url = document.createElement('input');
        url.setAttribute('type', 'text');
        url.setAttribute('class', 'form-control');
        url.setAttribute('name', `perfil[${contador}][url]`);
        url.setAttribute('required', '');
        
        td.appendChild(url);
    }

    function adicionatdUltimoAcesso(tr) {
        const td = document.createElement('td');
        td.classList.add('col-3');
        tr.appendChild(td);
        const ultimoAcesso = document.createElement('input');
        ultimoAcesso.setAttribute('type', 'date');
        ultimoAcesso.setAttribute('class', 'form-control');
        ultimoAcesso.setAttribute('name', `perfil[${contador}][ultimo_acesso]`);
        ultimoAcesso.setAttribute('required', '');
        
        td.appendChild(ultimoAcesso);
    }
})
