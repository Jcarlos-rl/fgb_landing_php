const btn_contac = document.querySelector('#btn_contac'),
    form_contac = document.querySelector('form'),
    feedback_error = document.querySelector('#feedback_error');

btn_contac.addEventListener('click', (e)=>{
    e.preventDefault();

    let myFormData = new FormData(form_contac);

    if(myFormData.get('nombre') === '' || myFormData.get('email') === '' || myFormData.get('telefono') ===  '' || myFormData.get('mensaje') === ''){
        feedback_error.childNodes[1].childNodes[3].innerText = 'Todos los campos son requeridos.';
        feedback_error.classList.remove('hidden');
        return;
    }

    const emailPattern = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
    if (!emailPattern.test(myFormData.get('email'))) {
        feedback_error.childNodes[1].childNodes[3].innerText = `El correo electrónico no es valido.`;
        feedback_error.classList.remove('hidden');
        return;
    }

    const phonePattern = /^\d{10}$/;
    if (!phonePattern.test(myFormData.get('telefono'))) {
        feedback_error.childNodes[1].childNodes[3].innerText = `El teléfono no es valido.`;
        feedback_error.classList.remove('hidden');
        return;
    }

    feedback_error.classList.add('hidden');
    btn_contac.classList.add('cursor-not-allowed');
    btn_contac.innerText = 'Enviando...';
    btn_contac.disabled = true;

    fetch(`${ base_url }index/contac`,{
        method: 'POST',
        body: myFormData
    })
    .then((res) =>{
        if(res.status === 500){
            btn_contac.classList.remove('cursor-not-allowed');
            btn_contac.innerText = 'Enviar';
            btn_contac.disabled = false;
            throw new Error(`${res.statusText}`);
        }

        return res.json();
    })
    .then(data=>{
        feedback_error.childNodes[1].classList.remove('border-red-400');
        feedback_error.childNodes[1].classList.add('border-green-400');
        feedback_error.childNodes[1].childNodes[1].classList.remove('text-red-400');
        feedback_error.childNodes[1].childNodes[1].classList.add('text-green-400');
        feedback_error.childNodes[1].childNodes[3].innerText = `Gracias, hemos recibido su mensaje.`;
        btn_contac.innerText = 'Enviar';
        feedback_error.classList.remove('hidden');
    })
    .catch(err=>console.log(err))
})