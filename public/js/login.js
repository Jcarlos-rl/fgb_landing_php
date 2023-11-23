const btn_login = document.querySelector('#btn_login'),
    form_login = document.querySelector('form'),
    feedback_error = document.querySelector('#feedback_error');

btn_login.addEventListener('click', (e)=>{
    e.preventDefault();
    
    let myFormData = new FormData(form_login),
        error_message = feedback_error.childNodes[1].childNodes[3],
        email = JSON.stringify(myFormData.get('email')).slice(1).slice(0,-1),
        password = JSON.stringify(myFormData.get('password')).slice(1).slice(0,-1);

    //Validar que los campos no esten vacios
    if(email === '' || password === ''){
        error_message.innerText = `El correo electrónico y contraseña son requeridos.`;
        feedback_error.classList.remove('hidden');
        return;
    }

    //Validar que el correo sea valido
    const emailPattern = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
    if (!emailPattern.test(email)) {
        error_message.innerText = `El correo electrónico no es valido.`;
        feedback_error.classList.remove('hidden');
        return;
    }

    //Validar longitud de la contraseña
    if(password.length < 5){
        error_message.innerText = `La contraseña debe tener una longitud minima de 5 caracteres.`;
        feedback_error.classList.remove('hidden');
        return;
    }

    feedback_error.classList.add('hidden');
    btn_login.classList.add('cursor-not-allowed');
    btn_login.innerText = 'Conectando...';
    btn_login.disabled = true;

    fetch(`${ base_url }login/login`,{
        method: 'POST',
        body: myFormData
    })
    .then((res) =>{
        if(res.status === 500){
            btn_login.classList.remove('cursor-not-allowed');
            btn_login.innerText = 'Iniciar sesión';
            btn_login.disabled = false;
            throw new Error(`${res.statusText}`);
        }

        return res.json();
    })
    .then(data=>{
        if(!data.status){
            btn_login.classList.remove('cursor-not-allowed');
            btn_login.innerText = 'Iniciar sesión';
            btn_login.disabled = false;
            const error = (data.errorMessage !== undefined) ? data.errorMessage : data.message;
            error_message.innerText = error;
            feedback_error.classList.remove('hidden');
            return;
        }
        localStorage.setItem('fgb_token', data.token);
        feedback_error.classList.add('hidden');
        window.location.href = base_url + 'dashboard';
    })
    .catch(err => console.log(err))
})