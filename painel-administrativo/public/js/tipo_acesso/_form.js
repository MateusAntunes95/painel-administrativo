document.addEventListener("DOMContentLoaded", function () {
    const moduloAcesso = document.getElementById('modolos_acesso');
    const btnAdicionar = document.getElementById('btn_adicionar');
    const tbody = document.getElementById('tbody');
    let contador = 0;
    let html = '';


    btnAdicionar.addEventListener("click", adicionaModulo);

    function adicionaModulo(event) {
        contador ++;
        html += montaTr(event);
        tbody.innerHTML += html;
    }

    const montaTr = (event) => {
        const valueModulo = moduloAcesso.options[moduloAcesso.selectedIndex].text;
        return `
            <tr>
                <td class="col-3"> <input name="moduloAcesso[${contador}][modolu]" class="form-control" value="${valueModulo}" </td>
                <td> <input type="checkbox" name="moduloAcesso[${contador}][adicionar]" class="form-check-input"></td>
                <td> <input type="checkbox" name="moduloAcesso[${contador}][editar]" class="form-check-input"></td>
                <td> <input type="checkbox" name="moduloAcesso[${contador}][excluir]" class="form-check-input"></td>
                <td> <input type="checkbox" name="moduloAcesso[${contador}][visualizar]" class="form-check-input"></td>
            </tr>
        `;
    }
});
