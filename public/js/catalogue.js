const miModal = document.getElementById('miModal'),
		closeModal = document.getElementById('closeModal'),
		brand_catalogues = document.querySelectorAll('.brand_catalogue'),
		catalogues = document.getElementById('catalogues');
	
	closeModal.addEventListener('click', ()=>{
		miModal.classList.add('hidden');
	})

	brand_catalogues.forEach(element => {
		element.addEventListener('click', ()=>{

			//Limpiar select
			brand_catalogues.forEach(element => {
				let brand = element.childNodes[3].childNodes[1],
				cat = element.childNodes[3].childNodes[3];
				brand.classList.remove('text-fgb-blue-light');
				cat.classList.remove('text-slate-100');
				element.classList.remove('bg-fgb-blue-dark');
			});

			//Agregar select a element
			let brand = element.childNodes[3].childNodes[1],
				cat = element.childNodes[3].childNodes[3];
			brand.classList.add('text-fgb-blue-light');
			cat.classList.add('text-slate-100');
			element.classList.add('bg-fgb-blue-dark');

			let marca = brand.getAttribute('data-id');
            let marcaCap = marca.replace(/\w\S*/g, (w) => (w.replace(/^\w/, (c) => c.toUpperCase())));
			catalogues.innerHTML = '';

			cataloguesArr[marca].forEach(element => {
				catalogues.innerHTML += `
					<div class="rounded shadow-md p-5 mb-10">
						<div class="grid grid-cols-1 md:grid-cols-6 items-center">
							<div class="flex items-center gap-3 md:col-span-2">
								<div class="p-2 border-solid border-2 rounded-lg">
									<svg width="20" height="20" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
										<path fill="#000000" d="M13.156 9.211c-.213-.21-.686-.321-1.406-.331a11.754 11.754 0 0 0-1.69.124c-.276-.159-.561-.333-.784-.542c-.601-.561-1.103-1.34-1.415-2.197c.02-.08.038-.15.054-.222c0 0 .339-1.923.249-2.573a.73.73 0 0 0-.044-.184l-.029-.076c-.092-.212-.273-.437-.556-.425l-.171-.005c-.316 0-.573.161-.64.403c-.205.757.007 1.889.39 3.355l-.098.239c-.275.67-.619 1.345-.923 1.94l-.04.077c-.32.626-.61 1.157-.873 1.607l-.271.144c-.02.01-.485.257-.594.323c-.926.553-1.539 1.18-1.641 1.678c-.032.159-.008.362.156.456l.263.132a.792.792 0 0 0 .357.086c.659 0 1.425-.821 2.48-2.662a24.79 24.79 0 0 1 3.819-.908c.926.521 2.065.883 2.783.883c.128 0 .238-.012.327-.036a.558.558 0 0 0 .325-.222c.139-.21.168-.499.13-.795a.531.531 0 0 0-.157-.271zM3.307 12.72c.12-.329.596-.979 1.3-1.556c.044-.036.153-.138.253-.233c-.736 1.174-1.229 1.642-1.553 1.788zm4.169-9.6c.212 0 .333.534.343 1.035s-.107.853-.252 1.113c-.12-.385-.179-.992-.179-1.389c0 0-.009-.759.088-.759zM6.232 9.961c.148-.264.301-.543.458-.839c.383-.724.624-1.29.804-1.755a5.813 5.813 0 0 0 1.328 1.649c.065.055.135.111.207.166c-1.066.211-1.987.467-2.798.779zm6.72-.06c-.065.041-.251.064-.37.064c-.386 0-.864-.176-1.533-.464c.257-.019.493-.029.705-.029c.387 0 .502-.002.88.095s.383.293.318.333z"/>
										<path fill="#000000" d="M14.341 3.579c-.347-.473-.831-1.027-1.362-1.558S11.894 1.006 11.421.659C10.615.068 10.224 0 10 0H2.25C1.561 0 1 .561 1 1.25v13.5c0 .689.561 1.25 1.25 1.25h11.5c.689 0 1.25-.561 1.25-1.25V5c0-.224-.068-.615-.659-1.421zm-2.07-.85c.48.48.856.912 1.134 1.271h-2.406V1.595c.359.278.792.654 1.271 1.134zM14 14.75c0 .136-.114.25-.25.25H2.25a.253.253 0 0 1-.25-.25V1.25c0-.135.115-.25.25-.25H10v3.5a.5.5 0 0 0 .5.5H14v9.75z"/>
									</svg>
								</div>
								<p class="text-fgb-blue font-medium truncate pr-5">${element}</p>
							</div>
							<p class="md:col-span-1 lg:col-span-2 my-5 md:my-0 font-medium text-fgb-blue">${marcaCap}</p>
							<div class="flex gap-3 md:col-span-2">
								<a href="${base_url}public/media/catalogues/${marca}/${element}" target="_blank" download="${element}" class="rounded-md text-fgb-blue border-solid border-2 py-4 px-8">Dercargar catálogo</a>
								<button data-id="${element}" data-brand="${marca}" class="viewCatalogue bg-fgb-blue-dark rounded-md text-white py-4 px-8 shadow-md shadow-fgb-blue-dark hover:bg-fgb-blue-light hover:shadow-fgb-blue-light">Ver catálogo</button>
							</div>
						</div>
					</div>
				`;
			});
		})
	});

	catalogues.addEventListener('click', (e)=>{
		const element = e.target;
		if(element.tagName === 'BUTTON'){
			let div = miModal.childNodes[1].childNodes[3];
			div.innerHTML = `
				<section class="hidden lg:block container mx-auto px-6 md:px-0">
					<embed class="mb-4" src="${ base_url }public/media/catalogues/${element.getAttribute('data-brand')}/${element.getAttribute('data-id')}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="550px" />
					<a class="font-medium text-fgb-blue" href="${ base_url }public/media/catalogues/${element.getAttribute('data-brand')}/${element.getAttribute('data-id')}" target="_blank">Ver en pantalla completa</a>
				</section>
				<p class="block lg:hidden">Parece que no tienes un visor de PDF en el navegador. Puedes hacer <a href="${ base_url }public/media/catalogues/${element.getAttribute('data-brand')}/${element.getAttribute('data-id')}" target="_blank" class="text-fgb-blue-light">click aquí para descargar el archivo PDF.</a></p>
			`;
			miModal.classList.remove('hidden');
		}
	})