if (document.querySelector('[data-photo-create]')) {
    const inputs = document.querySelector ('[data-photo-inputs]');
    const section = document.querySelector ('[data-photo-create]');
    const addButons = section.querySelector ('[data-add-button]');

    addButons.addEventListener('click', _ => {
        const input = section.querySelector('[data-photo-inputs-clone] div').cloneNode(true);
        input.setAttribute('name', 'photos[]');
        inputs.appendChild(input);
    });
}