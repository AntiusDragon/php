import axios from 'axios';
import './bootstrap';

console.log('Hello! I am app.js');

const clearForm = form => {
    form.querySelectorAll('input').forEach(input => {
        input.value = '';
    });
}

const destroyFromList = (url) => {
}


const deleteFromList = (url) => {
    // console.log('Delete', url);
    axios.get(url)
        .then(response => {
            const section = document.querySelector('[data-modal-delete]');
            section.innerHTML = response.data.html;
            section.querySelectorAll('[data-close]').forEach(button => {
                button.addEventListener('click', () => {
                    section.innerHTML = '';
                });
            });
            const destroy = section.querySelector('[data-destroy]');
            destroy.querySelector('[data-destroy]').addEventListener('click', () => {
                const url = destroy.dataset.url;
                destroyFromList(url);
                section.innerHTML = '';
            })
        })
        .catch(error => {
            console.error(error);
        });
}

const addEventsToList = () => {
    const list = document.querySelector('[data-list]');
    const buttons = list.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const url = button.dataset.url;
            // const id = button.dataset.id;
            const action = button.dataset.action;
            if (action === 'delete') {
                deleteFromList(url);
            } else if (action === 'edit') {
                editFromList(url);
            } else if (action === 'show') {
                showFromList(url);
            } else {
                console.error('Action not found');
            }
        });
    });
}

const getList = () => {
    const list = document.querySelector('[data-list]');
    const url = list.dataset.url;

    axios.get(url)
        .then(response => {
            // console.log(response.data);
            list.innerHTML = response.data.html;
            addEventsToList();
        })
        .catch(error => {
            console.error(error);
    });
}

if (document.querySelector('[data-create-form]')) {
    const createForm = document.querySelector('[data-create-form]');
    const url = createForm.dataset.url;
    const button = createForm.querySelector('button');
    const inputs = createForm.querySelectorAll('input');

    button.addEventListener('click', () => {
        const data = {};
        inputs.forEach(input => {
            data[input.name] = input.value;
        });

        axios.post(url, data)
            .then(response => {
                console.log(response.data);
                clearForm(createForm);
                getList();
            })
            .catch(error => {
                console.error(error);
        });
    });

    if (document.querySelector('[data-list]')) {
        getList();
    }

    // console.log('createForm:', url);
};