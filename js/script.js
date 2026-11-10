// script do formulário de login
const formLogin = document.querySelector('#form-login')

formLogin.addEventListener('submit', function(evento) {
    evento.preventDefault()

    const email = document.querySelector('#email').value
    const senha = document.querySelector('#senha').value

    if (email.trim() !== "" && senha.trim() !== "") {
        window.location.href = 'index.html'
    } else {
        alert('Por favor, preencha o email e a senha')
    }

} )



const botaoLogin = document.getElementById('botaoLogin')

botaoLogin.addEventListener('click', function(){
    alert('Bem-vindos à Feira do Porto!')
} )


// dinâmica da página de cadastro

document.addEventListener('DOMContentLoaded', () => {
    const form = getElementById('form-cadastro');

    form.addEventListener('submit', (event) => {
        const senha = document.getElementById('senha').value;
        const repetirSenha = document.getElementById('repetir-senha').value;

        if (senha !== repetirSenha) {
            Event.preventDefault();
            alert('As senhas não coincidem. Por favor, digite novamente.');

            document.getElementById('repetir-senha').focus;
        }


    })
})