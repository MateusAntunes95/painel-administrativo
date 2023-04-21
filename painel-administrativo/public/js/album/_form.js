document.addEventListener("DOMContentLoaded", function () {
    const cliente = document.getElementById('cliente');
    const perfil = document.getElementById('perfil');
    cliente.addEventListener('change', preenchePerfil)

    function preenchePerfil(e) {
        perfil.innerHTML = "";
        const xhr = new XMLHttpRequest();
        let url = 'preenche_perfil/' + this.options[this.selectedIndex].value;
        xhr.open('GET', url);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhr.onprogress = () => {}
        xhr.onload = () => {
            const dados = JSON.parse(xhr.responseText);
            perfil.add(new Option('Selecione um perfil', ''))
            dados.forEach(function (dado) {
                perfil.add(new Option(dado.nome, dado.id))
            })
        }

        xhr.send();
    }

})
