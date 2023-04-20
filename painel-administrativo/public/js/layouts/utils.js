document.addEventListener("DOMContentLoaded", function () {
    document.querySelector('.celular').addEventListener('keypress', mascaraCelular);
    document.querySelector('.cpf').addEventListener('keypress', mascaraCPF);
    document.querySelector('.rg').addEventListener('keypress', mascaraRG);
    document.querySelector('.nascimento').addEventListener('keypress', nascimento);
    const numeros = document.querySelectorAll('.somente-numero');

    numeros.forEach(numero => {
        numero.addEventListener('keypress', somenteNumero)
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
});
